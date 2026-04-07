<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class EventoResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'nombre' => $this->nombre,
            'nombre_en' => $this->nombre_en,
            'descripcion' => $this->descripcion,
            'descripcion_en' => $this->descripcion_en,
            'reglamento' => $this->reglamento,
            'reglamento_en' => $this->reglamento_en,
            'fecha' => $this->fecha->format('Y-m-d H:i:s'),
            'imagen' => $this->imagen,
            'estado' => $this->estado,
            'ubicacion' => $this->ubicacion,
            'latitud' => $this->latitud,
            'longitud' => $this->longitud,
            'created_at' => $this->created_at->format('Y-m-d H:i:s'),
        ];
    }
}
