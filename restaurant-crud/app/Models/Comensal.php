<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comensal extends Model
{
    use HasFactory;
    protected $fillable = ['nombre', 'correo', 'telefono', 'direccion'];

    public function reservas()
    {
        return $this->hasMany(Reserva::class);
    }
}
