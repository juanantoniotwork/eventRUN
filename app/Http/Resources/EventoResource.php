<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class EventoResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $locale = $request->header('Accept-Language', 'es');

        return [
            'id' => $this->id,
            'nombre' => $locale === 'en' && $this->nombre_en ? $this->nombre_en : $this->nombre,
            'descripcion' => $locale === 'en' && $this->descripcion_en ? $this->descripcion_en : $this->descripcion,
            'reglamento' => $locale === 'en' && $this->reglamento_en ? $this->reglamento_en : $this->reglamento,
            'fecha' => $this->fecha->format('Y-m-d H:i:s'),
            'imagen' => $this->imagen,
            'estado' => $this->estado,
            'ubicacion' => $this->ubicacion,
            'latitud' => $this->latitud,
            'longitud' => $this->longitud,
            'user' => $this->whenLoaded('user', function() {
                return [
                    'id' => $this->user->id,
                    'name' => $this->user->name,
                ];
            }),
            'created_at' => $this->created_at->format('Y-m-d H:i:s'),
            'updated_at' => $this->updated_at->format('Y-m-d H:i:s'),
        ];
    }
}
