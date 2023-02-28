<?php

namespace App\Http\Controllers;

use App\Models\Cita;
use App\Models\Dentista;
use App\Models\Paciente;
use Illuminate\Http\Request;

class CitaController extends Controller
{
    //
    function verCitas(){
        //REcuperar citas
        $citas = Cita::all();
        return view('cita/index',compact('citas'));
    }

    function crearCita(){
        //Obener pacientes
        $pacientes = Paciente::all();
        //Obtener dentistas
        $dentistas = Dentista::all();
        return view('cita/crear',compact('pacientes','dentistas'));
    }
    function insertarCita(Request $request){
        //Validaciones
        $request->validate([
            'fecha'=> 'required',
            'paciente'=>'required',
            'dentista'=>'required',
            'motivo'=>'required'
        ]);

        //Crear cita
        $cita = new Cita();
        $cita->fecha = $request->fecha;
        $cita->paciente = $request->paciente;
        $cita->dentista = $request->dentista;
        $cita->motivo = $request->motivo;
        //Insertar la cita
        if($cita->save()){
            $mensaje = 'Cita creada '.$cita->id;
        }
        else{
            $mensaje = 'Error al crear la cita';
        }
        return redirect(route('verCitas'))->with('textoMensaje',$mensaje);
    }

    function modificarCita($id){
        //Obtener datos cita
        $cita = Cita::find($id);
        //Obtener datos denitistas para el select
        $dentistas = Dentista::all();
        return view('cita/modificar',compact('cita','dentistas'));
    }
    function updateCita(Request $request, $id){
        //Validaciones
        $request->validate([
            'fecha'=> 'required',
            'dentista'=>'required',
            'motivo'=>'required'
        ]);

        //Recuperamos la citas
        $cita = Cita::find($id);
        //Modificamos campos
        $cita->fecha = $request->fecha;
        $cita->dentista = $request->dentista;
        $cita->motivo = $request->motivo;
        $cita->diagnostico = $request->diagnostico;
        //Guardamos en bd
        if($cita->save()){
            $mensaje = 'Cita modificada';
        }
        else{
            $mensaje = 'Error al modificar la cita';
        }
        return back()->with('textoMensaje',$mensaje);
    }

    function borrarCita($id){
        
    }
}
