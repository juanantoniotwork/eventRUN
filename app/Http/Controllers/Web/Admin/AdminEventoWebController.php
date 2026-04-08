<?php

namespace App\Http\Controllers\Web\Admin;

use App\Http\Controllers\Controller;
use App\Models\Evento;
use Illuminate\Http\Request;

class AdminEventoWebController extends Controller
{
    public function index()
    {
        $eventos = Evento::with('user')->orderBy('fecha')->get();
        return view('admin.eventos.index', compact('eventos'));
    }

    public function edit($id)
    {
        $evento = Evento::findOrFail($id);
        return view('admin.eventos.edit', compact('evento'));
    }

    public function update(Request $request, $id)
    {
        $evento = Evento::findOrFail($id);

        $data = $request->validate([
            'nombre'        => 'required|string|max:255',
            'nombre_en'     => 'nullable|string|max:255',
            'descripcion'   => 'required|string',
            'descripcion_en'=> 'nullable|string',
            'fecha'         => 'required|date',
            'imagen'        => 'nullable|url',
            'estado'        => 'required|in:borrador,publicado',
            'ubicacion'     => 'nullable|string|max:255',
            'latitud'       => 'nullable|numeric',
            'longitud'      => 'nullable|numeric',
            'reglamento'    => 'nullable|string',
            'reglamento_en' => 'nullable|string',
        ]);

        $evento->update($data);

        return redirect()->route('admin.eventos.index')->with('success', 'Carrera actualizada correctamente.');
    }

    public function destroy($id)
    {
        $evento = Evento::findOrFail($id);
        $evento->delete();

        return redirect()->route('admin.eventos.index')->with('success', 'Carrera eliminada correctamente.');
    }
}
