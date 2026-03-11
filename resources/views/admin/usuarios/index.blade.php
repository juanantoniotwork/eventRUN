@extends('layouts.app')

@section('content')
<div class="max-w-6xl mx-auto py-6">
    <div class="flex items-center justify-between mb-8 border-b border-slate-200 pb-4">
        <h1 class="text-xl font-bold text-slate-800 uppercase tracking-tight">Directorio de Usuarios</h1>
        <a href="{{ route('admin.usuarios.create') }}" class="text-xs font-bold bg-slate-900 text-white px-4 py-2 rounded uppercase tracking-widest hover:bg-slate-800 transition-colors">
            + Alta Usuario
        </a>
    </div>

    <div class="bg-white border border-slate-200 rounded-lg overflow-hidden shadow-sm">
        <table class="w-full text-left border-collapse text-sm">
            <thead>
                <tr class="bg-slate-50 border-b border-slate-200">
                    <th class="px-6 py-3 font-bold text-slate-500 uppercase tracking-wider">Identidad / Email</th>
                    <th class="px-6 py-3 font-bold text-slate-500 uppercase tracking-wider text-center">Rol</th>
                    <th class="px-6 py-3 font-bold text-slate-500 uppercase tracking-wider text-right">Operaciones</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-100">
                @foreach($usuarios as $usuario)
                    <tr class="hover:bg-slate-50/50 transition-colors">
                        <td class="px-6 py-4">
                            <p class="font-bold text-slate-900">{{ $usuario->name }}</p>
                            <p class="text-xs text-slate-400 font-medium">{{ $usuario->email }}</p>
                        </td>
                        <td class="px-6 py-4 text-center">
                            <span class="text-[10px] font-bold text-slate-500 uppercase border border-slate-200 px-2 py-0.5 rounded bg-white">
                                {{ $usuario->role }}
                            </span>
                        </td>
                        <td class="px-6 py-4 text-right space-x-4">
                            <a href="{{ route('admin.usuarios.edit', $usuario->id) }}" class="text-xs font-bold text-blue-600 hover:underline">Editar</a>
                            @if(Auth::id() !== $usuario->id)
                                <form action="{{ route('admin.usuarios.destroy', $usuario->id) }}" method="POST" class="inline" onsubmit="return confirm('Eliminar permanentemente?')">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="text-xs font-bold text-rose-500 hover:underline uppercase">Baja</button>
                                </form>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
