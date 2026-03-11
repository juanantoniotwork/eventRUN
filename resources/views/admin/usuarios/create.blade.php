@extends('layouts.app')

@section('content')
<div class="max-w-2xl mx-auto bg-white p-8 rounded-2xl shadow-xl border-t-4 border-blue-600">
    <div class="flex items-center justify-between mb-8">
        <h1 class="text-3xl font-bold text-gray-800">Nuevo Usuario</h1>
        <a href="{{ route('admin.usuarios.index') }}" class="text-blue-600 hover:underline text-sm">Volver</a>
    </div>

    <form action="{{ route('admin.usuarios.store') }}" method="POST" class="space-y-6">
        @csrf
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Nombre Completo</label>
            <input type="text" name="name" value="{{ old('name') }}" required class="w-full p-3 border rounded-lg focus:ring-2 focus:ring-blue-500 outline-none">
        </div>
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Email</label>
            <input type="email" name="email" value="{{ old('email') }}" required class="w-full p-3 border rounded-lg focus:ring-2 focus:ring-blue-500 outline-none">
        </div>
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Contraseña</label>
            <input type="password" name="password" required class="w-full p-3 border rounded-lg focus:ring-2 focus:ring-blue-500 outline-none">
        </div>
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Rol en el Sistema</label>
            <select name="role" required class="w-full p-3 border rounded-lg focus:ring-2 focus:ring-blue-500 outline-none bg-white">
                <option value="invitado">Invitado</option>
                <option value="gestor">Gestor</option>
                <option value="administrador">Administrador</option>
            </select>
        </div>
        <button type="submit" class="w-full bg-blue-600 text-white font-bold py-3 px-6 rounded-lg hover:bg-blue-700 transition transform hover:scale-[1.01]">
            Guardar Usuario
        </button>
    </form>
</div>
@endsection
