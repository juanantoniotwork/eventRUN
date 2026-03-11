<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, string $role): Response
    {
        if (!$request->user()) {
            return response()->json(['message' => 'No autenticado.'], 401);
        }

        $roles = [
            'administrador' => 3,
            'gestor' => 2,
            'usuario_publico' => 1,
        ];

        $userRoleWeight = $roles[$request->user()->role] ?? 0;
        $requiredRoleWeight = $roles[$role] ?? 0;

        if ($userRoleWeight < $requiredRoleWeight) {
            return response()->json(['message' => 'Acceso denegado. No tienes permisos suficientes.'], 403);
        }

        return $next($request);
    }
}
