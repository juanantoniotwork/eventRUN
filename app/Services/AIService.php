<?php

namespace App\Services;

use App\Models\Evento;
use App\Models\TicketSoporte;
use App\Mail\TicketAnsweredUserMail;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Cache;

class AIService
{
    /**
     * Process AI response for a support ticket based on the event's reglamento.
     */
    public function processTicket(TicketSoporte $ticket, Evento $evento): void
    {
        if (!$evento->reglamento) {
            return;
        }

        $apiKey = config('services.gemini.key');
        if (!$apiKey) {
            Log::warning('IA: No se encontró GEMINI_API_KEY en el entorno.');
            return;
        }

        $cacheKey = 'ai_response_' . md5($evento->reglamento . '|' . $ticket->mensaje);

        Log::info("IA: Iniciando análisis para ticket #{$ticket->id} usando gemini-2.5-flash");

        $prompt = "Eres un asistente de carreras deportivas. Tienes este reglamento: [{$evento->reglamento}]. Un usuario ha preguntado: [{$ticket->mensaje}]. Responde SOLO con un JSON con dos campos: 'confianza' (número del 0 al 100 indicando cuánto se puede responder con el reglamento) y 'respuesta' (la respuesta basada en el reglamento, o null si la confianza es menor de 85). No añadas nada más.";

        try {
            $aiData = Cache::remember($cacheKey, now()->addDays(7), function () use ($apiKey, $prompt) {
                return $this->callGeminiAPI($apiKey, $prompt);
            });

            if ($aiData && isset($aiData['confianza'])) {
                $this->applyAIResponse($ticket, $aiData);
            }
        } catch (\Exception $e) {
            Log::error("IA: Excepción en el proceso: " . $e->getMessage());
        }
    }

    /**
     * Call Gemini API and return the response data.
     */
    private function callGeminiAPI(string $apiKey, string $prompt): ?array
    {
        $url = "https://generativelanguage.googleapis.com/v1/models/gemini-2.5-flash:generateContent?key=$apiKey";
        $maxTries = 3;
        $attempt = 0;

        while ($attempt < $maxTries) {
            $attempt++;
            
            try {
                $response = Http::timeout(30)->post($url, [
                    'contents' => [
                        ['parts' => [['text' => $prompt]]]
                    ]
                ]);

                if ($response->successful()) {
                    $data = $response->json();
                    $text = $data['candidates'][0]['content']['parts'][0]['text'] ?? '';
                    $cleanJson = preg_replace('/^```json\s*|```$/i', '', trim($text));
                    return json_decode($cleanJson, true);
                }

                if ($response->status() == 503) {
                    Log::warning("IA: Servidor sobrecargado (503). Reintento $attempt de $maxTries...");
                    if ($attempt < $maxTries) sleep(5);
                    continue;
                }

                Log::error("IA: Error en API. Status: " . $response->status() . " - Body: " . $response->body());
                break;

            } catch (\Exception $e) {
                Log::error("IA: Fallo en intento $attempt: " . $e->getMessage());
                if ($attempt < $maxTries) sleep(5);
            }
        }

        return null;
    }

    /**
     * Apply the AI response to the ticket if confidence is high enough.
     */
    private function applyAIResponse(TicketSoporte $ticket, array $aiData): void
    {
        $confianza = $aiData['confianza'] ?? 0;
        Log::info("IA: Nivel de confianza para el ticket #{$ticket->id}: $confianza%");

        if ($confianza >= 85 && !empty($aiData['respuesta'])) {
            $ticket->update([
                'respuesta' => $aiData['respuesta'] . "\n\n(Nota: Respuesta generada automáticamente basada en el reglamento oficial).",
                'estado' => 'resuelto'
            ]);
            Mail::to($ticket->email)->send(new TicketAnsweredUserMail($ticket));
            Log::info("IA: Ticket #{$ticket->id} resuelto automáticamente.");
        } else {
            Log::info("IA: Confianza insuficiente. El ticket queda abierto.");
        }
    }
}
