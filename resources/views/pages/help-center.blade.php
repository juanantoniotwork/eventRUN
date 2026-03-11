@extends('layouts.app')

@section('content')
<div class="max-w-6xl mx-auto py-12 px-6 lg:px-8">
    <div class="mb-16 text-center">
        <h1 class="text-4xl font-extrabold text-slate-900 tracking-tight sm:text-5xl mb-4">Centro de Soporte y Recursos</h1>
        <p class="text-xl text-slate-500 font-light max-w-2xl mx-auto">Documentación técnica y operativa para maximizar el rendimiento de tu infraestructura en EventRUN!.</p>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-12 gap-12">
        <!-- Sidebar Navigation -->
        <aside class="lg:col-span-3">
            <nav class="sticky top-24 space-y-2">
                <p class="text-[10px] font-bold text-slate-400 uppercase tracking-[0.2em] px-4 mb-4">Navegación</p>
                <a href="#primeros-pasos" class="flex items-center px-4 py-3 text-sm font-bold text-blue-600 bg-blue-50 rounded-xl transition-all border border-blue-100 shadow-sm">
                    <span class="truncate">Primeros Pasos</span>
                </a>
                <a href="#gestion-eventos" class="flex items-center px-4 py-3 text-sm font-semibold text-slate-500 hover:text-blue-600 hover:bg-white hover:shadow-sm rounded-xl transition-all">
                    <span class="truncate">Gestión de Eventos</span>
                </a>
                <a href="#soporte-tecnico" class="flex items-center px-4 py-3 text-sm font-semibold text-slate-500 hover:text-blue-600 hover:bg-white hover:shadow-sm rounded-xl transition-all">
                    <span class="truncate">Soporte Técnico</span>
                </a>
                <a href="#seguridad" class="flex items-center px-4 py-3 text-sm font-semibold text-slate-500 hover:text-blue-600 hover:bg-white hover:shadow-sm rounded-xl transition-all">
                    <span class="truncate">Seguridad y Acceso</span>
                </a>
            </nav>
        </aside>

        <!-- Main Content -->
        <div class="lg:col-span-9 space-y-20">
            <!-- Primeros Pasos -->
            <section id="primeros-pasos" class="scroll-mt-28">
                <div class="flex items-center gap-4 mb-8">
                    <div class="w-10 h-10 bg-blue-600 text-white rounded-xl flex items-center justify-center text-sm font-bold shadow-lg shadow-blue-200">01</div>
                    <h2 class="text-2xl font-bold text-slate-900 tracking-tight">Primeros Pasos</h2>
                </div>
                <div class="grid md:grid-cols-2 gap-6">
                    <div class="bg-white p-6 rounded-2xl border border-blue-50 shadow-sm hover:shadow-md transition-shadow">
                        <h3 class="font-bold text-slate-800 mb-3 flex items-center gap-2">
                            <svg class="w-4 h-4 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"/></svg>
                            Acceso al Panel
                        </h3>
                        <p class="text-sm text-slate-500 leading-relaxed font-medium">Utilice las credenciales proporcionadas por su administrador central. Si es un gestor externo, asegúrese de haber verificado su cuenta antes del primer login.</p>
                    </div>
                    <div class="bg-white p-6 rounded-2xl border border-blue-50 shadow-sm hover:shadow-md transition-shadow">
                        <h3 class="font-bold text-slate-800 mb-3 flex items-center gap-2">
                            <svg class="w-4 h-4 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/></svg>
                            Roles y Permisos
                        </h3>
                        <p class="text-sm text-slate-500 leading-relaxed font-medium">Operamos bajo un modelo RBAC. Los permisos son granulares y se asignan automáticamente según su perfil profesional configurado.</p>
                    </div>
                </div>
            </section>

            <!-- Gestión de Eventos -->
            <section id="gestion-eventos" class="scroll-mt-28">
                <div class="flex items-center gap-4 mb-8">
                    <div class="w-10 h-10 bg-indigo-500 text-white rounded-xl flex items-center justify-center text-sm font-bold shadow-lg shadow-indigo-100">02</div>
                    <h2 class="text-2xl font-bold text-slate-900 tracking-tight">Gestión Operativa</h2>
                </div>
                <div class="space-y-4">
                    <details class="group bg-white border border-slate-100 rounded-2xl shadow-sm overflow-hidden">
                        <summary class="flex justify-between items-center p-5 cursor-pointer font-bold text-slate-700 hover:bg-slate-50 transition-colors">
                            Modificación de Aforo Crítico
                            <svg class="w-5 h-5 text-slate-400 group-open:rotate-180 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 9l-7 7-7-7"/></svg>
                        </summary>
                        <div class="px-5 pb-5 text-sm text-slate-500 leading-relaxed font-medium border-t border-slate-50 pt-4 bg-slate-50/30">
                            Por integridad de datos, el aforo total no puede ser inferior al número de entradas ya vendidas. Para ampliaciones, contacte con soporte adjuntando la justificación legal.
                        </div>
                    </details>
                    <details class="group bg-white border border-slate-100 rounded-2xl shadow-sm overflow-hidden">
                        <summary class="flex justify-between items-center p-5 cursor-pointer font-bold text-slate-700 hover:bg-slate-50 transition-colors">
                            Sincronización de Recaudación
                            <svg class="w-5 h-5 text-slate-400 group-open:rotate-180 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 9l-7 7-7-7"/></svg>
                        </summary>
                        <div class="px-5 pb-5 text-sm text-slate-500 leading-relaxed font-medium border-t border-slate-50 pt-4 bg-slate-50/30">
                            La recaudación se actualiza en tiempo real mediante colas de procesamiento asíncrono. En caso de discrepancias, utilice la herramienta de 'Recalcular Totales' en su panel.
                        </div>
                    </details>
                </div>
            </section>

            <!-- Soporte Técnico -->
            <section id="soporte-tecnico" class="scroll-mt-28">
                <div class="flex items-center gap-4 mb-8">
                    <div class="w-10 h-10 bg-emerald-500 text-white rounded-xl flex items-center justify-center text-sm font-bold shadow-lg shadow-emerald-100">03</div>
                    <h2 class="text-2xl font-bold text-slate-900 tracking-tight">Soporte Técnico</h2>
                </div>
                <div class="bg-gradient-to-br from-slate-900 to-slate-800 p-8 rounded-3xl text-white relative overflow-hidden">
                    <div class="relative z-10">
                        <h3 class="text-lg font-bold mb-4 flex items-center gap-2">
                            <span class="w-2 h-2 bg-emerald-400 rounded-full animate-pulse"></span>
                            Protocolo de Incidencias
                        </h3>
                        <p class="text-slate-400 text-sm mb-6 max-w-lg font-medium">Para una resolución en tiempo récord (< 24h), su ticket debe incluir:</p>
                        <ul class="space-y-3 text-sm font-semibold">
                            <li class="flex items-center gap-3 bg-white/5 p-3 rounded-xl border border-white/10 italic">
                                <span class="text-emerald-400">#</span> Identificador único del evento o ticket afectado.
                            </li>
                            <li class="flex items-center gap-3 bg-white/5 p-3 rounded-xl border border-white/10 italic">
                                <span class="text-emerald-400">#</span> Captura de pantalla del error o log del sistema.
                            </li>
                        </ul>
                        <div class="mt-8">
                            <a href="{{ url('/gestor/tickets') }}" class="bg-emerald-500 hover:bg-emerald-400 text-slate-950 px-6 py-3 rounded-xl text-sm font-bold transition-all shadow-lg shadow-emerald-900/20 inline-block">
                                Abrir Ticket Prioritario
                            </a>
                        </div>
                    </div>
                    <div class="absolute top-0 right-0 -mt-8 -mr-8 w-40 h-40 bg-emerald-500/10 rounded-full blur-3xl"></div>
                </div>
            </section>

            <!-- Seguridad y Acceso -->
            <section id="seguridad" class="scroll-mt-28">
                <div class="flex items-center gap-4 mb-8">
                    <div class="w-10 h-10 bg-rose-500 text-white rounded-xl flex items-center justify-center text-sm font-bold shadow-lg shadow-rose-100">04</div>
                    <h2 class="text-2xl font-bold text-slate-900 tracking-tight">Seguridad y Acceso</h2>
                </div>
                <div class="bg-white rounded-3xl border border-blue-50 p-8 shadow-sm">
                    <div class="grid md:grid-cols-2 gap-12">
                        <div class="space-y-6">
                            <div>
                                <h4 class="font-bold text-slate-800 mb-2 uppercase text-[11px] tracking-widest text-blue-600">Políticas de Sesión</h4>
                                <p class="text-sm text-slate-500 font-medium leading-relaxed">Las sesiones expiran automáticamente tras 120 minutos de inactividad. Solo se permite una sesión activa por usuario para evitar fugas de acceso.</p>
                            </div>
                            <div>
                                <h4 class="font-bold text-slate-800 mb-2 uppercase text-[11px] tracking-widest text-blue-600">Auditoría de Acciones</h4>
                                <p class="text-sm text-slate-500 font-medium leading-relaxed">Cada modificación en un evento o usuario queda registrada en nuestros logs de auditoría inmutables para cumplir con normativas de cumplimiento.</p>
                            </div>
                        </div>
                        <div class="bg-slate-50 rounded-2xl p-6 border border-slate-100">
                            <h4 class="font-bold text-slate-800 mb-4 text-sm">Consejos de Seguridad</h4>
                            <ul class="space-y-4">
                                <li class="flex items-start gap-3">
                                    <div class="mt-1 bg-rose-100 p-1 rounded">
                                        <svg class="w-3 h-3 text-rose-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 00-2 2z"/></svg>
                                    </div>
                                    <span class="text-xs font-semibold text-slate-600">Nunca comparta sus credenciales; el soporte técnico jamás las solicitará.</span>
                                </li>
                                <li class="flex items-start gap-3">
                                    <div class="mt-1 bg-blue-100 p-1 rounded">
                                        <svg class="w-3 h-3 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/></svg>
                                    </div>
                                    <span class="text-xs font-semibold text-slate-600">Rote su contraseña trimestralmente desde el panel de perfil.</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>

<style>
    html {
        scroll-behavior: smooth;
    }
</style>
@endsection
