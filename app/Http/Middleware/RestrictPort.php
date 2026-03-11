<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RestrictPort
{
    /**
     * Maneja la restricción de puertos, sesiones y redirecciones automáticas.
     */
    public function handle(Request $request, Closure $next, string $type): Response
    {
        $port = $request->getPort();
        $adminPort = 8080;
        $publicPort = 8000;

        // --- LÓGICA PARA EL PUERTO DE ADMINISTRACIÓN (8080) ---
        if ($port == $adminPort) {
            // Si el usuario NO está logueado y NO está intentando entrar al login
            if (!Auth::check() && !$request->is('login')) {
                return redirect()->route('login');
            }
        }

        // --- LÓGICA PARA EL PUERTO PÚBLICO (8000) ---
        if ($port == $publicPort) {
            // 1. Impedir acceso a rutas marcadas como 'admin' (Login, Panel, CRUDs)
            if ($type === 'admin') {
                abort(403, 'Seguridad: Esta zona es privada');
            }

            // 2. Cerrar sesión automática si se intenta navegar identificado en la web pública
            if (Auth::check()) {
                Auth::logout();
                $request->session()->invalidate();
                $request->session()->regenerateToken();
                return redirect('/')->with('info', 'Sesión finalizada por seguridad.');
            }
        }

        return $next($request);
    }
}
