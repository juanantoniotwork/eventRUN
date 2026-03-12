<?php

namespace App\Http\Controllers\Api\Public;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTicketRequest;
use App\Models\Evento;
use App\Http\Resources\TicketSoporteResource;
use App\Services\AIService;
use App\Mail\TicketCreatedUserMail;
use App\Mail\TicketCreatedAdminMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;

class TicketPublicoController extends Controller
{
    /**
     * Create a new ticket for a specific event.
     */
    public function store(StoreTicketRequest $request, int $eventoId, AIService $aiService): TicketSoporteResource
    {
        $evento = Evento::publicados()->findOrFail($eventoId);

        $ticket = $evento->tickets()->create([
            'nombre' => $request->nombre,
            'email' => $request->email,
            'asunto' => $request->asunto,
            'mensaje' => $request->mensaje,
            'estado' => 'abierto'
        ]);

        $aiService->processTicket($ticket, $evento);

        $this->sendInitialEmails($ticket);

        return new TicketSoporteResource($ticket);
    }

    /**
     * Send confirmation and notification emails.
     */
    private function sendInitialEmails($ticket): void
    {
        try {
            Mail::to($ticket->email)->send(new TicketCreatedUserMail($ticket));
            
            if ($ticket->estado !== 'resuelto') {
                $adminEmail = config('mail.from.address', 'admin@gestordeeventos.com');
                Mail::to($adminEmail)->send(new TicketCreatedAdminMail($ticket));
            }
        } catch (\Exception $e) {
            Log::error('Error enviando emails de ticket: ' . $e->getMessage());
        }
    }
}
