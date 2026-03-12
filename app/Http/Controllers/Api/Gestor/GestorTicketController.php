<?php

namespace App\Http\Controllers\Api\Gestor;

use App\Http\Controllers\Controller;
use App\Http\Resources\TicketSoporteResource;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class GestorTicketController extends Controller
{
    /**
     * Display a listing of tickets for the gestor's events.
     */
    public function index(Request $request): AnonymousResourceCollection
    {
        return TicketSoporteResource::collection($request->user()->tickets);
    }

    /**
     * Display the specified ticket.
     */
    public function show(Request $request, int $id): TicketSoporteResource
    {
        $ticket = $request->user()->tickets()->findOrFail($id);
        return new TicketSoporteResource($ticket);
    }

    /**
     * Update the specified ticket in storage.
     */
    public function update(Request $request, int $id): TicketSoporteResource
    {
        $request->validate([
            'respuesta' => 'nullable|string',
            'estado' => 'required|in:abierto,en_proceso,resuelto',
        ]);

        $ticket = $request->user()->tickets()->findOrFail($id);
        $ticket->update($request->only(['respuesta', 'estado']));

        return new TicketSoporteResource($ticket);
    }

    /**
     * Get the count of open tickets for the gestor's events.
     */
    public function countOpen(Request $request): JsonResponse
    {
        $count = $request->user()->tickets()->open()->count();
            
        return response()->json(['count' => $count]);
    }
}
