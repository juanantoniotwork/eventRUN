<?php

namespace App\Console\Commands;

use App\Models\Evento;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class TraducirEventosCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'eventos:traducir';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Traduce los campos de los eventos (nombre, descripcion, reglamento) al inglés usando la API de Gemini.';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $apiKey = config('services.gemini.key');

        if (!$apiKey) {
            $this->error('No se ha configurado GEMINI_API_KEY en el entorno.');
            return 1;
        }

        $eventos = Evento::whereNull('reglamento_en')
            ->orWhere('reglamento_en', '')
            ->orWhere('reglamento_en', 'like', '%Original Rules (ES)%')
            ->get();

        if ($eventos->isEmpty()) {
            $this->info('No hay eventos pendientes de traducción.');
            return 0;
        }

        $this->info('Traduciendo ' . $eventos->count() . ' eventos...');

        foreach ($eventos as $evento) {
            $this->info("Traduciendo evento: {$evento->nombre} (#{$evento->id})");

            $nombre_en = $this->translate($evento->nombre, $apiKey);
            $descripcion_en = $this->translate($evento->descripcion, $apiKey);
            $reglamento_en = $this->translate($evento->reglamento, $apiKey);

            if ($nombre_en && $descripcion_en && $reglamento_en) {
                $evento->update([
                    'nombre_en' => $nombre_en,
                    'descripcion_en' => $descripcion_en,
                    'reglamento_en' => $reglamento_en,
                ]);
                $this->info("Evento #{$evento->id} traducido correctamente.");
            } else {
                $this->error("Error al traducir el evento #{$evento->id}.");
            }
            
            // Pausa breve para evitar límites de tasa de la API (rate limit)
            sleep(1);
        }

        $this->info('Proceso de traducción finalizado.');
        return 0;
    }

    /**
     * Translate text using Gemini API.
     */
    private function translate($text, $apiKey)
    {
        if (empty($text)) return null;

        $url = "https://generativelanguage.googleapis.com/v1/models/gemini-2.5-flash:generateContent?key=$apiKey";
        
        $prompt = "Actúa como un traductor profesional de español a inglés. Traduce el siguiente texto manteniendo el formato original y el tono profesional. Responde ÚNICAMENTE con la traducción del texto, nada más:\n\n" . $text;

        try {
            $response = Http::timeout(60)->post($url, [
                'contents' => [
                    ['parts' => [['text' => $prompt]]]
                ]
            ]);

            if ($response->successful()) {
                $data = $response->json();
                $translatedText = $data['candidates'][0]['content']['parts'][0]['text'] ?? null;
                return $translatedText ? trim($translatedText) : null;
            }

            Log::error("Error en API de Gemini (Traducción): Status " . $response->status() . " - " . $response->body());
        } catch (\Exception $e) {
            Log::error("Excepción en traducción con Gemini: " . $e->getMessage());
        }

        return null;
    }
}
