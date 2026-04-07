@extends('layouts.app')

@section('content')
<div class="max-w-3xl mx-auto py-4">
    <div class="mb-6 pb-2 border-b border-gray-200 dark:border-slate-700 flex justify-between items-center">
        <h1 class="text-lg font-bold text-gray-800 dark:text-white">GESTIÓN TICKET #{{ $ticket->id }}</h1>
        <a href="{{ route('admin.tickets.index') }}" class="text-xs text-gray-500 dark:text-slate-400 hover:text-black dark:hover:text-white">VOLVER</a>
    </div>

    <div class="space-y-6 text-sm">
        <div class="text-gray-600 dark:text-slate-300">
            <p><strong class="text-slate-700 dark:text-slate-200">CARRERA:</strong> {{ $ticket->evento?->nombre ?? 'General' }}</p>
            <p><strong class="text-slate-700 dark:text-slate-200">REMITENTE:</strong> {{ $ticket->nombre }} ({{ $ticket->email }})</p>
            <p><strong class="text-slate-700 dark:text-slate-200">FECHA:</strong> {{ $ticket->created_at->format('d/m/Y H:i') }}</p>
            <p><strong class="text-slate-700 dark:text-slate-200">ESTADO ACTUAL:</strong> {{ strtoupper($ticket->estado) }}</p>
        </div>

        @if($ticket->identificador || $ticket->adjunto)
        <div class="bg-slate-50 dark:bg-slate-700/50 border border-slate-200 dark:border-slate-600 rounded-lg p-4 space-y-2">
            <p class="text-[10px] font-bold text-slate-400 dark:text-slate-500 uppercase tracking-widest flex items-center gap-1.5">
                <span class="w-1.5 h-1.5 bg-emerald-400 rounded-full"></span>
                Datos del protocolo de incidencias
            </p>
            @if($ticket->identificador)
            <p class="text-sm text-gray-700 dark:text-slate-300"><strong class="text-gray-500 dark:text-slate-400">Identificador:</strong> {{ $ticket->identificador }}</p>
            @endif
            @if($ticket->adjunto)
            <p class="text-sm text-gray-700 dark:text-slate-300">
                <strong class="text-gray-500 dark:text-slate-400">Adjunto:</strong>
                <a href="{{ Storage::url($ticket->adjunto) }}" target="_blank" class="text-blue-600 dark:text-blue-400 hover:underline ml-1">Ver archivo</a>
            </p>
            @endif
        </div>
        @endif

        <hr class="border-gray-100 dark:border-slate-700">

        <div>
            <h2 class="text-xs font-bold text-gray-400 dark:text-slate-500 mb-2 uppercase">Consulta:</h2>
            <div class="bg-gray-50 dark:bg-slate-700/50 p-4 border border-gray-200 dark:border-slate-600 rounded text-gray-800 dark:text-slate-200">
                {{ $ticket->mensaje }}
            </div>
        </div>

        <form action="{{ route('admin.tickets.update', $ticket->id) }}" method="POST" class="space-y-4">
            @csrf
            @method('PUT')
            <div>
                <h2 class="text-xs font-bold text-gray-400 dark:text-slate-500 mb-2 uppercase">Escribir Respuesta:</h2>
                <textarea name="respuesta" rows="5" required
                    class="w-full p-2 border border-gray-300 dark:border-slate-600 rounded bg-white dark:bg-slate-700 text-slate-800 dark:text-white focus:border-blue-500 outline-none font-sans">{{ old('respuesta', $ticket->respuesta) }}</textarea>
            </div>

            <div class="flex items-center gap-4">
                <div class="flex-1">
                    <select name="estado" required class="w-full p-2 border border-gray-300 dark:border-slate-600 rounded bg-white dark:bg-slate-700 text-slate-800 dark:text-white font-bold">
                        <option value="abierto" {{ $ticket->estado === 'abierto' ? 'selected' : '' }}>ABIERTO</option>
                        <option value="en_proceso" {{ $ticket->estado === 'en_proceso' ? 'selected' : '' }}>EN PROCESO</option>
                        <option value="resuelto" {{ $ticket->estado === 'resuelto' ? 'selected' : '' }}>RESUELTO</option>
                    </select>
                </div>
                <button type="submit" class="bg-gray-800 dark:bg-blue-600 text-white px-6 py-2 rounded font-bold text-xs uppercase tracking-widest hover:bg-black dark:hover:bg-blue-700 transition-colors">
                    Actualizar
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
