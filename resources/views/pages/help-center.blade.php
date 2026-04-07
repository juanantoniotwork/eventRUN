@extends('layouts.app')

@section('content')
<div class="max-w-6xl mx-auto py-12 px-6 lg:px-8">
    <div class="mb-16 text-center">
        <h1 class="text-4xl font-extrabold text-slate-900 dark:text-white tracking-tight sm:text-5xl mb-4">{{ __('messages.hc_title') }}</h1>
        <p class="text-xl text-slate-500 dark:text-slate-400 font-light max-w-2xl mx-auto">{{ __('messages.hc_subtitle') }}</p>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-12 gap-12">
        <!-- Sidebar Navigation -->
        <aside class="lg:col-span-3">
            <nav class="sticky top-24 space-y-2" id="hc-nav">
                <p class="text-[10px] font-bold text-slate-400 dark:text-slate-500 uppercase tracking-[0.2em] px-4 mb-4">{{ __('messages.hc_nav') }}</p>
                <a href="#primeros-pasos" data-section="primeros-pasos"
                    class="hc-nav-link flex items-center px-4 py-3 text-sm font-semibold text-slate-500 dark:text-slate-400 hover:text-blue-600 dark:hover:text-blue-400 hover:bg-white dark:hover:bg-slate-700 hover:shadow-sm rounded-xl transition-all">
                    <span class="truncate">{{ __('messages.hc_step1') }}</span>
                </a>
                <a href="#gestion-eventos" data-section="gestion-eventos"
                    class="hc-nav-link flex items-center px-4 py-3 text-sm font-semibold text-slate-500 dark:text-slate-400 hover:text-blue-600 dark:hover:text-blue-400 hover:bg-white dark:hover:bg-slate-700 hover:shadow-sm rounded-xl transition-all">
                    <span class="truncate">{{ __('messages.hc_step2') }}</span>
                </a>
                <a href="#soporte-tecnico" data-section="soporte-tecnico"
                    class="hc-nav-link flex items-center px-4 py-3 text-sm font-semibold text-slate-500 dark:text-slate-400 hover:text-blue-600 dark:hover:text-blue-400 hover:bg-white dark:hover:bg-slate-700 hover:shadow-sm rounded-xl transition-all">
                    <span class="truncate">{{ __('messages.hc_step3') }}</span>
                </a>
                <a href="#seguridad" data-section="seguridad"
                    class="hc-nav-link flex items-center px-4 py-3 text-sm font-semibold text-slate-500 dark:text-slate-400 hover:text-blue-600 dark:hover:text-blue-400 hover:bg-white dark:hover:bg-slate-700 hover:shadow-sm rounded-xl transition-all">
                    <span class="truncate">{{ __('messages.hc_step4') }}</span>
                </a>
            </nav>
        </aside>

        <!-- Main Content -->
        <div class="lg:col-span-9 space-y-20">
            <!-- Primeros Pasos -->
            <section id="primeros-pasos" class="scroll-mt-28">
                <div class="flex items-center gap-4 mb-8">
                    <span class="text-xs font-mono font-bold text-slate-400 dark:text-slate-500 border border-slate-200 dark:border-slate-600 rounded px-2 py-1">01</span>
                    <h2 class="text-2xl font-bold text-slate-900 dark:text-white tracking-tight">{{ __('messages.hc_step1') }}</h2>
                </div>
                <div class="grid md:grid-cols-2 gap-6">
                    <div class="bg-white dark:bg-slate-800 p-6 rounded-2xl border border-slate-100 dark:border-slate-700 shadow-sm hover:shadow-md transition-shadow">
                        <h3 class="font-bold text-slate-800 dark:text-white mb-3 flex items-center gap-2">
                            <svg class="w-4 h-4 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"/></svg>
                            {{ __('messages.hc_access_title') }}
                        </h3>
                        <p class="text-sm text-slate-500 dark:text-slate-400 leading-relaxed font-medium">{{ __('messages.hc_access_desc') }}</p>
                    </div>
                    <div class="bg-white dark:bg-slate-800 p-6 rounded-2xl border border-slate-100 dark:border-slate-700 shadow-sm hover:shadow-md transition-shadow">
                        <h3 class="font-bold text-slate-800 dark:text-white mb-3 flex items-center gap-2">
                            <svg class="w-4 h-4 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/></svg>
                            {{ __('messages.hc_roles_title') }}
                        </h3>
                        <p class="text-sm text-slate-500 dark:text-slate-400 leading-relaxed font-medium">{{ __('messages.hc_roles_desc') }}</p>
                    </div>
                </div>
            </section>

            <!-- Gestión de Eventos -->
            <section id="gestion-eventos" class="scroll-mt-28">
                <div class="flex items-center gap-4 mb-8">
                    <span class="text-xs font-mono font-bold text-slate-400 dark:text-slate-500 border border-slate-200 dark:border-slate-600 rounded px-2 py-1">02</span>
                    <h2 class="text-2xl font-bold text-slate-900 dark:text-white tracking-tight">{{ __('messages.hc_op_title') }}</h2>
                </div>
                <div class="space-y-4">
                    <details class="group bg-white dark:bg-slate-800 border border-slate-100 dark:border-slate-700 rounded-2xl shadow-sm overflow-hidden">
                        <summary class="flex justify-between items-center p-5 cursor-pointer font-bold text-slate-700 dark:text-slate-200 hover:bg-slate-50 dark:hover:bg-slate-700/50 transition-colors">
                            {{ __('messages.hc_capacity_title') }}
                            <svg class="w-5 h-5 text-slate-400 group-open:rotate-180 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 9l-7 7-7-7"/></svg>
                        </summary>
                        <div class="px-5 pb-5 text-sm text-slate-500 dark:text-slate-400 leading-relaxed font-medium border-t border-slate-100 dark:border-slate-700 pt-4 bg-slate-50/30 dark:bg-slate-700/20">
                            {{ __('messages.hc_capacity_desc') }}
                        </div>
                    </details>
                    <details class="group bg-white dark:bg-slate-800 border border-slate-100 dark:border-slate-700 rounded-2xl shadow-sm overflow-hidden">
                        <summary class="flex justify-between items-center p-5 cursor-pointer font-bold text-slate-700 dark:text-slate-200 hover:bg-slate-50 dark:hover:bg-slate-700/50 transition-colors">
                            {{ __('messages.hc_sync_title') }}
                            <svg class="w-5 h-5 text-slate-400 group-open:rotate-180 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 9l-7 7-7-7"/></svg>
                        </summary>
                        <div class="px-5 pb-5 text-sm text-slate-500 dark:text-slate-400 leading-relaxed font-medium border-t border-slate-100 dark:border-slate-700 pt-4 bg-slate-50/30 dark:bg-slate-700/20">
                            {{ __('messages.hc_sync_desc') }}
                        </div>
                    </details>
                </div>
            </section>

            <!-- Soporte Técnico -->
            <section id="soporte-tecnico" class="scroll-mt-28">
                <div class="flex items-center gap-4 mb-8">
                    <span class="text-xs font-mono font-bold text-slate-400 dark:text-slate-500 border border-slate-200 dark:border-slate-600 rounded px-2 py-1">03</span>
                    <h2 class="text-2xl font-bold text-slate-900 dark:text-white tracking-tight">{{ __('messages.hc_step3') }}</h2>
                </div>
                <div class="bg-gradient-to-br from-slate-900 to-slate-800 p-8 rounded-3xl text-white relative overflow-hidden">
                    <div class="relative z-10">
                        <h3 class="text-lg font-bold mb-4 flex items-center gap-2">
                            <span class="w-2 h-2 bg-emerald-400 rounded-full animate-pulse"></span>
                            {{ __('messages.hc_protocol_title') }}
                        </h3>
                        <p class="text-slate-400 text-sm mb-6 max-w-lg font-medium">{{ __('messages.hc_protocol_desc') }}</p>
                        <ul class="space-y-3 text-sm font-semibold">
                            <li class="flex items-center gap-3 bg-white/5 p-3 rounded-xl border border-white/10 italic">
                                <span class="text-emerald-400">#</span> {{ __('messages.hc_li_id') }}
                            </li>
                            <li class="flex items-center gap-3 bg-white/5 p-3 rounded-xl border border-white/10 italic">
                                <span class="text-emerald-400">#</span> {{ __('messages.hc_li_screen') }}
                            </li>
                        </ul>
                        <div class="mt-8">
                            <button onclick="document.getElementById('ticket-modal').classList.remove('hidden')"
                                class="bg-emerald-500 hover:bg-emerald-400 text-slate-950 px-6 py-3 rounded-xl text-sm font-bold transition-all shadow-lg shadow-emerald-900/20 inline-flex items-center gap-2">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4"/>
                                </svg>
                                {{ __('messages.hc_open_ticket') }}
                            </button>
                        </div>
                    </div>
                    <div class="absolute top-0 right-0 -mt-8 -mr-8 w-40 h-40 bg-emerald-500/10 rounded-full blur-3xl"></div>
                </div>
            </section>

            <!-- Seguridad y Acceso -->
            <section id="seguridad" class="scroll-mt-28">
                <div class="flex items-center gap-4 mb-8">
                    <span class="text-xs font-mono font-bold text-slate-400 dark:text-slate-500 border border-slate-200 dark:border-slate-600 rounded px-2 py-1">04</span>
                    <h2 class="text-2xl font-bold text-slate-900 dark:text-white tracking-tight">{{ __('messages.hc_step4') }}</h2>
                </div>
                <div class="bg-white dark:bg-slate-800 rounded-3xl border border-slate-100 dark:border-slate-700 p-8 shadow-sm">
                    <div class="grid md:grid-cols-2 gap-12">
                        <div class="space-y-6">
                            <div>
                                <h4 class="font-bold text-blue-600 dark:text-blue-400 mb-2 uppercase text-[11px] tracking-widest">{{ __('messages.hc_sec_session') }}</h4>
                                <p class="text-sm text-slate-500 dark:text-slate-400 font-medium leading-relaxed">{{ __('messages.hc_sec_session_desc') }}</p>
                            </div>
                            <div>
                                <h4 class="font-bold text-blue-600 dark:text-blue-400 mb-2 uppercase text-[11px] tracking-widest">{{ __('messages.hc_sec_audit') }}</h4>
                                <p class="text-sm text-slate-500 dark:text-slate-400 font-medium leading-relaxed">{{ __('messages.hc_sec_audit_desc') }}</p>
                            </div>
                        </div>
                        <div class="bg-slate-50 dark:bg-slate-700/50 rounded-2xl p-6 border border-slate-100 dark:border-slate-600">
                            <h4 class="font-bold text-slate-800 dark:text-slate-200 mb-4 text-sm">{{ __('messages.hc_sec_tips') }}</h4>
                            <ul class="space-y-4">
                                <li class="flex items-start gap-3">
                                    <div class="mt-1 bg-slate-200 dark:bg-slate-600 p-1 rounded">
                                        <svg class="w-3 h-3 text-slate-600 dark:text-slate-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 00-2 2z"/></svg>
                                    </div>
                                    <span class="text-xs font-semibold text-slate-600 dark:text-slate-300">{{ __('messages.hc_tip1') }}</span>
                                </li>
                                <li class="flex items-start gap-3">
                                    <div class="mt-1 bg-slate-200 dark:bg-slate-600 p-1 rounded">
                                        <svg class="w-3 h-3 text-slate-600 dark:text-slate-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/></svg>
                                    </div>
                                    <span class="text-xs font-semibold text-slate-600 dark:text-slate-300">{{ __('messages.hc_tip2') }}</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>

{{-- Modal: Ticket Prioritario --}}
<div id="ticket-modal" class="hidden fixed inset-0 z-50 flex items-center justify-center p-4">
    <div class="absolute inset-0 bg-black/50 backdrop-blur-sm" onclick="closeTicketModal()"></div>
    <div class="relative bg-white rounded-2xl shadow-2xl w-full max-w-lg mx-auto overflow-hidden">
        {{-- Header --}}
        <div class="bg-gradient-to-r from-slate-900 to-slate-800 px-6 py-5 flex items-center justify-between">
            <div class="flex items-center gap-3">
                <span class="w-2 h-2 bg-emerald-400 rounded-full animate-pulse"></span>
                <h3 class="text-white font-bold text-base">Abrir ticket prioritario</h3>
            </div>
            <button onclick="closeTicketModal()" class="text-slate-400 hover:text-white transition-colors">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/>
                </svg>
            </button>
        </div>

        {{-- Flash de éxito --}}
        @if(session('ticket_enviado'))
        <div class="bg-emerald-50 border-b border-emerald-100 px-6 py-4 flex items-center gap-3">
            <svg class="w-5 h-5 text-emerald-500 flex-shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
            </svg>
            <p class="text-sm font-semibold text-emerald-700">Ticket enviado correctamente. Te contactaremos pronto.</p>
        </div>
        @endif

        {{-- Formulario --}}
        <form action="{{ route('public.ticket.store') }}" method="POST" enctype="multipart/form-data" class="px-6 py-5 space-y-4">
            @csrf

            @if($errors->any())
            <div class="bg-rose-50 border border-rose-200 rounded-xl px-4 py-3">
                <ul class="text-xs text-rose-600 font-semibold space-y-1">
                    @foreach($errors->all() as $error)
                        <li>• {{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block text-xs font-bold text-slate-500 uppercase tracking-wider mb-1.5">Nombre</label>
                    <input type="text" name="nombre" value="{{ old('nombre') }}" required
                        class="w-full border border-slate-200 rounded-xl px-3 py-2.5 text-sm text-slate-800 focus:outline-none focus:ring-2 focus:ring-emerald-400 focus:border-transparent"
                        placeholder="Tu nombre">
                </div>
                <div>
                    <label class="block text-xs font-bold text-slate-500 uppercase tracking-wider mb-1.5">Email</label>
                    <input type="email" name="email" value="{{ old('email') }}" required
                        class="w-full border border-slate-200 rounded-xl px-3 py-2.5 text-sm text-slate-800 focus:outline-none focus:ring-2 focus:ring-emerald-400 focus:border-transparent"
                        placeholder="tu@email.com">
                </div>
            </div>

            <div>
                <label class="block text-xs font-bold text-slate-500 uppercase tracking-wider mb-1.5">Evento relacionado <span class="font-normal normal-case">(opcional)</span></label>
                <select name="evento_id" id="evento-select"
                    class="w-full border border-slate-200 rounded-xl px-3 py-2.5 text-sm text-slate-800 focus:outline-none focus:ring-2 focus:ring-emerald-400 focus:border-transparent">
                    <option value="" data-codigo="">— Sin evento específico —</option>
                    @foreach($eventos as $evento)
                        <option value="{{ $evento->id }}" data-codigo="{{ $evento->codigo }}" {{ old('evento_id') == $evento->id ? 'selected' : '' }}>{{ $evento->nombre }}</option>
                    @endforeach
                </select>
            </div>

            <div>
                <label class="block text-xs font-bold text-slate-500 uppercase tracking-wider mb-1.5">Asunto</label>
                <input type="text" name="asunto" value="{{ old('asunto') }}" required
                    class="w-full border border-slate-200 rounded-xl px-3 py-2.5 text-sm text-slate-800 focus:outline-none focus:ring-2 focus:ring-emerald-400 focus:border-transparent"
                    placeholder="Describe brevemente el problema">
            </div>

            {{-- Campos del protocolo de incidencias --}}
            <div class="bg-slate-50 border border-slate-200 rounded-xl p-4 space-y-3">
                <p class="text-[10px] font-bold text-slate-400 uppercase tracking-widest flex items-center gap-1.5">
                    <span class="w-1.5 h-1.5 bg-emerald-400 rounded-full"></span>
                    Protocolo de incidencias
                </p>
                <div>
                    <label class="block text-xs font-bold text-slate-500 uppercase tracking-wider mb-1.5">
                        Identificador del evento o ticket afectado
                        <span class="text-rose-400 ml-0.5">*</span>
                    </label>
                    <input type="text" name="identificador" id="identificador-input" value="{{ old('identificador') }}" required
                        class="w-full border border-slate-200 rounded-xl px-3 py-2.5 text-sm text-slate-800 bg-white focus:outline-none focus:ring-2 focus:ring-emerald-400 focus:border-transparent"
                        placeholder="Ej: EVT-42 o TKT-8">
                </div>
                <div>
                    <label class="block text-xs font-bold text-slate-500 uppercase tracking-wider mb-1.5">
                        Captura de pantalla o log del sistema
                        <span class="text-rose-400 ml-0.5">*</span>
                    </label>
                    <label class="flex items-center gap-3 w-full border border-dashed border-slate-300 rounded-xl px-3 py-3 bg-white cursor-pointer hover:border-emerald-400 transition-colors">
                        <svg class="w-5 h-5 text-slate-400 flex-shrink-0" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M18.375 12.739l-7.693 7.693a4.5 4.5 0 01-6.364-6.364l10.94-10.94A3 3 0 1119.5 7.372L8.552 18.32m.009-.01l-.01.01m5.699-9.941l-7.81 7.81a1.5 1.5 0 002.112 2.13"/>
                        </svg>
                        <span id="adjunto-label" class="text-sm text-slate-400 truncate">Seleccionar archivo (imagen, PDF o log — máx. 5MB)</span>
                        <input type="file" name="adjunto" required accept=".jpg,.jpeg,.png,.gif,.webp,.pdf,.txt,.log"
                            class="hidden" onchange="document.getElementById('adjunto-label').textContent = this.files[0]?.name ?? 'Seleccionar archivo'">
                    </label>
                </div>
            </div>

            <div>
                <label class="block text-xs font-bold text-slate-500 uppercase tracking-wider mb-1.5">Mensaje</label>
                <textarea name="mensaje" required rows="3"
                    class="w-full border border-slate-200 rounded-xl px-3 py-2.5 text-sm text-slate-800 focus:outline-none focus:ring-2 focus:ring-emerald-400 focus:border-transparent resize-none"
                    placeholder="Explica tu problema con el máximo detalle posible...">{{ old('mensaje') }}</textarea>
            </div>

            <div class="flex gap-3 pt-1">
                <button type="button" onclick="closeTicketModal()"
                    class="flex-1 px-4 py-2.5 text-sm font-semibold text-slate-600 bg-slate-100 hover:bg-slate-200 rounded-xl transition-colors">
                    Cancelar
                </button>
                <button type="submit"
                    class="flex-1 px-4 py-2.5 text-sm font-bold text-slate-950 bg-emerald-500 hover:bg-emerald-400 rounded-xl transition-colors shadow-sm">
                    Enviar ticket
                </button>
            </div>
        </form>
    </div>
</div>

<script>
function closeTicketModal() {
    document.getElementById('ticket-modal').classList.add('hidden');
}
document.addEventListener('keydown', e => { if (e.key === 'Escape') closeTicketModal(); });

// Auto-rellenar identificador al seleccionar evento
document.addEventListener('DOMContentLoaded', function () {
    const eventoSelect = document.getElementById('evento-select');
    const identificadorInput = document.getElementById('identificador-input');
    if (!eventoSelect || !identificadorInput) return;

    eventoSelect.addEventListener('change', function () {
        const codigo = this.options[this.selectedIndex].getAttribute('data-codigo');
        identificadorInput.value = codigo || '';
    });
});

// Navegación activa
const navLinks = document.querySelectorAll('.hc-nav-link');
const sections = document.querySelectorAll('section[id]');

function setActive(id) {
    navLinks.forEach(link => {
        const isActive = link.dataset.section === id;
        link.classList.toggle('text-blue-600', isActive);
        link.classList.toggle('dark:text-blue-400', isActive);
        link.classList.toggle('bg-blue-50', isActive);
        link.classList.toggle('dark:bg-slate-700', isActive);
        link.classList.toggle('border', isActive);
        link.classList.toggle('border-blue-100', isActive);
        link.classList.toggle('dark:border-slate-600', isActive);
        link.classList.toggle('shadow-sm', isActive);
        link.classList.toggle('font-bold', isActive);
        link.classList.toggle('text-slate-500', !isActive);
        link.classList.toggle('dark:text-slate-400', !isActive);
        link.classList.toggle('font-semibold', !isActive);
    });
}

// Marcar al hacer clic de forma inmediata
navLinks.forEach(link => {
    link.addEventListener('click', () => setActive(link.dataset.section));
});

// Marcar automáticamente al hacer scroll con IntersectionObserver
const observer = new IntersectionObserver(entries => {
    entries.forEach(entry => {
        if (entry.isIntersecting) setActive(entry.target.id);
    });
}, { rootMargin: '-20% 0px -70% 0px' });

sections.forEach(section => observer.observe(section));

// Activar el primero al cargar
setActive('primeros-pasos');
</script>

@if($errors->any() || session('ticket_enviado'))
<script>document.getElementById('ticket-modal').classList.remove('hidden');</script>
@endif

<style>
    html { scroll-behavior: smooth; }
</style>
@endsection
