<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class NotasController extends Controller
{
    //
    function verNotas(){
        //REcuperar las notas de la api
        $response = Http::get('http://localhost/notas/public/api/notas');
        if($response->ok()){
            $notas = $response->json();
            return view('/index',compact('notas'));
        }
        else{
            $codigo = $response->status();
            $texto = $response->body();
            return view('/error',compact('codigo','texto'));
        }
        
    }
    function crearNota(){
        return view('crear');
    }
    function insertarNota(Request $request){
        $request->validate([
            "nombre"=>'required',
            "asig"=>'required',
            "nota"=>'required'
        ]);
        //Insertar la nota mediante el servicio web
        $response = Http::post('http://localhost/notas/public/api/notas',[
            "nombre"=>$request->nombre,
            "asig"=>$request->asig,
            "nota"=>$request->nota
        ]);
        if($response->failed()){
            $codigo = $response->status();
            $texto = $response->body();
            return view('/error',compact('codigo','texto'));
        }
        else{
            return redirect(route('verNotas'));
        }
    }
    function modificarNota($id){
        //Recuperar una nota mediante el servicio web
        $response = Http::get('http://localhost/notas/public/api/notas/'.$id);
        if($response->ok()){
            $nota = $response->json();
        }
        else{
            $codigo = $response->status();
            $texto = $response->body();
            return view('/error',compact('codigo','texto'));
        }

        //Cargar vista de modificar nota
        return view('modificar',compact("nota"));
    }
    function updateNota(Request $request,$id){
        $request->validate([
            "nota"=>'required'
        ]);
        //Llamar al servicio web que modifica la nota
        $response = Http::put('http://localhost/notas/public/api/notas/'.$id,
        ["nota"=>$request->nota]);
        if($response->failed()){
            $codigo = $response->status();
            $texto = $response->body();
            return view('/error',compact('codigo','texto'));
        }
        else{
            return redirect(route('verNotas'));
        }
    }
    function borrarNota($id){       
        //Llamar al servicio web que borra la nota
        $response = Http::delete('http://localhost/notas/public/api/notas/'.$id);
        if($response->failed()){
            $codigo = $response->status();
            $texto = $response->body();
            return view('/error',compact('codigo','texto'));
        }
        else{
            return redirect(route('verNotas'));
        }
    }
}
