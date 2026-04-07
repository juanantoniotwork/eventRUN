@extends('layouts.app')

@section('content')
<div class="max-w-6xl mx-auto py-6">
    <div class="flex items-center justify-between mb-8 border-b border-slate-200 dark:border-slate-700 pb-4">
        <h1 class="text-xl font-bold text-slate-800 dark:text-white uppercase tracking-tight">Directorio de Usuarios</h1>
        <a href="{{ route('admin.usuarios.create') }}" class="text-xs font-bold bg-slate-900 dark:bg-blue-600 text-white px-4 py-2 rounded uppercase tracking-widest hover:bg-slate-800 dark:hover:bg-blue-700 transition-colors">
            + Alta Usuario
        </a>
    </div>

    <div class="bg-white dark:bg-slate-800 border border-slate-200 dark:border-slate-700 rounded-lg shadow-sm">
        <table class="w-full text-left border-collapse text-sm">
            <thead>
                <tr class="bg-slate-50 dark:bg-slate-700/50 border-b border-slate-200 dark:border-slate-700">
                    <th class="px-6 py-3 font-bold text-slate-500 dark:text-slate-400 uppercase tracking-wider">Identidad / Email</th>
                    <th class="px-6 py-3 font-bold text-slate-500 dark:text-slate-400 uppercase tracking-wider text-center">Rol</th>
                    <th class="px-6 py-3 font-bold text-slate-500 dark:text-slate-400 uppercase tracking-wider text-right"></th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-100 dark:divide-slate-700">
                @foreach($usuarios as $usuario)
                    <tr class="hover:bg-slate-50/50 dark:hover:bg-slate-700/30 transition-colors">
                        <td class="px-6 py-4">
                            <p class="font-bold text-slate-900 dark:text-white">{{ $usuario->name }}</p>
                            <p class="text-xs text-slate-400 dark:text-slate-500 font-medium">{{ $usuario->email }}</p>
                        </td>
                        <td class="px-6 py-4 text-center">
                            <span class="text-[10px] font-bold text-slate-500 dark:text-slate-400 uppercase border border-slate-200 dark:border-slate-600 px-2 py-0.5 rounded bg-white dark:bg-slate-700">
                                {{ $usuario->role }}
                            </span>
                        </td>
                        <td class="px-6 py-4 text-right">
                            <div class="relative inline-block">
                                <button onclick="toggleMenu(event, 'menu-{{ $usuario->id }}')"
                                    class="p-1.5 rounded hover:bg-slate-100 dark:hover:bg-slate-700 text-slate-400 hover:text-slate-700 dark:hover:text-slate-200 transition-colors">
                                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                        <circle cx="12" cy="5" r="1.5"/>
                                        <circle cx="12" cy="12" r="1.5"/>
                                        <circle cx="12" cy="19" r="1.5"/>
                                    </svg>
                                </button>
                                <div id="menu-{{ $usuario->id }}"
                                    class="hidden absolute right-0 mt-1 w-36 bg-white dark:bg-slate-800 border border-slate-200 dark:border-slate-700 rounded-lg shadow-lg z-10 py-1">
                                    <a href="{{ route('admin.usuarios.edit', $usuario->id) }}"
                                        class="flex items-center gap-2 px-4 py-2 text-sm text-slate-700 dark:text-slate-300 hover:bg-slate-50 dark:hover:bg-slate-700 transition-colors">
                                        <svg class="w-4 h-4 text-slate-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                        </svg>
                                        Editar
                                    </a>
                                    @if(Auth::id() !== $usuario->id)
                                        <form action="{{ route('admin.usuarios.destroy', $usuario->id) }}" method="POST"
                                            onsubmit="return confirm('¿Dar de baja a {{ addslashes($usuario->name) }}?')">
                                            @csrf @method('DELETE')
                                            <button type="submit"
                                                class="flex items-center gap-2 w-full px-4 py-2 text-sm text-rose-600 hover:bg-rose-50 dark:hover:bg-rose-900/20 transition-colors">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M13 7a4 4 0 11-8 0 4 4 0 018 0zM9 14a6 6 0 00-6 6v1h12v-1a6 6 0 00-6-6zM21 12h-6"/>
                                                </svg>
                                                Baja
                                            </button>
                                        </form>
                                    @endif
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
