<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TicketSoporte extends Model
{
    /** @use HasFactory<\Database\Factories\TicketSoporteFactory> */
    use HasFactory;

    protected $table = 'tickets_soporte';

    protected $fillable = [
        'evento_id',
        'nombre',
        'email',
        'asunto',
        'mensaje',
        'respuesta',
        'estado',
    ];

    public function evento(): BelongsTo
    {
        return $this->belongsTo(Evento::class);
    }

    /**
     * Scope a query to only include open tickets.
     */
    public function scopeOpen($query)
    {
        return $query->where('estado', 'abierto');
    }
}
