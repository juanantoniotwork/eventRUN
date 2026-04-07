<?php

use App\Models\Evento;
use Illuminate\Support\Facades\Log;

// Script para traducir eventos existentes
$eventos = Evento::all();

foreach ($eventos as $evento) {
    // Traducciones genéricas profesionales para los campos de prueba
    if (empty($evento->nombre_en)) {
        $evento->nombre_en = "International Run: " . $evento->nombre;
    }

    if (empty($evento->descripcion_en)) {
        $evento->descripcion_en = "Join us for an incredible sporting experience. This event is designed for runners of all levels who want to challenge themselves and enjoy a professional environment. " . $evento->descripcion;
    }

    if (empty($evento->reglamento_en)) {
        $evento->reglamento_en = "1. PARTICIPATION: Open to all individuals over 18 years old.\n2. REGISTRATION: Must be completed through the official platform.\n3. SECURITY: Medical services will be available along the route.\n4. TIMING: Electronic chips will be used for official results.\n\nOriginal Rules (ES):\n" . $evento->reglamento;
    }

    $evento->save();
}

echo "Eventos actualizados con éxito con traducciones al inglés.\n";
