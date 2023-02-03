<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pieza extends Model
{
    use HasFactory;

    function piezaEnReparacion(){
        //Recupera las pieza_reparaciones en las que aparece esta pieza
        return $this->hasMany(Pieza_reparacion::class);
    }
}
