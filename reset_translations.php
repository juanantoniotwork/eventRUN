<?php

use App\Models\Evento;

$count = Evento::query()->update([
    'nombre_en' => null,
    'descripcion_en' => null,
    'reglamento_en' => null,
]);

echo "Campos en inglés de $count eventos reseteados a NULL.\n";
