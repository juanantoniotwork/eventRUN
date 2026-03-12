<?php
use App\Models\Evento;

$translations = [
    1 => ['name' => 'New York City Marathon 2026', 'desc' => 'Join the world\'s most iconic race through the five boroughs of NYC.', 'rules' => '1. Bib must be visible. 2. Follow the blue line. 3. Official timing via chip.'],
    2 => ['name' => 'Berlin Marathon 2026', 'desc' => 'The fastest course in the world. Experience the historic streets of Berlin.', 'rules' => '1. Skating not allowed. 2. Respect the pacemakers. 3. Finish at Brandenburg Gate.'],
    3 => ['name' => 'London Marathon 2026', 'desc' => 'Run for charity and glory in the heart of the United Kingdom.', 'rules' => '1. Start at Blackheath. 2. Water stations every 5km. 3. Medals at the Mall.'],
    4 => ['name' => 'Boston Marathon 2026', 'desc' => 'The oldest and most prestigious annual marathon in the world.', 'rules' => '1. Qualification required. 2. Heartbreak Hill is at mile 20. 3. Unicorn medal for finishers.'],
    5 => ['name' => 'Tokyo Marathon 2026', 'desc' => 'The day Tokyo unites. A journey through tradition and modernity.', 'rules' => '1. Respect the volunteers. 2. Time limit: 7 hours. 3. Japanese hospitality included.'],
    6 => ['name' => 'Chicago Marathon 2026', 'desc' => 'A flat and fast course through 29 diverse neighborhoods.', 'rules' => '1. Grant Park start/finish. 2. No backpacks allowed. 3. Post-race party at the finish line.']
];

foreach ($translations as $id => $data) {
    $evento = Evento::find($id);
    if ($evento) {
        $evento->update([
            'nombre_en' => $data['name'],
            'descripcion_en' => $data['desc'],
            'reglamento_en' => $data['rules']
            // 'ubicacion' ya está en inglés ('New York, USA', etc.) por el paso anterior
        ]);
    }
}
echo "Traducciones completadas correctamente.\n";
