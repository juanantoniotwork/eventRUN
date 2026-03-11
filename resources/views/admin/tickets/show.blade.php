@extends('layouts.app')

@section('content')
<div class="max-w-3xl mx-auto py-4">
    <div class="mb-6 pb-2 border-b border-gray-200 flex justify-between items-center">
        <h1 class="text-lg font-bold text-gray-800">GESTIÓN TICKET #{{ $ticket->id }}</h1>
        <a href="{{ route('admin.tickets.index') }}" class="text-xs text-gray-500 hover:text-black">VOLVER</a>
    </div>

    <div class="space-y-6 text-sm">
        <!-- Info básica -->
        <div class="text-gray-600">
            <p><strong>CARRERA:</strong> {{ $ticket->evento->nombre }}</p>
            <p><strong>REMITENTE:</strong> {{ $ticket->nombre }} ({{ $ticket->email }})</p>
            <p><strong>FECHA:</strong> {{ $ticket->created_at->format('d/m/Y H:i') }}</p>
            <p><strong>ESTADO ACTUAL:</strong> {{ strtoupper($ticket->estado) }}</p>
        </div>

        <hr class="border-gray-100">

        <!-- Mensaje -->
        <div>
            <h2 class="text-xs font-bold text-gray-400 mb-2 uppercase">Consulta:</h2>
            <div class="bg-gray-50 p-4 border border-gray-200 rounded text-gray-800">
                {{ $ticket->mensaje }}
            </div>
        </div>

        <!-- Formulario -->
        <form action="{{ route('admin.tickets.update', $ticket->id) }}" method="POST" class="space-y-4">
            @csrf
            @method('PUT')
            
            <div>
                <h2 class="text-xs font-bold text-gray-400 mb-2 uppercase">Escribir Respuesta:</h2>
                <textarea name="respuesta" rows="5" required class="w-full p-2 border border-gray-300 rounded focus:border-black outline-none font-sans">{{ old('respuesta', $ticket->respuesta) }}</textarea>
            </div>

            <div class="flex items-center gap-4">
                <div class="flex-1">
                    <select name="estado" required class="w-full p-2 border border-gray-300 rounded bg-white font-bold">
                        <option value="abierto" {{ $ticket->estado === 'abierto' ? 'selected' : '' }}>ABIERTO</option>
                        <option value="en_proceso" {{ $ticket->estado === 'en_proceso' ? 'selected' : '' }}>EN PROCESO</option>
                        <option value="resuelto" {{ $ticket->estado === 'resuelto' ? 'selected' : '' }}>RESUELTO</option>
                    </select>
                </div>
                <button type="submit" class="bg-gray-800 text-white px-6 py-2 rounded font-bold text-xs uppercase tracking-widest hover:bg-black transition-colors">
                    Actualizar
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
