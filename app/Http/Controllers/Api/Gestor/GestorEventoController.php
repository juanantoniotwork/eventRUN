<?php

namespace App\Http\Controllers\Api\Gestor;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreEventoRequest;
use App\Models\Evento;
use App\Http\Resources\EventoResource;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class GestorEventoController extends Controller
{
    /**
     * Display a listing of the gestor's events.
     */
    public function index(Request $request): AnonymousResourceCollection
    {
        return EventoResource::collection($request->user()->eventos);
    }

    /**
     * Store a newly created event in storage.
     */
    public function store(StoreEventoRequest $request): EventoResource
    {
        $evento = $request->user()->eventos()->create($request->validated());
        return new EventoResource($evento);
    }

    /**
     * Update the specified event in storage.
     */
    public function update(StoreEventoRequest $request, int $id): EventoResource
    {
        $evento = $request->user()->eventos()->findOrFail($id);
        $evento->update($request->validated());
        return new EventoResource($evento);
    }

    /**
     * Remove the specified event from storage.
     */
    public function destroy(Request $request, int $id): JsonResponse
    {
        $evento = $request->user()->eventos()->findOrFail($id);
        $evento->delete();
        
        return response()->json(['message' => 'Evento eliminado correctamente.']);
    }
}
