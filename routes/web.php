<?php

use App\Http\Controllers\Web\EventoWebController;
use App\Http\Controllers\Web\AuthController;
use App\Http\Controllers\Web\PublicTicketController;
use App\Http\Controllers\Web\Admin\AdminUsuarioWebController;
use App\Http\Controllers\Web\Admin\AdminTicketWebController;
use App\Http\Controllers\Web\Gestor\GestorTicketWebController;
use App\Models\Evento;
use Illuminate\Support\Facades\Route;

// Cambio de idioma
Route::get('/lang/{locale}', function ($locale) {
    if (in_array($locale, ['es', 'en'])) {
        session()->put('locale', $locale);
    }
    return redirect()->back();
})->name('lang.switch');

// Rutas Públicas (Puerto 8000)
Route::middleware(['restrictPort:public'])->group(function () {
    Route::get('/', [EventoWebController::class, 'index'])->name('eventos.index');
    Route::get('/eventos/{id}', [EventoWebController::class, 'show'])->name('eventos.show');
    Route::get('/eventos/{id}/reglamento', [EventoWebController::class, 'reglamento'])->name('eventos.reglamento');
    Route::get('/como-funciona', function() {
        return view('pages.how-it-works');
    })->name('how-it-works');
    Route::get('/centro-ayuda', function() {
        $eventos = Evento::orderBy('nombre')->get(['id', 'nombre', 'codigo']);
        return view('pages.help-center', compact('eventos'));
    })->name('help-center');
    Route::post('/centro-ayuda/ticket', [PublicTicketController::class, 'store'])->name('public.ticket.store');
    Route::get('/terminos-de-servicio', fn() => view('pages.terms'))->name('terms');
    Route::get('/politica-de-privacidad', fn() => view('pages.privacy'))->name('privacy');
});

// Rutas de Autenticación y Panel (Puerto 8080)
Route::middleware(['restrictPort:admin'])->group(function () {
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login')->middleware('guest');
    Route::post('/login', [AuthController::class, 'login'])->middleware('guest');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');

    // Rutas Protegidas
    Route::middleware(['auth'])->group(function () {
        
        // Zona Gestor
        Route::middleware(['role:gestor'])->prefix('gestor')->name('gestor.')->group(function () {
            Route::resource('eventos', \App\Http\Controllers\Web\Gestor\GestorEventoWebController::class);

            // Gestión de Tickets para Gestor            Route::get('/tickets', [GestorTicketWebController::class, 'index'])->name('tickets.index');
            Route::get('/tickets/{id}', [GestorTicketWebController::class, 'show'])->name('tickets.show');
            Route::put('/tickets/{id}', [GestorTicketWebController::class, 'update'])->name('tickets.update');
        });

        // Zona Administrador
        Route::middleware(['role:administrador'])->prefix('admin')->name('admin.')->group(function () {
            // CRUD de Usuarios
            Route::get('/usuarios', [AdminUsuarioWebController::class, 'index'])->name('usuarios.index');
            Route::get('/usuarios/crear', [AdminUsuarioWebController::class, 'create'])->name('usuarios.create');
            Route::post('/usuarios', [AdminUsuarioWebController::class, 'store'])->name('usuarios.store');
            Route::get('/usuarios/{id}/editar', [AdminUsuarioWebController::class, 'edit'])->name('usuarios.edit');
            Route::put('/usuarios/{id}', [AdminUsuarioWebController::class, 'update'])->name('usuarios.update');
            Route::delete('/usuarios/{id}', [AdminUsuarioWebController::class, 'destroy'])->name('usuarios.destroy');

            // Gestión de Tickets para Admin
            Route::get('/tickets', [AdminTicketWebController::class, 'index'])->name('tickets.index');
            Route::get('/tickets/{id}', [AdminTicketWebController::class, 'show'])->name('tickets.show');
            Route::put('/tickets/{id}', [AdminTicketWebController::class, 'update'])->name('tickets.update');
            Route::delete('/tickets/{id}', [AdminTicketWebController::class, 'destroy'])->name('tickets.destroy');
        });
    });
});
