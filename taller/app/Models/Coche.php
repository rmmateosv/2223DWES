<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coche extends Model
{
    use HasFactory;

    //Creamos la relación muchos a 1
    // 1 coche es de un propietario
    function propietario(){
        return $this->belongsTo(Propietario::class);
    }

    function reparaciones(){
        return $this->hasMany(Reparacion::class);
    }
}
