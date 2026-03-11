@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto py-12 px-4 sm:px-6 lg:px-8">
    <div class="text-center mb-16">
        <h1 class="text-4xl font-extrabold text-gray-900 sm:text-5xl">¿Cómo funciona EventRUN!?</h1>
        <p class="mt-4 text-xl text-gray-600 font-light">Descubre el flujo de trabajo y cómo sacar el máximo provecho a nuestra plataforma.</p>
    </div>

    <div class="space-y-16">
        <!-- Paso 1 -->
        <section class="flex flex-col md:flex-row items-center gap-10">
            <div class="flex-1">
                <div class="bg-blue-100 text-blue-600 w-12 h-12 flex items-center justify-center rounded-full text-2xl font-bold mb-4">1</div>
                <h2 class="text-2xl font-bold text-slate-900 mb-4 tracking-tight">Registro y Roles</h2>
                <p class="text-slate-600 leading-relaxed">
                    EventRUN! utiliza un sistema de accesos jerárquicos. Los <strong>Administradores</strong> supervisan la plataforma completa, mientras que los <strong>Gestores</strong> disponen de herramientas avanzadas para la creación y control de carreras.
                </p>
            </div>
            <div class="flex-1 bg-white p-8 rounded-2xl shadow-sm border border-blue-100">
                <div class="space-y-4">
                    <div class="flex items-center gap-3">
                        <div class="w-8 h-8 rounded-full bg-blue-600 flex items-center justify-center text-white text-xs font-bold">AD</div>
                        <div>
                            <p class="text-sm font-bold text-slate-900 leading-none">Administrador</p>
                            <p class="text-[11px] text-slate-500">Control total del sistema y usuarios</p>
                        </div>
                    </div>
                    <div class="flex items-center gap-3">
                        <div class="w-8 h-8 rounded-full bg-indigo-500 flex items-center justify-center text-white text-xs font-bold">GS</div>
                        <div>
                            <p class="text-sm font-bold text-slate-900 leading-none">Gestor de Carreras</p>
                            <p class="text-[11px] text-slate-500">Creación y logística de eventos deportivos</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Paso 2 -->
        <section class="flex flex-col md:flex-row-reverse items-center gap-10">
            <div class="flex-1">
                <div class="bg-indigo-100 text-indigo-600 w-12 h-12 flex items-center justify-center rounded-full text-2xl font-bold mb-4">2</div>
                <h2 class="text-2xl font-bold text-gray-900 mb-4 font-mono uppercase tracking-tight">Gestión de Carreras</h2>
                <p class="text-gray-600 leading-relaxed">
                    Desde el panel de gestor, puedes crear carreras, definir categorías y controlar el cupo de corredores en tiempo real. La plataforma se encarga de procesar inscripciones automáticamente.
                </p>
            </div>
            <div class="flex-1 bg-white p-6 rounded-2xl shadow-xl border-l-4 border-indigo-500">
                <div class="h-4 bg-gray-100 rounded w-3/4 mb-2"></div>
                <div class="h-4 bg-gray-100 rounded w-1/2 mb-2"></div>
                <div class="h-8 bg-indigo-500 rounded w-1/3 mt-4"></div>
            </div>
        </section>

        <!-- Paso 3 -->
        <section class="flex flex-col md:flex-row items-center gap-10">
            <div class="flex-1 border-t-2 border-gray-100 pt-8">
                <div class="bg-green-100 text-green-600 w-12 h-12 flex items-center justify-center rounded-full text-2xl font-bold mb-4">3</div>
                <h2 class="text-2xl font-bold text-gray-900 mb-4 font-mono uppercase tracking-tight">Soporte y Tickets</h2>
                <p class="text-gray-600 leading-relaxed">
                    ¿Tienes un problema con tu inscripción? Nuestro sistema de tickets permite comunicación directa. Cada incidencia tiene un estado trazable para asegurar una respuesta rápida al atleta.
                </p>
            </div>
            <div class="flex-1 bg-white p-6 rounded-2xl shadow-xl border-l-4 border-green-500">
                <div class="flex justify-between items-center mb-4">
                    <span class="px-3 py-1 bg-green-100 text-green-700 text-xs font-bold rounded-full uppercase">Resuelto</span>
                    <span class="text-xs text-gray-400">Hace 2 horas</span>
                </div>
                <p class="text-sm font-semibold text-gray-800">"Inscripción confirmada correctamente."</p>
            </div>
        </section>

        <!-- Sección Formulario Contacto -->
        <section class="bg-gray-900 rounded-3xl p-8 md:p-12 text-white overflow-hidden relative">
            <div class="relative z-10">
                <h2 class="text-3xl font-bold mb-6 font-mono tracking-tighter">Soporte al Corredor</h2>
                <div class="grid md:grid-cols-2 gap-8">
                    <div>
                        <p class="text-gray-400 mb-4">
                            Nuestro sistema de tickets es el puente para:
                        </p>
                        <ul class="space-y-2 text-sm">
                            <li class="flex items-center"><span class="w-1.5 h-1.5 bg-blue-500 rounded-full mr-2"></span> Incidencias en el registro de tiempos.</li>
                            <li class="flex items-center"><span class="w-1.5 h-1.5 bg-blue-500 rounded-full mr-2"></span> Dudas sobre la entrega de dorsales.</li>
                            <li class="flex items-center"><span class="w-1.5 h-1.5 bg-blue-500 rounded-full mr-2"></span> Modificaciones en los datos del corredor.</li>
                        </ul>
                    </div>
                    <div class="border-l border-gray-800 pl-8">
                        <p class="text-sm text-gray-500 uppercase font-bold tracking-widest mb-4">SLA de Respuesta</p>
                        <p class="text-2xl font-light">Menos de <span class="text-blue-400 font-bold">24 horas</span> para incidencias en carrera.</p>
                    </div>
                </div>
            </div>
            <!-- Decorative element -->
            <div class="absolute top-0 right-0 -mt-20 -mr-20 w-64 h-64 bg-blue-600 rounded-full blur-3xl opacity-20"></div>
        </section>
    </div>
</div>
@endsection
