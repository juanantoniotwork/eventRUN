@extends('layouts.app')

@section('content')
<div class="max-w-2xl mx-auto bg-white p-8 rounded-2xl shadow-xl border-t-4 border-blue-600">
    <div class="flex items-center justify-between mb-8">
        <h1 class="text-3xl font-bold text-gray-800">Editar Usuario</h1>
        <a href="{{ route('admin.usuarios.index') }}" class="text-blue-600 hover:underline text-sm">Volver</a>
    </div>

    <form action="{{ route('admin.usuarios.update', $usuario->id) }}" method="POST" class="space-y-6">
        @csrf
        @method('PUT')
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Nombre Completo</label>
            <input type="text" name="name" value="{{ old('name', $usuario->name) }}" required class="w-full p-3 border rounded-lg focus:ring-2 focus:ring-blue-500 outline-none">
        </div>
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Email</label>
            <input type="email" name="email" value="{{ old('email', $usuario->email) }}" required class="w-full p-3 border rounded-lg focus:ring-2 focus:ring-blue-500 outline-none">
        </div>
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Nueva Contraseña (opcional)</label>
            <input type="password" name="password" class="w-full p-3 border rounded-lg focus:ring-2 focus:ring-blue-500 outline-none" placeholder="Dejar en blanco para mantener la actual">
        </div>
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Rol</label>
            <select name="role" required class="w-full p-3 border rounded-lg focus:ring-2 focus:ring-blue-500 outline-none bg-white">
                <option value="invitado" {{ $usuario->role === 'invitado' ? 'selected' : '' }}>Invitado</option>
                <option value="gestor" {{ $usuario->role === 'gestor' ? 'selected' : '' }}>Gestor</option>
                <option value="administrador" {{ $usuario->role === 'administrador' ? 'selected' : '' }}>Administrador</option>
            </select>
        </div>
        <button type="submit" class="w-full bg-blue-600 text-white font-bold py-3 px-6 rounded-lg hover:bg-blue-700 transition transform hover:scale-[1.01]">
            Actualizar Usuario
        </button>
    </form>
</div>
@endsection
