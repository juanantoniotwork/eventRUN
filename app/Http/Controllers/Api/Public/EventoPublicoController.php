<?php

namespace App\Http\Controllers\Api\Public;

use App\Http\Controllers\Controller;
use App\Models\Evento;
use Illuminate\Http\Request;

class EventoPublicoController extends Controller
{
    public function index()
    {
        $eventos = Evento::publicados()
            ->select('id', 'nombre', 'fecha', 'imagen')
            ->orderBy('fecha', 'asc')
            ->get();

        return response()->json($eventos);
    }

    public function show($id)
    {
        $evento = Evento::publicados()->findOrFail($id);

        return response()->json($evento);
    }
}
