<?php

namespace App\Http\Controllers\Api\Gestor;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreEventoRequest;
use App\Models\Evento;
use Illuminate\Http\Request;

class GestorEventoController extends Controller
{
    public function index(Request $request)
    {
        return response()->json($request->user()->eventos);
    }

    public function store(StoreEventoRequest $request)
    {
        $evento = $request->user()->eventos()->create($request->validated());
        return response()->json($evento, 201);
    }

    public function update(StoreEventoRequest $request, $id)
    {
        $evento = $request->user()->eventos()->findOrFail($id);
        $evento->update($request->validated());
        return response()->json($evento);
    }

    public function destroy(Request $request, $id)
    {
        $evento = $request->user()->eventos()->findOrFail($id);
        $evento->delete();
        return response()->json(['message' => 'Evento eliminado correctamente.']);
    }
}
