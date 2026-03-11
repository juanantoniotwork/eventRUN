@extends('layouts.app')

@section('content')
<div class="flex justify-center items-center py-12">
    <div class="bg-white p-8 rounded-2xl shadow-xl w-full max-w-md border-t-4 border-blue-600">
        <h2 class="text-3xl font-extrabold text-center text-gray-900 mb-8">Iniciar Sesión</h2>

        @if($errors->any())
            <div class="bg-red-100 text-red-700 p-3 rounded-lg mb-6 text-sm">
                @foreach ($errors->all() as $error)
                    <p>{{ $error }}</p>
                @endforeach
            </div>
        @endif

        <form action="{{ url('/login') }}" method="POST" class="space-y-6">
            @csrf
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Correo Electrónico</label>
                <input type="email" name="email" value="{{ old('email') }}" required class="w-full p-3 border rounded-lg focus:ring-2 focus:ring-blue-500 transition outline-none">
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Contraseña</label>
                <input type="password" name="password" required class="w-full p-3 border rounded-lg focus:ring-2 focus:ring-blue-500 transition outline-none">
            </div>

            <button type="submit" class="w-full bg-blue-600 text-white font-bold py-3 px-6 rounded-lg hover:bg-blue-700 transition transform hover:scale-[1.01]">
                Entrar
            </button>
        </form>
    </div>
</div>
@endsection
