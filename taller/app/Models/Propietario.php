<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Propietario extends Model
{
    use HasFactory;

    //Un propietario puede tener 1 o varios coches
    //Creamos la realación 1 a muchos entre propietario y coches
    function coches(){
    return $this->hasMany(Coche::class);
    }
}


