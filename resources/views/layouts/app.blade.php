<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ __('messages.welcome') }}</title>
    {{-- Prevenir flash de modo claro al cargar en modo oscuro --}}
    <script>
        if (localStorage.getItem('darkMode') === 'true' ||
            (!localStorage.getItem('darkMode') && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
            document.documentElement.classList.add('dark');
        }
    </script>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>tailwind.config = { darkMode: 'class' }</script>
</head>
<body class="bg-gradient-to-br from-blue-50 via-white to-blue-100 dark:from-slate-900 dark:via-slate-900 dark:to-slate-800 min-h-screen flex flex-col text-slate-800 dark:text-slate-100 transition-colors duration-300">
    <nav class="bg-white/80 dark:bg-slate-800/80 backdrop-blur-md sticky top-0 z-50 border-b border-blue-100 dark:border-slate-700 shadow-sm transition-colors duration-300">
        <div class="container mx-auto px-6 py-3 flex justify-between items-center">
            <div class="flex items-center gap-8">
                <a href="{{ url('/') }}" class="flex items-center gap-2 group">
                    <div class="bg-blue-600 p-1.5 rounded-lg group-hover:bg-blue-700 transition-colors">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M13 4v4l3 2m-5 10v-4l-3-2M9 4a1 1 0 112 0 1 1 0 01-2 0zM4 18h2m4-14h2M18 10h2M12 14l-4 4m8-4l4 4"/>
                        </svg>
                    </div>
                    <span class="text-xl font-bold tracking-tight text-slate-900 dark:text-white">EventRUN!</span>
                </a>

                <div class="hidden md:flex items-center space-x-1">
                    @auth
                        @if(Auth::user()->role === 'administrador')
                            <a href="{{ url('/admin/usuarios') }}" class="px-4 py-2 rounded-lg text-sm font-semibold text-slate-600 dark:text-slate-300 hover:text-blue-600 dark:hover:text-blue-400 hover:bg-blue-50 dark:hover:bg-slate-700 transition-all">{{ __('messages.user_management') }}</a>
                            <a href="{{ url('/admin/tickets') }}" class="px-4 py-2 rounded-lg text-sm font-semibold text-slate-600 dark:text-slate-300 hover:text-blue-600 dark:hover:text-blue-400 hover:bg-blue-50 dark:hover:bg-slate-700 transition-all flex items-center gap-2">
                                {{ __('messages.ticket_management') }}
                                <span class="ticket-badge-count hidden bg-red-500 text-white text-[10px] font-bold px-1.5 py-0.5 rounded-full">0</span>
                            </a>
                            <a href="{{ route('gestor.eventos.index') }}" class="px-4 py-2 rounded-lg text-sm font-semibold text-slate-600 dark:text-slate-300 hover:text-blue-600 dark:hover:text-blue-400 hover:bg-blue-50 dark:hover:bg-slate-700 transition-all">{{ __('messages.race_management') }}</a>
                        @elseif(Auth::user()->role === 'gestor')
                            <a href="{{ url('/gestor/eventos') }}" class="px-4 py-2 rounded-lg text-sm font-semibold text-slate-600 dark:text-slate-300 hover:text-blue-600 dark:hover:text-blue-400 hover:bg-blue-50 dark:hover:bg-slate-700 transition-all">{{ __('messages.my_events') }}</a>
                            <a href="{{ url('/gestor/tickets') }}" class="px-4 py-2 rounded-lg text-sm font-semibold text-slate-600 dark:text-slate-300 hover:text-blue-600 dark:hover:text-blue-400 hover:bg-blue-50 dark:hover:bg-slate-700 transition-all flex items-center gap-2">
                                {{ __('messages.support') }}
                                <span class="ticket-badge-count hidden bg-red-500 text-white text-[10px] font-bold px-1.5 py-0.5 rounded-full">0</span>
                            </a>
                        @endif
                    @endauth
                </div>
            </div>

            <div class="flex items-center gap-4">
                <!-- Language Selector -->
                <div class="flex items-center gap-2 mr-2 border-r border-slate-200 dark:border-slate-600 pr-4">
                    <a href="{{ route('lang.switch', 'es') }}" class="hover:opacity-80 transition-opacity {{ App::getLocale() == 'es' ? 'ring-2 ring-blue-500 rounded-full' : '' }}">
                        <img src="https://flagcdn.com/w20/es.png" srcset="https://flagcdn.com/w40/es.png 2x" width="20" alt="Español">
                    </a>
                    <a href="{{ route('lang.switch', 'en') }}" class="hover:opacity-80 transition-opacity {{ App::getLocale() == 'en' ? 'ring-2 ring-blue-500 rounded-full' : '' }}">
                        <img src="https://flagcdn.com/w20/gb.png" srcset="https://flagcdn.com/w40/gb.png 2x" width="20" alt="English">
                    </a>
                </div>

                <!-- Dark Mode Toggle -->
                <button id="dark-toggle" class="w-9 h-9 flex items-center justify-center rounded-full hover:bg-slate-100 dark:hover:bg-slate-700 text-slate-500 dark:text-slate-400 transition-colors" aria-label="Cambiar modo">
                    <svg id="icon-moon" class="w-5 h-5 hidden dark:block" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364-6.364l-.707.707M6.343 17.657l-.707.707M17.657 17.657l-.707-.707M6.343 6.343l-.707-.707M16 12a4 4 0 11-8 0 4 4 0 018 0z"/>
                    </svg>
                    <svg id="icon-sun" class="w-5 h-5 block dark:hidden" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z"/>
                    </svg>
                </button>

                @auth
                    <div class="flex items-center gap-3 pl-4 border-l border-slate-200 dark:border-slate-600">
                        <div class="text-right hidden sm:block">
                            <p class="text-xs font-bold text-slate-900 dark:text-white leading-none">{{ Auth::user()->name }}</p>
                            <p class="text-[10px] font-medium text-blue-600 dark:text-blue-400 uppercase tracking-wider mt-0.5">{{ Auth::user()->role }}</p>
                        </div>
                        <form action="{{ url('/logout') }}" method="POST" class="inline">
                            @csrf
                            <button type="submit" class="bg-slate-900 dark:bg-slate-600 hover:bg-slate-800 dark:hover:bg-slate-500 text-white px-4 py-2 rounded-lg text-xs font-bold transition-all shadow-sm">{{ __('messages.logout') }}</button>
                        </form>
                    </div>
                @else
                    <a href="{{ url('/') }}" class="text-sm font-bold text-slate-600 dark:text-slate-300 hover:text-blue-600 dark:hover:text-blue-400 mr-2 transition-colors">{{ __('messages.explore') }}</a>
                    @if(request()->getHost() === '127.0.0.1' && request()->getPort() === 8080)
                        <a href="{{ route('login') }}" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg text-xs font-bold transition-all shadow-sm">{{ __('messages.login') }}</a>
                    @endif
                @endauth
            </div>
        </div>
    </nav>

    <main class="container mx-auto px-6 py-8 flex-grow">
        @yield('content')
    </main>

    <footer class="bg-gradient-to-br from-blue-50 via-white to-blue-100 dark:from-slate-900 dark:via-slate-900 dark:to-slate-800 border-t border-blue-100 dark:border-slate-700 pt-16 pb-8 mt-20 transition-colors duration-300">
        <div class="container mx-auto px-6">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-12 mb-12">
                <div class="col-span-1 md:col-span-1">
                    <div class="flex items-center gap-2 mb-6">
                        <div class="bg-blue-600 p-1 rounded-md text-white">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M13 4v4l3 2m-5 10v-4l-3-2M9 4a1 1 0 112 0 1 1 0 01-2 0zM4 18h2m4-14h2M18 10h2M12 14l-4 4m8-4l4 4"/>
                            </svg>
                        </div>
                        <span class="text-xl font-bold tracking-tight text-slate-900 dark:text-white">EventRUN!</span>
                    </div>
                    <p class="text-sm leading-relaxed text-slate-500 dark:text-slate-400">
                        {{ __('messages.footer_desc') }}
                    </p>
                </div>

                <div>
                    <h4 class="text-slate-900 dark:text-white font-bold text-xs uppercase tracking-widest mb-6">{{ __('messages.platform') }}</h4>
                    <ul class="space-y-4 text-sm font-medium text-slate-500 dark:text-slate-400">
                        <li><a href="{{ url('/') }}" class="hover:text-blue-600 dark:hover:text-blue-400 transition-colors">{{ __('messages.active_races_link') }}</a></li>
                        @auth
                            @if(Auth::user()->role === 'gestor')
                                <li><a href="{{ url('/gestor/eventos') }}" class="hover:text-blue-600 dark:hover:text-blue-400 transition-colors">{{ __('messages.control_console') }}</a></li>
                            @endif
                        @endauth
                    </ul>
                </div>

                <div>
                    <h4 class="text-slate-900 dark:text-white font-bold text-xs uppercase tracking-widest mb-6">{{ __('messages.resources') }}</h4>
                    <ul class="space-y-4 text-sm font-medium text-slate-500 dark:text-slate-400">
                        <li><a href="{{ route('how-it-works') }}" class="hover:text-blue-600 dark:hover:text-blue-400 transition-colors text-blue-600 dark:text-blue-400">{{ __('messages.learning_center_link') }}</a></li>
                        <li><a href="{{ route('help-center') }}" class="hover:text-blue-600 dark:hover:text-blue-400 transition-colors">{{ __('messages.user_docs_link') }}</a></li>
                    </ul>
                </div>

                <div>
                    <h4 class="text-slate-900 dark:text-white font-bold text-xs uppercase tracking-widest mb-6">{{ __('messages.global_support') }}</h4>
                    <div class="bg-blue-50 dark:bg-slate-700/50 rounded-xl p-4 border border-blue-100 dark:border-slate-600">
                        <div class="flex items-center gap-3 mb-2">
                            <span class="relative flex h-2 w-2">
                                <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-green-400 opacity-75"></span>
                                <span class="relative inline-flex rounded-full h-2 w-2 bg-green-500"></span>
                            </span>
                            <span class="text-xs font-bold text-blue-900 dark:text-blue-300 uppercase tracking-tighter">{{ __('messages.os_status') }}</span>
                        </div>
                        <p class="text-[11px] text-blue-700 dark:text-blue-400 leading-tight">{{ __('messages.os_desc') }}</p>
                    </div>
                </div>
            </div>

            <div class="border-t border-slate-100 dark:border-slate-700 pt-8 flex flex-col md:flex-row justify-between items-center text-[11px] font-bold text-slate-400 uppercase tracking-widest">
                <p>&copy; 2026 EventRUN! Tech Stack. v1.2.4-lts</p>
                <div class="mt-4 md:mt-0 flex space-x-6">
                    <a href="{{ route('terms') }}" class="hover:text-blue-600 dark:hover:text-blue-400 transition-colors">{{ __('messages.terms_service') }}</a>
                    <a href="{{ route('privacy') }}" class="hover:text-blue-600 dark:hover:text-blue-400 transition-colors">{{ __('messages.privacy_policy') }}</a>
                </div>
            </div>
        </div>
    </footer>

    <script>
        document.getElementById('dark-toggle').addEventListener('click', function () {
            const isDark = document.documentElement.classList.toggle('dark');
            localStorage.setItem('darkMode', isDark);
        });
    </script>

    @stack('scripts')

    @auth
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const badges = document.querySelectorAll('.ticket-badge-count');
            if (badges.length === 0) return;

            const role = "{{ Auth::user()->role }}";
            const endpoint = role === 'administrador' ? '/api/admin/tickets/count-open' : '/api/gestor/tickets/count-open';

            async function updateBadge() {
                try {
                    const response = await fetch(endpoint, { headers: { 'Accept': 'application/json' } });
                    if (response.ok) {
                        const data = await response.json();
                        badges.forEach(badge => {
                            if (data.count > 0) {
                                badge.textContent = data.count;
                                badge.classList.remove('hidden');
                                badge.style.display = 'inline-flex';
                            } else {
                                badge.classList.add('hidden');
                                badge.style.display = 'none';
                            }
                        });
                    }
                } catch (error) {
                    console.error('Error actualizando badge:', error);
                }
            }

            updateBadge();
            setInterval(updateBadge, 60000);
        });
    </script>
    @endauth
</body>
</html>
