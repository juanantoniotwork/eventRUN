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
                    <label class="block text-[10px] font-bold text-slate-400 uppercase tracking-widest mb-2">Nombre de la Carrera (ES)</label>
                    <input type="text" name="nombre" value="{{ old('nombre') }}" required class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-lg focus:ring-2 focus:ring-blue-500 outline-none text-sm font-semibold">
                </div>
                <div>
                    <label class="block text-[10px] font-bold text-slate-400 uppercase tracking-widest mb-2">Event Name (EN) <span class="text-xs text-blue-500 normal-case ml-1">(Opcional)</span></label>
                    <input type="text" name="nombre_en" value="{{ old('nombre_en') }}" placeholder="English Name" class="w-full px-4 py-3 bg-blue-50/30 border border-blue-100 rounded-lg focus:ring-2 focus:ring-blue-500 outline-none text-sm font-semibold">
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-[10px] font-bold text-slate-400 uppercase tracking-widest mb-2">Fecha del Evento</label>
                    <input type="date" name="fecha" value="{{ old('fecha') }}" required class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-lg focus:ring-2 focus:ring-blue-500 outline-none text-sm font-semibold">
                </div>
                <div>
                    <label class="block text-[10px] font-bold text-slate-400 uppercase tracking-widest mb-2">URL de la Imagen (Unsplash/Pexels)</label>
                    <input type="url" name="imagen" value="{{ old('imagen') }}" placeholder="https://..." class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-lg focus:ring-2 focus:ring-blue-500 outline-none text-sm font-semibold">
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="md:col-span-2">
                    <label class="block text-[10px] font-bold text-slate-400 uppercase tracking-widest mb-2">Ubicación (Nombre del Lugar)</label>
                    <input type="text" name="ubicacion" value="{{ old('ubicacion') }}" placeholder="Ej: Parque del Retiro, Madrid" class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-lg focus:ring-2 focus:ring-blue-500 outline-none text-sm font-semibold">
                </div>
                <div>
                    <label class="block text-[10px] font-bold text-slate-400 uppercase tracking-widest mb-2">Latitud</label>
                    <input type="number" step="any" name="latitud" value="{{ old('latitud') }}" placeholder="Ej: 40.4167" class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-lg focus:ring-2 focus:ring-blue-500 outline-none text-sm font-semibold">
                </div>
                <div>
                    <label class="block text-[10px] font-bold text-slate-400 uppercase tracking-widest mb-2">Longitud</label>
                    <input type="number" step="any" name="longitud" value="{{ old('longitud') }}" placeholder="Ej: -3.7033" class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-lg focus:ring-2 focus:ring-blue-500 outline-none text-sm font-semibold">
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-[10px] font-bold text-slate-400 uppercase tracking-widest mb-2">Descripción General (ES)</label>
                    <textarea name="descripcion" rows="4" required class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-lg focus:ring-2 focus:ring-blue-500 outline-none text-sm font-medium">{{ old('descripcion') }}</textarea>
                </div>
                <div>
                    <label class="block text-[10px] font-bold text-slate-400 uppercase tracking-widest mb-2">Description (EN)</label>
                    <textarea name="descripcion_en" rows="4" placeholder="Description in English" class="w-full px-4 py-3 bg-blue-50/30 border border-blue-100 rounded-lg focus:ring-2 focus:ring-blue-500 outline-none text-sm font-medium">{{ old('descripcion_en') }}</textarea>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-[10px] font-bold text-slate-400 uppercase tracking-widest mb-2">Reglamento Oficial (ES)</label>
                    <textarea name="reglamento" rows="8" placeholder="Reglamento completo..." class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-lg focus:ring-2 focus:ring-blue-500 outline-none text-sm font-medium">{{ old('reglamento') }}</textarea>
                </div>
                <div>
                    <label class="block text-[10px] font-bold text-slate-400 uppercase tracking-widest mb-2">Rules & Regulations (EN)</label>
                    <textarea name="reglamento_en" rows="8" placeholder="Full rules in English..." class="w-full px-4 py-3 bg-blue-50/30 border border-blue-100 rounded-lg focus:ring-2 focus:ring-blue-500 outline-none text-sm font-medium">{{ old('reglamento_en') }}</textarea>
                </div>
            </div>
            <p class="mt-0 text-[10px] text-slate-400 font-medium italic">Estos textos serán la base de conocimiento para las respuestas automáticas de soporte.</p>
        </div>

        <div class="flex justify-end">
            <button type="submit" class="bg-slate-900 hover:bg-slate-800 text-white px-8 py-3 rounded-xl text-sm font-bold transition-all shadow-lg shadow-slate-200 uppercase tracking-widest">
                Publicar Carrera
            </button>
        </div>
    </form>
</div>
@endsection
