<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Evento;
use App\Models\TicketSoporte;
use Illuminate\Http\Request;

class PublicTicketController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'nombre'        => 'required|string|max:255',
            'email'         => 'required|email|max:255',
            'evento_id'     => 'nullable|exists:eventos,id',
            'asunto'        => 'required|string|max:255',
            'identificador' => 'required|string|max:255',
            'adjunto'       => 'required|file|mimes:jpg,jpeg,png,gif,webp,pdf,txt,log|max:5120',
            'mensaje'       => 'required|string|min:10',
        ]);

        $adjuntoPath = $request->file('adjunto')->store('tickets/adjuntos', 'public');

        TicketSoporte::create([
            'evento_id'     => $request->evento_id ?: null,
            'nombre'        => $request->nombre,
            'email'         => $request->email,
            'asunto'        => '[PRIORITARIO] ' . $request->asunto,
            'identificador' => $request->identificador,
            'mensaje'       => $request->mensaje,
            'adjunto'       => $adjuntoPath,
            'estado'        => 'abierto',
        ]);

        return redirect()->route('help-center')->with('ticket_enviado', true);
    }
}
