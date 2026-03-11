@extends('layouts.app')

@section('content')
<h1 class="text-3xl font-bold mb-6 text-gray-800">Próximos Eventos</h1>

@if($eventos->isEmpty())
    <div class="bg-white p-6 rounded-lg shadow-md text-center">
        <p class="text-gray-600">No hay eventos disponibles en este momento.</p>
    </div>
@else
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach($eventos as $evento)
            <div class="bg-white rounded-xl shadow-lg overflow-hidden transition-transform hover:scale-105">
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
@endif
@endsection
