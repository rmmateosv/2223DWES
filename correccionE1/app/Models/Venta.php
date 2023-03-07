<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Venta extends Model
{
    use HasFactory;

    function datosProducto(){
        return $this->belongsTo(Producto::class,'producto','id');
    }
}
