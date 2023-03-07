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
        
    }
    function insertarNota(Request $request){
        
    }
    function modificarNota($id){
        
    }
    function updateNota(Request $request,$id){
        
    }
    function borrarNota($id){
        
    }
}
