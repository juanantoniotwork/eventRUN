@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto py-6">
    <div class="flex items-center justify-between mb-8 border-b border-slate-200 dark:border-slate-700 pb-4">
        <h1 class="text-xl font-bold text-slate-800 dark:text-white uppercase tracking-tight">Editar Carrera</h1>
        <a href="{{ route('admin.eventos.index') }}" class="text-xs font-bold text-slate-500 dark:text-slate-400 hover:text-slate-800 dark:hover:text-white uppercase tracking-widest">
            Volver
        </a>
    </div>

    @if($errors->any())
        <div class="mb-4 px-4 py-3 bg-red-50 dark:bg-red-900/20 border border-red-200 dark:border-red-800 text-red-700 dark:text-red-400 rounded-lg text-sm">
            <ul class="list-disc list-inside space-y-1">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.eventos.update', $evento->id) }}" method="POST" class="space-y-6">
        @csrf
        @method('PUT')
        <div class="bg-white dark:bg-slate-800 border border-slate-200 dark:border-slate-700 rounded-xl p-8 shadow-sm space-y-6">

            {{-- Código identificador --}}
            <div class="flex items-center gap-3 bg-slate-50 dark:bg-slate-700/50 border border-slate-200 dark:border-slate-600 rounded-lg px-4 py-3">
                <svg class="w-4 h-4 text-slate-400 flex-shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M7 20l4-16m2 16l4-16M6 9h14M4 15h14"/>
                </svg>
                <div>
                    <p class="text-[10px] font-bold text-slate-400 dark:text-slate-500 uppercase tracking-widest">Identificador único</p>
                    <p class="text-sm font-mono font-bold text-blue-600 dark:text-blue-400 mt-0.5">{{ $evento->codigo }}</p>
                </div>
            </div>

            {{-- Nombre --}}
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-[10px] font-bold text-slate-400 dark:text-slate-500 uppercase tracking-widest mb-2">Nombre (ES)</label>
                    <input type="text" name="nombre" value="{{ old('nombre', $evento->nombre) }}" required
                        class="w-full px-4 py-3 bg-slate-50 dark:bg-slate-700 border border-slate-200 dark:border-slate-600 rounded-lg focus:ring-2 focus:ring-blue-500 outline-none text-sm font-semibold text-slate-800 dark:text-white">
                </div>
                <div>
                    <label class="block text-[10px] font-bold text-slate-400 dark:text-slate-500 uppercase tracking-widest mb-2">Event Name (EN) <span class="text-xs text-blue-500 normal-case ml-1">(Opcional)</span></label>
                    <input type="text" name="nombre_en" value="{{ old('nombre_en', $evento->nombre_en) }}" placeholder="English Name"
                        class="w-full px-4 py-3 bg-blue-50/30 dark:bg-blue-900/10 border border-blue-100 dark:border-blue-800/50 rounded-lg focus:ring-2 focus:ring-blue-500 outline-none text-sm font-semibold text-slate-800 dark:text-white">
                </div>
            </div>

            {{-- Fecha, Imagen y Estado --}}
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div>
                    <label class="block text-[10px] font-bold text-slate-400 dark:text-slate-500 uppercase tracking-widest mb-2">Fecha</label>
                    <input type="date" name="fecha" value="{{ old('fecha', $evento->fecha->format('Y-m-d')) }}" required
                        class="w-full px-4 py-3 bg-slate-50 dark:bg-slate-700 border border-slate-200 dark:border-slate-600 rounded-lg focus:ring-2 focus:ring-blue-500 outline-none text-sm font-semibold text-slate-800 dark:text-white">
                </div>
                <div>
                    <label class="block text-[10px] font-bold text-slate-400 dark:text-slate-500 uppercase tracking-widest mb-2">Estado</label>
                    <select name="estado"
                        class="w-full px-4 py-3 bg-slate-50 dark:bg-slate-700 border border-slate-200 dark:border-slate-600 rounded-lg focus:ring-2 focus:ring-blue-500 outline-none text-sm font-semibold text-slate-800 dark:text-white">
                        <option value="borrador" {{ old('estado', $evento->estado) === 'borrador' ? 'selected' : '' }}>Borrador</option>
                        <option value="publicado" {{ old('estado', $evento->estado) === 'publicado' ? 'selected' : '' }}>Publicado</option>
                    </select>
                </div>
                <div>
                    <label class="block text-[10px] font-bold text-slate-400 dark:text-slate-500 uppercase tracking-widest mb-2">URL de la Imagen</label>
                    <input type="url" name="imagen" value="{{ old('imagen', $evento->imagen) }}" placeholder="https://..."
                        class="w-full px-4 py-3 bg-slate-50 dark:bg-slate-700 border border-slate-200 dark:border-slate-600 rounded-lg focus:ring-2 focus:ring-blue-500 outline-none text-sm font-semibold text-slate-800 dark:text-white">
                </div>
            </div>

            {{-- Ubicación --}}
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div class="md:col-span-1">
                    <label class="block text-[10px] font-bold text-slate-400 dark:text-slate-500 uppercase tracking-widest mb-2">Ubicación</label>
                    <input type="text" name="ubicacion" value="{{ old('ubicacion', $evento->ubicacion) }}" placeholder="Ej: Parque del Retiro, Madrid"
                        class="w-full px-4 py-3 bg-slate-50 dark:bg-slate-700 border border-slate-200 dark:border-slate-600 rounded-lg focus:ring-2 focus:ring-blue-500 outline-none text-sm font-semibold text-slate-800 dark:text-white">
                </div>
                <div>
                    <label class="block text-[10px] font-bold text-slate-400 dark:text-slate-500 uppercase tracking-widest mb-2">Latitud</label>
                    <input type="number" step="any" name="latitud" value="{{ old('latitud', $evento->latitud) }}" placeholder="Ej: 40.4167"
                        class="w-full px-4 py-3 bg-slate-50 dark:bg-slate-700 border border-slate-200 dark:border-slate-600 rounded-lg focus:ring-2 focus:ring-blue-500 outline-none text-sm font-semibold text-slate-800 dark:text-white">
                </div>
                <div>
                    <label class="block text-[10px] font-bold text-slate-400 dark:text-slate-500 uppercase tracking-widest mb-2">Longitud</label>
                    <input type="number" step="any" name="longitud" value="{{ old('longitud', $evento->longitud) }}" placeholder="Ej: -3.7033"
                        class="w-full px-4 py-3 bg-slate-50 dark:bg-slate-700 border border-slate-200 dark:border-slate-600 rounded-lg focus:ring-2 focus:ring-blue-500 outline-none text-sm font-semibold text-slate-800 dark:text-white">
                </div>
            </div>

            {{-- Descripción --}}
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-[10px] font-bold text-slate-400 dark:text-slate-500 uppercase tracking-widest mb-2">Descripción (ES)</label>
                    <textarea name="descripcion" rows="4" required
                        class="w-full px-4 py-3 bg-slate-50 dark:bg-slate-700 border border-slate-200 dark:border-slate-600 rounded-lg focus:ring-2 focus:ring-blue-500 outline-none text-sm font-medium text-slate-800 dark:text-white">{{ old('descripcion', $evento->descripcion) }}</textarea>
                </div>
                <div>
                    <label class="block text-[10px] font-bold text-slate-400 dark:text-slate-500 uppercase tracking-widest mb-2">Description (EN) <span class="text-xs text-blue-500 normal-case ml-1">(Opcional)</span></label>
                    <textarea name="descripcion_en" rows="4" placeholder="English description..."
                        class="w-full px-4 py-3 bg-blue-50/30 dark:bg-blue-900/10 border border-blue-100 dark:border-blue-800/50 rounded-lg focus:ring-2 focus:ring-blue-500 outline-none text-sm font-medium text-slate-800 dark:text-white">{{ old('descripcion_en', $evento->descripcion_en) }}</textarea>
                </div>
            </div>

            {{-- Reglamento --}}
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-[10px] font-bold text-slate-400 dark:text-slate-500 uppercase tracking-widest mb-2">Reglamento (ES)</label>
                    <textarea name="reglamento" rows="8" placeholder="Pega aquí el reglamento completo..."
                        class="w-full px-4 py-3 bg-slate-50 dark:bg-slate-700 border border-slate-200 dark:border-slate-600 rounded-lg focus:ring-2 focus:ring-blue-500 outline-none text-sm font-medium text-slate-800 dark:text-white">{{ old('reglamento', $evento->reglamento) }}</textarea>
                </div>
                <div>
                    <label class="block text-[10px] font-bold text-slate-400 dark:text-slate-500 uppercase tracking-widest mb-2">Regulations (EN) <span class="text-xs text-blue-500 normal-case ml-1">(Opcional)</span></label>
                    <textarea name="reglamento_en" rows="8" placeholder="Paste the full regulations in English..."
                        class="w-full px-4 py-3 bg-blue-50/30 dark:bg-blue-900/10 border border-blue-100 dark:border-blue-800/50 rounded-lg focus:ring-2 focus:ring-blue-500 outline-none text-sm font-medium text-slate-800 dark:text-white">{{ old('reglamento_en', $evento->reglamento_en) }}</textarea>
                </div>
            </div>
        </div>

        <div class="flex justify-end">
            <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-8 py-3 rounded-xl text-sm font-bold transition-all shadow-lg shadow-blue-200 dark:shadow-blue-900/30 uppercase tracking-widest">
                Actualizar Carrera
            </button>
        </div>
    </form>
</div>
@endsection
