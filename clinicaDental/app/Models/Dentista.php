<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dentista extends Model
{
    use HasFactory;
    
    public function citas(){
        return $this->hasMany(Cita::class,'dentista')->get();
    }
}
