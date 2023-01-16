<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CocheControler extends Controller
{
    //
    function verCoches(){
        return view("coches/index");
    }

    function crearCoche(){
        return view("coches/crear");
    }

    function verCoche($matricula,$dni=null){
        if($dni==null){
            return view("coches/verCoche",["matricula"=>$matricula]);
        }
        else{
            return view("coches/verPropietario",
                        ["matricula"=>$matricula,"dni"=>$dni]);
        }
    }
}
