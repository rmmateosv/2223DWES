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
        //Recuperar el paciente a modificar
        $paciente = Paciente::where('dni',$dni)->first();
        //Cargar vista de modificar con datos del paciente
        return view('/paciente/modificar',compact('paciente'));
    }
    function updatePaciente(Request $request, $dni){
        //Validaciones de campos
        $request->validate([
            'dni'=> 'required|min:9',
            'nombre'=>'required',
            'telefono'=>'required',
            'email'=>'required|email:rfc,dns',
            'fechaN'=>'required'
        ]);
        //Comprobar que si se modificar el dni, no existe el nuevo en la bd
        if($request->dni!=$dni){
            $paciente = Paciente::where('dni',$request->dni)->first();            
        }
        if(isset($paciente) and $paciente!=null){
            $mensaje = 'Error, ya existe el dni en la BD';
            return back()->with('dni',$request->dni)->with('textoMensaje',$mensaje);
        }
        else{
            //Recuperar el paciente de la BD y  Modificar con los nuevos datos
            $ok = Paciente::where('dni',$dni)
            ->update(['dni'=>$request->dni,
                      'nombre'=>$request->nombre,
                      'telefono'=>$request->telefono,
                      'email'=>$request->email,
                      'fechaNAc'=>$request->fechaN]);           
            
            if($ok){
                $mensaje = 'Paciente modificado';
                return redirect(route('modificarPaciente',$request->dni))
                ->with('textoMensaje',$mensaje);
            }
            else{
                $mensaje = 'Error al modificar el paciente';
                return back()->with('dni',$request->dni)->with('textoMensaje',$mensaje);
            }
        }
        
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
