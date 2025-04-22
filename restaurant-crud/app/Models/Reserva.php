<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reserva extends Model
{
    protected $fillable = [
        'comensal_id',
        'mesa_id',
        'fecha_hora_reserva',
        'numero_personas',
    ];

    public function comensal()
    {
        return $this->belongsTo(Comensal::class);
    }
    
    public function mesa()
    {
        return $this->belongsTo(Mesa::class);
    }
}
