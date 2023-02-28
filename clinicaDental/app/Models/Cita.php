<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cita extends Model
{
    use HasFactory;

    public function datosPaciente(){
        return $this->belongsTo(Paciente::class,'paciente','dni');
    }
    public function datosDentista(){
        return $this->belongsTo(Dentista::class,'dentista','numCol');
    }
}
