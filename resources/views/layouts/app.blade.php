<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EventRUN!</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gradient-to-br from-blue-50 via-white to-blue-100 min-h-screen flex flex-col text-slate-800">
    <nav class="bg-white/80 backdrop-blur-md sticky top-0 z-50 border-b border-blue-100 shadow-sm">
        <div class="container mx-auto px-6 py-3 flex justify-between items-center">
            <div class="flex items-center gap-8">
                <a href="{{ url('/') }}" class="flex items-center gap-2 group">
                    <div class="bg-blue-600 p-1.5 rounded-lg group-hover:bg-blue-700 transition-colors">
                        <!-- Running Icon -->
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M13 4v4l3 2m-5 10v-4l-3-2M9 4a1 1 0 112 0 1 1 0 01-2 0zM4 18h2m4-14h2M18 10h2M12 14l-4 4m8-4l4 4"/>
                        </svg>
                    </div>
                    <span class="text-xl font-bold tracking-tight text-slate-900">EventRUN!</span>
                </a>
                
                <div class="hidden md:flex items-center space-x-1">
                    @auth
                        @if(Auth::user()->role === 'administrador')
                            <a href="{{ url('/admin/usuarios') }}" class="px-4 py-2 rounded-lg text-sm font-semibold text-slate-600 hover:text-blue-600 hover:bg-blue-50 transition-all">Gestión Usuarios</a>
                            <a href="{{ url('/admin/tickets') }}" class="px-4 py-2 rounded-lg text-sm font-semibold text-slate-600 hover:text-blue-600 hover:bg-blue-50 transition-all">Gestión Tickets</a>
                            <a href="{{ route('gestor.eventos.index') }}" class="px-4 py-2 rounded-lg text-sm font-semibold text-slate-600 hover:text-blue-600 hover:bg-blue-50 transition-all">Gestión Carreras</a>
                        @elseif(Auth::user()->role === 'gestor')
                            <a href="{{ url('/gestor/eventos') }}" class="px-4 py-2 rounded-lg text-sm font-semibold text-slate-600 hover:text-blue-600 hover:bg-blue-50 transition-all">Mis Eventos</a>
                            <a href="{{ url('/gestor/tickets') }}" class="px-4 py-2 rounded-lg text-sm font-semibold text-slate-600 hover:text-blue-600 hover:bg-blue-50 transition-all">Soporte</a>
                        @endif
                    @endauth
                </div>
            </div>

            <div class="flex items-center gap-4">
                @auth
                    <div class="flex items-center gap-3 pl-6 border-l border-slate-200">
                        <div class="text-right hidden sm:block">
                            <p class="text-xs font-bold text-slate-900 leading-none">{{ Auth::user()->name }}</p>
                            <p class="text-[10px] font-medium text-blue-600 uppercase tracking-wider mt-0.5">{{ Auth::user()->role }}</p>
                        </div>
                        <form action="{{ url('/logout') }}" method="POST" class="inline">
                            @csrf
                            <button type="submit" class="bg-slate-900 hover:bg-slate-800 text-white px-4 py-2 rounded-lg text-xs font-bold transition-all shadow-sm">Cerrar Sesión</button>
                        </form>
                    </div>
                @else
                    <a href="{{ url('/') }}" class="text-sm font-bold text-slate-600 hover:text-blue-600 mr-2 transition-colors">Explorar</a>
                @endauth
            </div>
        </div>
    </nav>

    <main class="container mx-auto px-6 py-8 flex-grow">
        @yield('content')
    </main>

    <footer class="bg-gradient-to-br from-blue-50 via-white to-blue-100 border-t border-blue-100 pt-16 pb-8 mt-20">
        <div class="container mx-auto px-6">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-12 mb-12">
                <div class="col-span-1 md:col-span-1">
                    <div class="flex items-center gap-2 mb-6">
                        <div class="bg-blue-600 p-1 rounded-md text-white">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M13 4v4l3 2m-5 10v-4l-3-2M9 4a1 1 0 112 0 1 1 0 01-2 0zM4 18h2m4-14h2M18 10h2M12 14l-4 4m8-4l4 4"/>
                            </svg>
                        </div>
                        <span class="text-xl font-bold tracking-tight text-slate-900">EventRUN!</span>
                    </div>
                    <p class="text-sm leading-relaxed text-slate-500">
                        Infraestructura avanzada para la gestión y monitorización de carreras y maratones a nivel global.
                    </p>
                </div>

                <div>
                    <h4 class="text-slate-900 font-bold text-xs uppercase tracking-widest mb-6">Plataforma</h4>
                    <ul class="space-y-4 text-sm font-medium text-slate-500">
                        <li><a href="{{ url('/') }}" class="hover:text-blue-600 transition-colors">Carreras Activas</a></li>
                        @auth
                            @if(Auth::user()->role === 'gestor')
                                <li><a href="{{ url('/gestor/eventos') }}" class="hover:text-blue-600 transition-colors">Consola de Control</a></li>
                            @endif
                        @endauth
                    </ul>
                </div>

                <div>
                    <h4 class="text-slate-900 font-bold text-xs uppercase tracking-widest mb-6">Recursos</h4>
                    <ul class="space-y-4 text-sm font-medium text-slate-500">
                        <li><a href="{{ route('how-it-works') }}" class="hover:text-blue-600 transition-colors text-blue-600">Centro de Aprendizaje</a></li>
                        <li><a href="{{ route('help-center') }}" class="hover:text-blue-600 transition-colors">Documentación de Usuario</a></li>
                    </ul>
                </div>

                <div>
                    <h4 class="text-slate-900 font-bold text-xs uppercase tracking-widest mb-6">Soporte Global</h4>
                    <div class="bg-blue-50 rounded-xl p-4 border border-blue-100">
                        <div class="flex items-center gap-3 mb-2">
                            <span class="relative flex h-2 w-2">
                                <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-green-400 opacity-75"></span>
                                <span class="relative inline-flex rounded-full h-2 w-2 bg-green-500"></span>
                            </span>
                            <span class="text-xs font-bold text-blue-900 uppercase tracking-tighter">Sistemas Operativos</span>
                        </div>
                        <p class="text-[11px] text-blue-700 leading-tight">Monitorización activa 24/7 para corredores y gestores.</p>
                    </div>
                </div>
            </div>

            <div class="border-t border-slate-100 pt-8 flex flex-col md:flex-row justify-between items-center text-[11px] font-bold text-slate-400 uppercase tracking-widest">
                <p>&copy; 2026 EventRUN! Tech Stack. v1.2.4-lts</p>
                <div class="mt-4 md:mt-0 flex space-x-6">
                    <a href="#" class="hover:text-blue-600 transition-colors">Términos de Servicio</a>
                    <a href="#" class="hover:text-blue-600 transition-colors">Política de Privacidad</a>
                </div>
            </div>
        </div>
    </footer>

    @stack('scripts')
</body>
</html>
