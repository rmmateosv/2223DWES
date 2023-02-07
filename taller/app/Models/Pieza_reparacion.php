<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pieza_reparacion extends Model
{
    use HasFactory;
    protected $table = "pieza_reparaciones";

    function pieza(){
        //Recupera la pieza de esta pieza_reparación
        return $this->belongsTo(Pieza::class);
    }
    function reparacion(){
        //Recupera la reparacon de esta pieza_reparación
        return $this->belongsTo(Reparacion::class);
    }
}
