@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto py-6">
    <div class="flex items-center justify-between mb-8 border-b border-slate-200 pb-4">
        <h1 class="text-xl font-bold text-slate-800 uppercase tracking-tight">Nueva Carrera</h1>
        <a href="{{ route('gestor.eventos.index') }}" class="text-xs font-bold text-slate-500 hover:text-slate-800 uppercase tracking-widest">
            Volver
        </a>
    </div>

    <form action="{{ route('gestor.eventos.store') }}" method="POST" class="space-y-6">
        @csrf
        <div class="bg-white border border-slate-200 rounded-xl p-8 shadow-sm space-y-6">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-[10px] font-bold text-slate-400 uppercase tracking-widest mb-2">Nombre de la Carrera</label>
                    <input type="text" name="nombre" value="{{ old('nombre') }}" required class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-lg focus:ring-2 focus:ring-blue-500 outline-none text-sm font-semibold">
                </div>
                <div>
                    <label class="block text-[10px] font-bold text-slate-400 uppercase tracking-widest mb-2">Fecha del Evento</label>
                    <input type="date" name="fecha" value="{{ old('fecha') }}" required class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-lg focus:ring-2 focus:ring-blue-500 outline-none text-sm font-semibold">
                </div>
            </div>

            <div>
                <label class="block text-[10px] font-bold text-slate-400 uppercase tracking-widest mb-2">URL de la Imagen (Unsplash/Pexels)</label>
                <input type="url" name="imagen" value="{{ old('imagen') }}" placeholder="https://..." class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-lg focus:ring-2 focus:ring-blue-500 outline-none text-sm font-semibold">
            </div>

            <div>
                <label class="block text-[10px] font-bold text-slate-400 uppercase tracking-widest mb-2">Descripción General</label>
                <textarea name="descripcion" rows="4" required class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-lg focus:ring-2 focus:ring-blue-500 outline-none text-sm font-medium">{{ old('descripcion') }}</textarea>
            </div>

            <div>
                <label class="block text-[10px] font-bold text-slate-400 uppercase tracking-widest mb-2">Reglamento Oficial (IA Knowledge Base)</label>
                <textarea name="reglamento" rows="8" placeholder="Pega aquí el reglamento completo. Nuestra IA lo usará para responder tickets automáticamente." class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-lg focus:ring-2 focus:ring-blue-500 outline-none text-sm font-medium">{{ old('reglamento') }}</textarea>
                <p class="mt-2 text-[10px] text-slate-400 font-medium italic">Este texto será la base de conocimiento para las respuestas automáticas de soporte.</p>
            </div>
        </div>

        <div class="flex justify-end">
            <button type="submit" class="bg-slate-900 hover:bg-slate-800 text-white px-8 py-3 rounded-xl text-sm font-bold transition-all shadow-lg shadow-slate-200 uppercase tracking-widest">
                Publicar Carrera
            </button>
        </div>
    </form>
</div>
@endsection
