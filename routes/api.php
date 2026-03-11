<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\Public\EventoPublicoController;
use App\Http\Controllers\Api\Public\TicketPublicoController;
use App\Http\Controllers\Api\Gestor\GestorEventoController;
use App\Http\Controllers\Api\Gestor\GestorTicketController;
use App\Http\Controllers\Api\Admin\AdminUsuarioController;
use App\Http\Controllers\Api\Admin\AdminTicketController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Rutas Públicas
Route::prefix('eventos')->group(function () {
    Route::get('/', [EventoPublicoController::class, 'index']);
    Route::get('/{id}', [EventoPublicoController::class, 'show']);
    Route::post('/{id}/tickets', [TicketPublicoController::class, 'store']);
});

// Rutas de Auth
Route::post('/auth/login', [AuthController::class, 'login']);

Route::middleware(['auth:sanctum'])->group(function () {
    Route::post('/auth/logout', [AuthController::class, 'logout']);
    
    Route::get('/user', function (Request $request) {
        return $request->user();
    });

    // Zona Gestor (Mínimo rol 'gestor')
    Route::middleware(['role:gestor'])->prefix('gestor')->group(function () {
        // CRUD Eventos
        Route::get('/eventos', [GestorEventoController::class, 'index']);
        Route::post('/eventos', [GestorEventoController::class, 'store']);
        Route::put('/eventos/{id}', [GestorEventoController::class, 'update']);
        Route::delete('/eventos/{id}', [GestorEventoController::class, 'destroy']);

        // Gestión de Tickets
        Route::get('/tickets', [GestorTicketController::class, 'index']);
        Route::get('/tickets/{id}', [GestorTicketController::class, 'show']);
        Route::put('/tickets/{id}', [GestorTicketController::class, 'update']);
    });

    // Zona Admin (Mínimo rol 'administrador')
    Route::middleware(['role:administrador'])->prefix('admin')->group(function () {
        // CRUD Usuarios
        Route::get('/usuarios', [AdminUsuarioController::class, 'index']);
        Route::post('/usuarios', [AdminUsuarioController::class, 'store']);
        Route::put('/usuarios/{id}', [AdminUsuarioController::class, 'update']);
        Route::delete('/usuarios/{id}', [AdminUsuarioController::class, 'destroy']);

        // Vista Global de Tickets
        Route::get('/tickets', [AdminTicketController::class, 'index']);
    });
});
