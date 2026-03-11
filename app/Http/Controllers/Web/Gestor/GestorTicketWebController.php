<?php

namespace App\Http\Controllers\Web\Gestor;

use App\Http\Controllers\Controller;
use App\Models\TicketSoporte;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Mail\TicketAnsweredUserMail;
use Illuminate\Support\Facades\Mail;

class GestorTicketWebController extends Controller
{
    public function index()
    {
        // Solo tickets de los eventos del gestor autenticado
        $tickets = TicketSoporte::whereIn('evento_id', Auth::user()->eventos()->pluck('id'))
            ->with('evento')
            ->orderBy('created_at', 'desc')
            ->get();

        return view('gestor.tickets.index', compact('tickets'));
    }

    public function show($id)
    {
        $ticket = TicketSoporte::whereIn('evento_id', Auth::user()->eventos()->pluck('id'))
            ->with('evento')
            ->findOrFail($id);

        return view('gestor.tickets.show', compact('ticket'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'respuesta' => 'required|string|min:5',
            'estado' => 'required|in:abierto,en_proceso,resuelto',
        ]);

        $ticket = TicketSoporte::whereIn('evento_id', Auth::user()->eventos()->pluck('id'))->findOrFail($id);
        
        $ticket->update([
            'respuesta' => $request->respuesta,
            'estado' => $request->estado,
        ]);

        // Enviar email de respuesta al usuario
        try {
            Mail::to($ticket->email)->send(new TicketAnsweredUserMail($ticket));
        } catch (\Exception $e) {
            \Log::error('Error enviando email de respuesta (Gestor): ' . $e->getMessage());
        }

        return redirect()->route('gestor.tickets.index')->with('success', 'Ticket respondido y email enviado.');
    }
}
