<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reparacion extends Model
{
    use HasFactory;
    //Este modelo espera que la tabla se llame reparacions,
    //pero nuestra tabla se llama reparaciones
    protected $table = "reparaciones";

    function coche(){
        return $this->belongsTo(Coche::class);
    }

    function piezasReparacion(){
        return $this->hasMany(Pieza_reparacion::class)->get();
    }
}
