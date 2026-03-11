@extends('layouts.app')

@section('content')
<div class="max-w-6xl mx-auto py-6">
    <div class="flex items-center justify-between mb-8 border-b border-slate-200 pb-4">
        <h1 class="text-xl font-bold text-slate-800 uppercase tracking-tight">Mis Carreras</h1>
        <a href="{{ route('gestor.eventos.create') }}" class="text-xs font-bold bg-slate-900 text-white px-4 py-2 rounded uppercase tracking-widest hover:bg-slate-800 transition-colors">
            + Nueva Carrera
        </a>
    </div>

    @if(session('success'))
        <div class="bg-emerald-50 border border-emerald-100 text-emerald-700 px-4 py-3 rounded-xl mb-6 text-sm font-bold">
            {{ session('success') }}
        </div>
    @endif

    <div class="bg-white border border-slate-200 rounded-lg overflow-hidden shadow-sm">
        <table class="w-full text-left border-collapse text-sm">
            <thead>
                <tr class="bg-slate-50 border-b border-slate-200">
                    <th class="px-6 py-3 font-bold text-slate-500 uppercase tracking-wider">Carrera</th>
                    <th class="px-6 py-3 font-bold text-slate-500 uppercase tracking-wider">Fecha</th>
                    <th class="px-6 py-3 font-bold text-slate-500 uppercase tracking-wider text-center">Reglamento</th>
                    <th class="px-6 py-3 font-bold text-slate-500 uppercase tracking-wider text-right">Operaciones</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-100">
                @forelse($eventos as $evento)
                    <tr class="hover:bg-slate-50/50 transition-colors">
                        <td class="px-6 py-4">
                            <p class="font-bold text-slate-900">{{ $evento->nombre }}</p>
                            <p class="text-[10px] text-slate-400 font-bold uppercase tracking-tight">{{ Str::limit($evento->descripcion, 50) }}</p>
                        </td>
                        <td class="px-6 py-4">
                            <span class="text-xs font-semibold text-slate-500">{{ $evento->fecha->format('d/m/Y') }}</span>
                        </td>
                        <td class="px-6 py-4 text-center">
                            @if($evento->reglamento)
                                <span class="text-[9px] font-bold text-emerald-600 bg-emerald-50 border border-emerald-100 px-2 py-0.5 rounded uppercase">Cargado</span>
                            @else
                                <span class="text-[9px] font-bold text-slate-400 bg-slate-50 border border-slate-100 px-2 py-0.5 rounded uppercase">Pendiente</span>
                            @endif
                        </td>
                        <td class="px-6 py-4 text-right space-x-4">
                            <a href="{{ route('gestor.eventos.edit', $evento->id) }}" class="text-xs font-bold text-blue-600 hover:underline">Editar</a>
                            <form action="{{ route('gestor.eventos.destroy', $evento->id) }}" method="POST" class="inline" onsubmit="return confirm('¿Eliminar esta carrera?')">
                                @csrf @method('DELETE')
                                <button type="submit" class="text-xs font-bold text-rose-500 hover:underline uppercase">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="px-6 py-12 text-center text-slate-400 italic">No has creado ninguna carrera todavía.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
