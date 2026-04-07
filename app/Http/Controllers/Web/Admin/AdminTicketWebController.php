<?php

namespace App\Http\Controllers\Web\Admin;

use App\Http\Controllers\Controller;
use App\Models\TicketSoporte;
use Illuminate\Http\Request;

use App\Mail\TicketAnsweredUserMail;
use Illuminate\Support\Facades\Mail;

class AdminTicketWebController extends Controller
{
    public function index()
    {
        $tickets = TicketSoporte::with('evento')->orderBy('created_at', 'desc')->get();
        return view('admin.tickets.index', compact('tickets'));
    }

    public function show($id)
    {
        $ticket = TicketSoporte::with('evento')->findOrFail($id);
        return view('admin.tickets.show', compact('ticket'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'respuesta' => 'required|string|min:5',
            'estado' => 'required|in:abierto,en_proceso,resuelto',
        ]);

        $ticket = TicketSoporte::findOrFail($id);
        
        $ticket->update([
            'respuesta' => $request->respuesta,
            'estado' => $request->estado,
        ]);

        // Enviar email de respuesta al usuario
        try {
            Mail::to($ticket->email)->send(new TicketAnsweredUserMail($ticket));
        } catch (\Exception $e) {
            \Log::error('Error enviando email de respuesta (Admin): ' . $e->getMessage());
        }

        return redirect()->route('admin.tickets.index')->with('success', 'Ticket (Admin) actualizado y email enviado.');
    }

    public function destroy($id)
    {
        TicketSoporte::findOrFail($id)->delete();
        return redirect()->route('admin.tickets.index')->with('success', 'Ticket eliminado.');
    }
}
