<?php

namespace App\Http\Controllers;

use App\Models\Paciente;
use Illuminate\Http\Request;

class PacienteController extends Controller
{
    //
    function verPacientes(){
        //Recuperar los datos de los pacientes
        $pacientes = Paciente::all();

        return view('paciente/index',compact('pacientes'));
    }

    function crearPaciente(){
        
    }
    function insertarPaciente(Request $request){
        
    }

    function modificarPaciente($dni){
        
    }
    function updatePaciente(Request $request, $dni){
        
    }

    function borrarPaciente($dni){
        
    }
}
