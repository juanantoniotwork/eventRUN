<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Evento;
use Illuminate\Http\Request;

use Barryvdh\DomPDF\Facade\Pdf;

class EventoWebController extends Controller
{
    public function index()
    {
        $eventos = Evento::publicados()
            ->orderBy('fecha', 'asc')
            ->get();

        return view('eventos.index', compact('eventos'));
    }

    public function show($id)
    {
        $evento = Evento::publicados()->findOrFail($id);

        return view('eventos.show', compact('evento'));
    }

    public function reglamento($id)
    {
        $evento = Evento::findOrFail($id);

        if (!$evento->reglamento) {
            abort(404, 'Este evento no dispone de reglamento cargado.');
        }

        $pdf = Pdf::loadView('pdf.reglamento', compact('evento'));
        return $pdf->download('Reglamento_' . str_replace(' ', '_', $evento->nombre) . '.pdf');
    }
}
