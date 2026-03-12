<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TicketSoporteResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'evento' => $this->whenLoaded('evento', function() {
                return [
                    'id' => $this->evento->id,
                    'nombre' => $this->evento->nombre,
                ];
            }),
            'nombre' => $this->nombre,
            'email' => $this->email,
            'asunto' => $this->asunto,
            'mensaje' => $this->mensaje,
            'respuesta' => $this->respuesta,
            'estado' => $this->estado,
            'created_at' => $this->created_at->format('Y-m-d H:i:s'),
            'updated_at' => $this->updated_at->format('Y-m-d H:i:s'),
        ];
    }
}
