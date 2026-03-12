<?php

namespace App\Http\Controllers\Api\Public;

use App\Http\Controllers\Controller;
use App\Models\Evento;
use App\Http\Resources\EventoResource;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class EventoPublicoController extends Controller
{
    /**
     * Display a listing of public events.
     */
    public function index(): AnonymousResourceCollection
    {
        $eventos = Evento::publicados()
            ->orderBy('fecha', 'asc')
            ->get();

        return EventoResource::collection($eventos);
    }

    /**
     * Display the specified public event.
     */
    public function show(int $id): EventoResource
    {
        $evento = Evento::publicados()->findOrFail($id);

        return new EventoResource($evento);
    }
}
