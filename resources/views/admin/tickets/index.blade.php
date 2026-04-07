@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto py-4">
    <div class="mb-6 border-b border-gray-300 dark:border-slate-700 pb-2 flex justify-between items-center">
        <h1 class="text-lg font-bold text-gray-800 dark:text-white">GESTIÓN DE TICKETS</h1>
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
                        <div class="text-xs text-gray-500 dark:text-slate-400">{{ $ticket->evento?->nombre ?? 'General' }} - {{ $ticket->nombre }}</div>
                    </td>
                    <td class="py-3 px-2 text-center">
                        <span class="text-[10px] font-bold border border-gray-300 dark:border-slate-600 px-2 py-0.5 rounded uppercase text-gray-600 dark:text-slate-400">
                            {{ $ticket->estado }}
                        </span>
                    </td>
                    <td class="py-3 px-2 text-right">
                        <div class="relative inline-block">
                            <button onclick="toggleMenu(event, 'tmenu-{{ $ticket->id }}')"
                                class="p-1.5 rounded hover:bg-slate-100 dark:hover:bg-slate-700 text-slate-400 hover:text-slate-700 dark:hover:text-slate-200 transition-colors">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                    <circle cx="12" cy="5" r="1.5"/>
                                    <circle cx="12" cy="12" r="1.5"/>
                                    <circle cx="12" cy="19" r="1.5"/>
                                </svg>
                            </button>
                            <div id="tmenu-{{ $ticket->id }}"
                                class="hidden absolute right-0 mt-1 w-36 bg-white dark:bg-slate-800 border border-slate-200 dark:border-slate-700 rounded-lg shadow-lg z-10 py-1">
                                <a href="{{ route('admin.tickets.show', $ticket->id) }}"
                                    class="flex items-center gap-2 px-4 py-2 text-sm text-slate-700 dark:text-slate-300 hover:bg-slate-50 dark:hover:bg-slate-700 transition-colors">
                                    <svg class="w-4 h-4 text-slate-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                    </svg>
                                    Abrir
                                </a>
                                <form id="form-delete-{{ $ticket->id }}" action="{{ route('admin.tickets.destroy', $ticket->id) }}" method="POST">
                                    @csrf @method('DELETE')
                                </form>
                                <button type="button"
                                    onclick="openDeleteDialog({{ $ticket->id }})"
                                    class="flex items-center gap-2 w-full px-4 py-2 text-sm text-rose-600 hover:bg-rose-50 dark:hover:bg-rose-900/20 transition-colors">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                    </svg>
                                    Eliminar
                                </button>
                            </div>
                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="py-10 text-center text-gray-400 dark:text-slate-500 italic border-none">No hay tickets pendientes.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

{{-- Dialog de confirmación de eliminación --}}
<div id="delete-dialog" class="hidden fixed inset-0 z-50 flex items-center justify-center">
    <div class="absolute inset-0 bg-black/40 backdrop-blur-sm" onclick="closeDeleteDialog()"></div>
    <div class="relative bg-white dark:bg-slate-800 rounded-xl shadow-xl w-full max-w-sm mx-4 p-6">
        <div class="flex items-center gap-3 mb-4">
            <div class="flex-shrink-0 w-10 h-10 rounded-full bg-rose-100 dark:bg-rose-900/30 flex items-center justify-center">
                <svg class="w-5 h-5 text-rose-600" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v2m0 4h.01M10.29 3.86L1.82 18a2 2 0 001.71 3h16.94a2 2 0 001.71-3L13.71 3.86a2 2 0 00-3.42 0z"/>
                </svg>
            </div>
            <div>
                <h3 class="font-bold text-slate-800 dark:text-white">Eliminar ticket</h3>
                <p class="text-sm text-slate-500 dark:text-slate-400" id="delete-dialog-msg"></p>
            </div>
        </div>
        <div class="flex gap-3 justify-end">
            <button onclick="closeDeleteDialog()"
                class="px-4 py-2 text-sm font-semibold text-slate-600 dark:text-slate-300 bg-slate-100 dark:bg-slate-700 hover:bg-slate-200 dark:hover:bg-slate-600 rounded-lg transition-colors">
                Cancelar
            </button>
            <button id="delete-confirm-btn"
                class="px-4 py-2 text-sm font-bold text-white bg-rose-600 hover:bg-rose-700 rounded-lg transition-colors">
                Eliminar
            </button>
        </div>
    </div>
</div>

<script>
function toggleMenu(event, menuId) {
    event.stopPropagation();
    document.querySelectorAll('[id^="tmenu-"]').forEach(m => {
        if (m.id !== menuId) m.classList.add('hidden');
    });
    document.getElementById(menuId).classList.toggle('hidden');
}
document.addEventListener('click', () => {
    document.querySelectorAll('[id^="tmenu-"]').forEach(m => m.classList.add('hidden'));
});
function openDeleteDialog(ticketId) {
    document.querySelectorAll('[id^="tmenu-"]').forEach(m => m.classList.add('hidden'));
    document.getElementById('delete-dialog-msg').textContent = '¿Seguro que quieres eliminar el ticket #' + ticketId + '? Esta acción no se puede deshacer.';
    document.getElementById('delete-confirm-btn').onclick = () => document.getElementById('form-delete-' + ticketId).submit();
    document.getElementById('delete-dialog').classList.remove('hidden');
}
function closeDeleteDialog() {
    document.getElementById('delete-dialog').classList.add('hidden');
}
document.addEventListener('keydown', e => { if (e.key === 'Escape') closeDeleteDialog(); });
</script>
@endsection
