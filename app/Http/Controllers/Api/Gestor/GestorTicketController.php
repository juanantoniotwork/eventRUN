<?php

namespace App\Http\Controllers\Api\Gestor;

use App\Http\Controllers\Controller;
use App\Models\TicketSoporte;
use Illuminate\Http\Request;

class GestorTicketController extends Controller
{
    public function index(Request $request)
    {
        $tickets = TicketSoporte::whereIn('evento_id', $request->user()->eventos()->pluck('id'))->get();
        return response()->json($tickets);
    }

    public function show(Request $request, $id)
    {
        $ticket = TicketSoporte::whereIn('evento_id', $request->user()->eventos()->pluck('id'))->findOrFail($id);
        return response()->json($ticket);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'respuesta' => 'nullable|string',
            'estado' => 'required|in:abierto,en_proceso,resuelto',
        ]);

        $ticket = TicketSoporte::whereIn('evento_id', $request->user()->eventos()->pluck('id'))->findOrFail($id);
        $ticket->update($request->only(['respuesta', 'estado']));

        return response()->json($ticket);
    }
}
