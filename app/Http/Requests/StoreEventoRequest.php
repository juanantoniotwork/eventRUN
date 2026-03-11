<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreEventoRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'nombre' => 'required|string|max:255',
            'fecha' => 'required|date|after:today',
            'estado' => 'required|in:borrador,publicado,cancelado',
            'descripcion' => 'nullable|string',
            'imagen' => 'nullable|string|max:255',
        ];
    }
}
