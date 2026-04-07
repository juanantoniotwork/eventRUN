@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto py-4">
    <div class="mb-6 border-b border-gray-300 dark:border-slate-700 pb-2 flex justify-between items-center">
        <h1 class="text-lg font-bold text-gray-800 dark:text-white">MIS TICKETS DE SOPORTE</h1>
        <span class="text-xs text-gray-500 dark:text-slate-400">Total: {{ $tickets->count() }}</span>
    </div>

    <table class="w-full border-collapse text-sm">
        <thead>
            <tr class="border-b-2 border-gray-200 dark:border-slate-700 text-left text-gray-400 dark:text-slate-500">
                <th class="py-2 px-2 font-bold">ID</th>
                <th class="py-2 px-2 font-bold">CARRERA / ASUNTO</th>
                <th class="py-2 px-2 font-bold text-center">ESTADO</th>
                <th class="py-2 px-2 font-bold text-right">ACCIÓN</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-100 dark:divide-slate-700">
            @forelse($tickets as $ticket)
                <tr class="hover:bg-slate-50 dark:hover:bg-slate-700/30 transition-colors">
                    <td class="py-3 px-2 text-gray-400 dark:text-slate-500">#{{ $ticket->id }}</td>
                    <td class="py-3 px-2">
                        <div class="font-bold text-gray-800 dark:text-white">{{ $ticket->asunto }}</div>
                        <div class="text-xs text-gray-500 dark:text-slate-400">{{ $ticket->evento->nombre }} - {{ $ticket->nombre }}</div>
                    </td>
                    <td class="py-3 px-2 text-center">
                        <span class="text-[10px] font-bold border border-gray-300 dark:border-slate-600 px-2 py-0.5 rounded uppercase text-gray-600 dark:text-slate-400">
                            {{ $ticket->estado }}
                        </span>
                    </td>
                    <td class="py-3 px-2 text-right">
                        <a href="{{ route('gestor.tickets.show', $ticket->id) }}" class="text-blue-600 dark:text-blue-400 font-bold hover:underline">GESTIONAR</a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="py-10 text-center text-gray-400 dark:text-slate-500 italic border-none">No tienes tickets asignados.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
