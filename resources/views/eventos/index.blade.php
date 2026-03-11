@extends('layouts.app')

@section('content')
<div class="flex flex-col md:flex-row md:items-center md:justify-between mb-8">
    <h1 class="text-3xl font-bold text-gray-800">Próximos Eventos</h1>
    
    <!-- Buscador Real-Time -->
    <div class="mt-4 md:mt-0 w-full md:w-72 relative">
        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
            <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
            </svg>
        </div>
        <input type="text" id="event-search" placeholder="Buscar carrera..." 
            class="block w-full pl-10 pr-3 py-2 border border-gray-300 rounded-xl leading-5 bg-white placeholder-gray-500 focus:outline-none focus:placeholder-gray-400 focus:ring-1 focus:ring-blue-500 focus:border-blue-500 sm:text-sm transition-all shadow-sm">
    </div>
</div>

@if($eventos->isEmpty())
    <div class="bg-white p-6 rounded-lg shadow-md text-center">
        <p class="text-gray-600">No hay eventos disponibles en este momento.</p>
    </div>
@else
    <div id="events-grid" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach($eventos as $evento)
            <div class="event-card bg-white rounded-xl shadow-lg overflow-hidden transition-transform hover:scale-105" 
                 data-name="{{ strtolower($evento->nombre) }}">
                <img src="{{ $evento->imagen ?? 'https://via.placeholder.com/600x400?text=Sin+Imagen' }}" alt="{{ $evento->nombre }}" class="w-full h-48 object-cover">
                <div class="p-4">
                    <h2 class="text-xl font-semibold mb-2">{{ $evento->nombre }}</h2>
                    <p class="text-gray-500 mb-4">{{ $evento->fecha->format('d/m/Y H:i') }}</p>
                    <div class="flex flex-wrap gap-2">
                        <a href="{{ url('/eventos/' . $evento->id) }}" class="flex-1 text-center bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition font-bold">
                            Ver Detalles
                        </a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    
    <!-- Mensaje No Resultados (Oculto por defecto) -->
    <div id="no-results" class="hidden bg-white p-12 rounded-2xl shadow-sm text-center border border-gray-100">
        <div class="bg-gray-50 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4">
            <svg class="w-8 h-8 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.172 9.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
            </svg>
        </div>
        <p class="text-gray-500 font-medium">No se han encontrado carreras que coincidan con tu búsqueda.</p>
    </div>
@endif

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const searchInput = document.getElementById('event-search');
        const eventCards = document.querySelectorAll('.event-card');
        const eventsGrid = document.getElementById('events-grid');
        const noResults = document.getElementById('no-results');

        if (searchInput) {
            searchInput.addEventListener('input', function(e) {
                const term = e.target.value.toLowerCase().trim();
                let hasResults = false;

                eventCards.forEach(card => {
                    const eventName = card.getAttribute('data-name');
                    if (eventName.includes(term)) {
                        card.style.display = 'block';
                        hasResults = true;
                    } else {
                        card.style.display = 'none';
                    }
                });

                // Toggle mensaje de no resultados
                if (hasResults) {
                    eventsGrid.classList.remove('hidden');
                    eventsGrid.classList.add('grid');
                    noResults.classList.add('hidden');
                } else {
                    eventsGrid.classList.remove('grid');
                    eventsGrid.classList.add('hidden');
                    noResults.classList.remove('hidden');
                }
            });
        }
    });
</script>
@endpush
@endsection
