<?php

namespace App\Http\Controllers\Web\Gestor;

use App\Http\Controllers\Controller;
use App\Models\Evento;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GestorEventoWebController extends Controller
{
    public function index()
    {
        $eventos = Auth::user()->eventos()->orderBy('fecha', 'desc')->get();
        return view('gestor.eventos.index', compact('eventos'));
    }

    public function create()
    {
        return view('gestor.eventos.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'required|string',
            'fecha' => 'required|date',
            'imagen' => 'nullable|url',
            'reglamento' => 'nullable|string',
        ]);

        $validated['estado'] = 'publicado';

        Auth::user()->eventos()->create($validated);

        return redirect()->route('gestor.eventos.index')->with('success', 'Evento creado correctamente.');
    }

    public function edit($id)
    {
        $evento = Auth::user()->eventos()->findOrFail($id);
        return view('gestor.eventos.edit', compact('evento'));
    }

    public function update(Request $request, $id)
    {
        $evento = Auth::user()->eventos()->findOrFail($id);

        $validated = $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'required|string',
            'fecha' => 'required|date',
            'imagen' => 'nullable|url',
            'reglamento' => 'nullable|string',
        ]);

        $evento->update($validated);

        return redirect()->route('gestor.eventos.index')->with('success', 'Evento actualizado correctamente.');
    }

    public function destroy($id)
    {
        $evento = Auth::user()->eventos()->findOrFail($id);
        $evento->delete();

        return redirect()->route('gestor.eventos.index')->with('success', 'Evento eliminado.');
    }
}
