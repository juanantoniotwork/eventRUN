@extends('layouts.app')

@section('content')
<div class="max-w-6xl mx-auto py-6">
    <div class="flex items-center justify-between mb-8 border-b border-slate-200 dark:border-slate-700 pb-4">
        <h1 class="text-xl font-bold text-slate-800 dark:text-white uppercase tracking-tight">Gestión de Carreras</h1>
    </div>

    @if(session('success'))
        <div class="mb-4 px-4 py-3 bg-green-50 dark:bg-green-900/20 border border-green-200 dark:border-green-800 text-green-700 dark:text-green-400 rounded-lg text-sm font-medium">
            {{ session('success') }}
        </div>
    @endif

    <div class="bg-white dark:bg-slate-800 border border-slate-200 dark:border-slate-700 rounded-lg shadow-sm">
        <table class="w-full text-left border-collapse text-sm">
            <thead>
                <tr class="bg-slate-50 dark:bg-slate-700/50 border-b border-slate-200 dark:border-slate-700">
                    <th class="px-6 py-3 font-bold text-slate-500 dark:text-slate-400 uppercase tracking-wider">Carrera</th>
                    <th class="px-6 py-3 font-bold text-slate-500 dark:text-slate-400 uppercase tracking-wider">Fecha</th>
                    <th class="px-6 py-3 font-bold text-slate-500 dark:text-slate-400 uppercase tracking-wider">Gestor</th>
                    <th class="px-6 py-3 font-bold text-slate-500 dark:text-slate-400 uppercase tracking-wider text-center">Estado</th>
                    <th class="px-6 py-3 font-bold text-slate-500 dark:text-slate-400 uppercase tracking-wider text-right"></th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-100 dark:divide-slate-700">
                @foreach($eventos as $evento)
                    <tr class="hover:bg-slate-50/50 dark:hover:bg-slate-700/30 transition-colors">
                        <td class="px-6 py-4">
                            <p class="font-bold text-slate-900 dark:text-white">{{ $evento->nombre }}</p>
                            <p class="text-xs text-slate-400 dark:text-slate-500 font-mono">{{ $evento->codigo }}</p>
                        </td>
                        <td class="px-6 py-4 text-slate-600 dark:text-slate-300 font-medium">
                            {{ $evento->fecha->format('d/m/Y') }}
                        </td>
                        <td class="px-6 py-4 text-slate-600 dark:text-slate-300 font-medium">
                            {{ $evento->user->name ?? '—' }}
                        </td>
                        <td class="px-6 py-4 text-center">
                            <span class="text-[10px] font-bold uppercase px-2 py-0.5 rounded
                                {{ $evento->estado === 'publicado'
                                    ? 'bg-green-100 dark:bg-green-900/30 text-green-700 dark:text-green-400 border border-green-200 dark:border-green-800'
                                    : 'bg-slate-100 dark:bg-slate-700 text-slate-500 dark:text-slate-400 border border-slate-200 dark:border-slate-600' }}">
                                {{ $evento->estado }}
                            </span>
                        </td>
                        <td class="px-6 py-4 text-right">
                            <div class="relative inline-block">
                                <button onclick="toggleMenu(event, 'menu-{{ $evento->id }}')"
                                    class="p-1.5 rounded hover:bg-slate-100 dark:hover:bg-slate-700 text-slate-400 hover:text-slate-700 dark:hover:text-slate-200 transition-colors">
                                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                        <circle cx="12" cy="5" r="1.5"/>
                                        <circle cx="12" cy="12" r="1.5"/>
                                        <circle cx="12" cy="19" r="1.5"/>
                                    </svg>
                                </button>
                                <div id="menu-{{ $evento->id }}"
                                    class="hidden absolute right-0 mt-1 w-36 bg-white dark:bg-slate-800 border border-slate-200 dark:border-slate-700 rounded-lg shadow-lg z-10 py-1">
                                    <a href="{{ route('admin.eventos.edit', $evento->id) }}"
                                        class="flex items-center gap-2 px-4 py-2 text-sm text-slate-700 dark:text-slate-300 hover:bg-slate-50 dark:hover:bg-slate-700 transition-colors">
                                        <svg class="w-4 h-4 text-slate-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                        </svg>
                                        Editar
                                    </a>
                                    <form action="{{ route('admin.eventos.destroy', $evento->id) }}" method="POST"
                                        onsubmit="return confirm('¿Eliminar la carrera {{ addslashes($evento->nombre) }}?')">
                                        @csrf @method('DELETE')
                                        <button type="submit"
                                            class="flex items-center gap-2 w-full px-4 py-2 text-sm text-rose-600 hover:bg-rose-50 dark:hover:bg-rose-900/20 transition-colors">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                            </svg>
                                            Eliminar
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<script>
function toggleMenu(event, menuId) {
    event.stopPropagation();
    document.querySelectorAll('[id^="menu-"]').forEach(m => {
        if (m.id !== menuId) m.classList.add('hidden');
    });
    document.getElementById(menuId).classList.toggle('hidden');
}
document.addEventListener('click', () => {
    document.querySelectorAll('[id^="menu-"]').forEach(m => m.classList.add('hidden'));
});
</script>
@endsection
