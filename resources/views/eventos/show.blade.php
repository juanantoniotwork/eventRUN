@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto">
    <a href="{{ url('/') }}" class="text-blue-600 hover:underline mb-4 inline-block">&larr; {{ __('messages.back_to_list') }}</a>

    <div class="bg-white rounded-2xl shadow-xl overflow-hidden mb-8">
        <img src="{{ $evento->imagen ?? 'https://via.placeholder.com/1200x600?text=Detalle+Evento' }}" alt="{{ $evento->nombre }}" class="w-full h-80 object-cover">
        <div class="p-8">
            <h1 class="text-4xl font-extrabold mb-4 text-gray-900">{{ $evento->nombre }}</h1>
            <div class="flex flex-wrap gap-6 text-gray-600 mb-6">
                <div class="flex items-center">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                    <span class="font-medium">{{ $evento->fecha->format('d/m/Y H:i') }}</span>
                </div>
                @if($evento->ubicacion)
                    <div class="flex items-center">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                        <span class="font-medium">{{ $evento->ubicacion }}</span>
                    </div>
                @endif
            </div>

            <p class="text-lg text-gray-700 leading-relaxed mb-8">{{ $evento->descripcion }}</p>

            @if($evento->latitud && $evento->longitud)
                <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"/>
                <p class="text-xs font-bold text-slate-400 uppercase tracking-widest mb-2">{{ __('messages.exact_location') }}</p>
                <div style="position:relative; height:350px; border-radius:12px; overflow:hidden; margin-bottom:24px;">
                    <div id="evento-map" style="height:100%; width:100%;"></div>
                    <button id="btn-reset-map" style="position:absolute; bottom:12px; left:12px; z-index:1000; display:flex; align-items:center; gap:6px; background:#2563eb; color:#fff; border:none; border-radius:8px; padding:8px 14px; font-size:12px; font-weight:700; cursor:pointer; box-shadow:0 2px 8px rgba(0,0,0,0.3);">
                        <svg style="width:13px;height:13px;flex-shrink:0;" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                        </svg>
                        {{ __('messages.back_to_location') }}
                    </button>
                </div>
                <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
                <script>
                    var lat = {{ $evento->latitud }};
                    var lng = {{ $evento->longitud }};
                    var zoom = 14;
                    var map = L.map('evento-map').setView([lat, lng], zoom);
                    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a>'
                    }).addTo(map);
                    L.marker([lat, lng]).addTo(map)
                        .bindPopup('<strong>{{ addslashes($evento->nombre) }}</strong>')
                        .openPopup();
                    document.getElementById('btn-reset-map').onclick = function() {
                        map.setView([lat, lng], zoom);
                    };
                </script>
            @endif
            
            @if($evento->reglamento)
                <div class="flex flex-col sm:flex-row gap-4">
                    <a href="{{ route('eventos.reglamento', $evento->id) }}" class="inline-flex items-center justify-center px-6 py-3 bg-slate-900 text-white rounded-xl font-bold text-sm uppercase tracking-widest hover:bg-slate-800 transition shadow-lg shadow-slate-200">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                        {{ __('messages.download_rules') }}
                    </a>
                </div>
            @endif
        </div>
    </div>

    <!-- Contact Form Section -->
    <div class="bg-white rounded-2xl shadow-xl p-8 mb-12 border-t-4 border-blue-600">
        <h2 class="text-2xl font-bold mb-6 text-gray-800">{{ __('messages.support_contact') }}</h2>
        
        <div id="alert-container" class="hidden mb-6 p-4 rounded-lg"></div>

        <form id="ticket-form" class="space-y-4">
            @csrf
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">{{ __('messages.name') }}</label>
                    <input type="text" name="nombre" id="nombre" class="w-full p-3 border rounded-lg focus:ring-2 focus:ring-blue-500 transition outline-none">
                    <p class="text-red-500 text-xs mt-1 hidden" id="error-nombre"></p>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">{{ __('messages.email') }}</label>
                    <input type="email" name="email" id="email" class="w-full p-3 border rounded-lg focus:ring-2 focus:ring-blue-500 transition outline-none">
                    <p class="text-red-500 text-xs mt-1 hidden" id="error-email"></p>
                </div>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">{{ __('messages.subject') }}</label>
                <input type="text" name="asunto" id="asunto" class="w-full p-3 border rounded-lg focus:ring-2 focus:ring-blue-500 transition outline-none">
                <p class="text-red-500 text-xs mt-1 hidden" id="error-asunto"></p>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">{{ __('messages.message') }}</label>
                <textarea name="mensaje" id="mensaje" rows="4" class="w-full p-3 border rounded-lg focus:ring-2 focus:ring-blue-500 transition outline-none"></textarea>
                <p class="text-red-500 text-xs mt-1 hidden" id="error-mensaje"></p>
            </div>
            <button type="submit" class="w-full bg-blue-600 text-white font-bold py-3 px-6 rounded-lg hover:bg-blue-700 transition transform hover:scale-[1.01]">
                {{ __('messages.send_query') }}
            </button>
        </form>
    </div>
</div>

@push('scripts')
<script type="module">
    // Cargar Zod desde CDN (ES Module)
    import { z } from 'https://cdn.jsdelivr.net/npm/zod@3.22.4/+esm';

    const translations = {
        success: "{{ __('messages.success_ticket') }}",
        error: "{{ __('messages.error_ticket') }}"
    };

    const form = document.getElementById('ticket-form');
    const alertContainer = document.getElementById('alert-container');

    form.addEventListener('submit', async (e) => {
        e.preventDefault();
        
        // Reset errors
        document.querySelectorAll('[id^="error-"]').forEach(el => el.classList.add('hidden'));
        alertContainer.classList.add('hidden');

        const formData = {
            nombre: document.getElementById('nombre').value,
            email: document.getElementById('email').value,
            asunto: document.getElementById('asunto').value,
            mensaje: document.getElementById('mensaje').value,
        };

        try {
            // Validar con Zod
            ticketSchema.parse(formData);

            // Enviar al API
            const response = await fetch('/api/eventos/{{ $evento->id }}/tickets', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'Accept': 'application/json'
                },
                body: JSON.stringify(formData)
            });

            const result = await response.json();

            if (response.ok) {
                showAlert('¡Éxito! Tu ticket ha sido creado correctamente.', 'success');
                form.reset();
            } else {
                showAlert(result.message || 'Error al procesar la solicitud', 'error');
            }

        } catch (error) {
            if (error instanceof z.ZodError) {
                error.errors.forEach(err => {
                    const field = err.path[0];
                    const errorEl = document.getElementById(`error-${field}`);
                    if (errorEl) {
                        errorEl.textContent = err.message;
                        errorEl.classList.remove('hidden');
                    }
                });
            } else {
                showAlert('Hubo un error inesperado. Inténtalo de nuevo.', 'error');
                console.error(error);
            }
        }
    });

    function showAlert(message, type) {
        alertContainer.textContent = message;
        alertContainer.classList.remove('hidden', 'bg-green-100', 'text-green-800', 'bg-red-100', 'text-red-800');
        
        if (type === 'success') {
            alertContainer.classList.add('bg-green-100', 'text-green-800');
        } else {
            alertContainer.classList.add('bg-red-100', 'text-red-800');
        }
    }
</script>
@endpush
@endsection
