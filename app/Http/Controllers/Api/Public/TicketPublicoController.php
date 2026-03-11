<?php

namespace App\Http\Controllers\Api\Public;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTicketRequest;
use App\Models\Evento;
use App\Models\TicketSoporte;
use Illuminate\Http\Request;

use App\Mail\TicketCreatedUserMail;
use App\Mail\TicketCreatedAdminMail;
use App\Mail\TicketAnsweredUserMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Http;

class TicketPublicoController extends Controller
{
    public function store(StoreTicketRequest $request, $eventoId)
    {
        // 1. Verificar que el evento exista y esté publicado
        $evento = Evento::publicados()->findOrFail($eventoId);

        // 2. Crear el ticket directamente como texto plano (Sin crear usuarios)
        $ticket = $evento->tickets()->create([
            'nombre' => $request->nombre,
            'email' => $request->email,
            'asunto' => $request->asunto,
            'mensaje' => $request->mensaje,
            'estado' => 'abierto'
        ]);

        // 3. Lógica de IA (Gemini) si el evento tiene reglamento
        if ($evento->reglamento) {
            $this->processAIResponse($ticket, $evento);
        }

        // 5. Enviar emails iniciales (solo si el ticket sigue abierto)
        try {
            // Email de confirmación al usuario (siempre se envía)
            Mail::to($ticket->email)->send(new TicketCreatedUserMail($ticket));
            
            // Notificar al admin solo si NO ha sido resuelto por la IA
            if ($ticket->estado !== 'resuelto') {
                $adminEmail = env('ADMIN_EMAIL', 'juanantoniotwork@gmail.com');
                Mail::to($adminEmail)->send(new TicketCreatedAdminMail($ticket));
            }
        } catch (\Exception $e) {
            \Log::error('Error enviando emails de ticket: ' . $e->getMessage());
        }

        return response()->json($ticket, 201);
    }

    private function processAIResponse($ticket, $evento)
    {
        $apiKey = env('GEMINI_API_KEY');
        if (!$apiKey) {
            \Log::warning('IA: No se encontró GEMINI_API_KEY en el entorno.');
            return;
        }

        // Generar una clave única para la caché basada en el reglamento y la pregunta
        $cacheKey = 'ai_response_' . md5($evento->reglamento . '|' . $ticket->mensaje);

        \Log::info('IA: Iniciando análisis para ticket #' . $ticket->id . ' usando gemini-2.5-flash');

        $prompt = "Eres un asistente de carreras deportivas. Tienes este reglamento: [" . $evento->reglamento . "]. Un usuario ha preguntado: [" . $ticket->mensaje . "]. Responde SOLO con un JSON con dos campos: 'confianza' (número del 0 al 100 indicando cuánto se puede responder con el reglamento) y 'respuesta' (la respuesta basada en el reglamento, o null si la confianza es menor de 85). No añadas nada más.";

        try {
            // Intentar obtener la respuesta de la caché
            $aiData = \Illuminate\Support\Facades\Cache::remember($cacheKey, now()->addDays(7), function () use ($apiKey, $prompt) {
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
                            \Log::warning("IA: Servidor sobrecargado (503). Reintento $attempt de $maxTries en 5 segundos...");
                            if ($attempt < $maxTries) sleep(5);
                            continue;
                        }

                        \Log::error("IA: Error en API. Status: " . $response->status() . " - Body: " . $response->body());
                        break;

                    } catch (\Exception $e) {
                        \Log::error("IA: Fallo en intento $attempt: " . $e->getMessage());
                        if ($attempt < $maxTries) sleep(5);
                    }
                }

                return null;
            });

            if ($aiData && isset($aiData['confianza'])) {
                $confianza = $aiData['confianza'] ?? 0;
                \Log::info("IA: Nivel de confianza para el ticket #{$ticket->id}: $confianza%");

                if ($confianza >= 85 && !empty($aiData['respuesta'])) {
                    $ticket->update([
                        'respuesta' => $aiData['respuesta'] . "\n\n(Nota: Respuesta generada automáticamente basada en el reglamento oficial).",
                        'estado' => 'resuelto'
                    ]);
                    Mail::to($ticket->email)->send(new TicketAnsweredUserMail($ticket));
                    \Log::info("IA: Ticket #{$ticket->id} resuelto automáticamente.");
                } else {
                    \Log::info("IA: Confianza insuficiente. El ticket queda abierto.");
                }
            }
        } catch (\Exception $e) {
            \Log::error("IA: Excepción en el proceso: " . $e->getMessage());
        }
    }
}
