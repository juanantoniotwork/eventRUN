<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Evento;
use App\Http\Resources\EventoResource;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\App;

use Barryvdh\DomPDF\Facade\Pdf;

class EventoWebController extends Controller
{
    public function index()
    {
        $eventos = Evento::publicados()
            ->orderBy('fecha', 'asc')
            ->get();

        return Inertia::render('Eventos/Index', [
            'eventos' => EventoResource::collection($eventos)
        ]);
    }

    public function show($id)
    {
        $evento = Evento::publicados()->findOrFail($id);

        return Inertia::render('Eventos/Show', [
            'evento' => new EventoResource($evento)
        ]);
    }

    public function reglamento(Request $request, $id)
    {
        $evento = Evento::findOrFail($id);
        $lang = $request->get('lang', 'es');

        if (!$evento->reglamento) {
            abort(404, 'Este evento no dispone de reglamento cargado.');
        }

        $pdf = Pdf::loadView('pdf.reglamento', compact('evento', 'lang'));
        
        $filename = ($lang === 'es' ? 'Reglamento_' : 'Rules_') . 
                    str_replace(' ', '_', $evento->nombre) . '.pdf';

        return $pdf->download($filename);
    }
}
