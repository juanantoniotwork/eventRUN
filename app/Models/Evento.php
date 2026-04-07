<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Str;

class Evento extends Model
{
    /** @use HasFactory<\Database\Factories\EventoFactory> */
    use HasFactory;

    protected $table = 'eventos';

    protected $fillable = [
        'user_id',
        'codigo',
        'nombre',
        'nombre_en',
        'descripcion',
        'descripcion_en',
        'fecha',
        'imagen',
        'estado',
        'reglamento',
        'reglamento_en',
        'ubicacion',
        'latitud',
        'longitud',
    ];

    protected static function booted(): void
    {
        static::creating(function (Evento $evento) {
            if (empty($evento->codigo)) {
                do {
                    $codigo = 'EVT-' . strtoupper(Str::random(6));
                } while (static::where('codigo', $codigo)->exists());

                $evento->codigo = $codigo;
            }
        });
    }

    protected $casts = [
        'fecha' => 'datetime',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function tickets(): HasMany
    {
        return $this->hasMany(TicketSoporte::class);
    }

    public function scopePublicados(Builder $query): void
    {
        $query->where('estado', 'publicado');
    }
}
