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
        return view('paciente/crear');
    }
    function insertarPaciente(Request $request){
        //Validaciones de campos
        $request->validate([
            'dni'=> 'required|min:9|unique:App\Models\Paciente,dni',
            'nombre'=>'required',
            'telefono'=>'required',
            'email'=>'required|email:rfc,dns',
            'fechaN'=>'required'
        ]);
        //Insertar Paciente
        $paciente = new Paciente();
        $paciente->dni=$request->dni;
        $paciente->nombre=$request->nombre;
        $paciente->telefono=$request->telefono;
        $paciente->email=$request->email;
        $paciente->fechaNac=$request->fechaN;
        if($paciente->save()){
            $mensaje = 'Paciente creado';
        }
        else{
            $mensaje='Error al crear el paciente';
        }
        return back()->with('textoMensaje',$mensaje);
    }

    function modificarPaciente($dni){
        
    }
    function updatePaciente(Request $request, $dni){
        
    }

    function borrarPaciente($dni){
        //Recuperar paciente para ver si hay citas
        $paciente = Paciente::where('dni',$dni)->first();
        if(sizeof($paciente->citas())==0){
            if(Paciente::where('dni',$dni)->delete()){
                $mensaje='Paciente borrado';
            }
            else{
                $mensaje='Se ha producido un error al borrar el paciente, contacta con el administrador';
            }
        }
        else{
            $mensaje = 'Error, no se puede borrar el paciente porque tiene citas';
        }
        return back()->with('textoMensaje',$mensaje);
    }
}
