<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    //return view('welcome');
    return "<h1>BIENVENIDO</h1>";
});
Route::get('/coches', function () {
    return "<h1>PÁGINA PARA VER TODOS LOS COCHES</h1>";
});
Route::get('/coches/crear', function () {
    return "<h1>PÁGINA PARA CREAR UN COCHE</h1>";
});
//Ruta con dos parámetros, el segundo es opcional
//Para decir que es opcional ponemos una ? en la ruta
// y en la función hay que dar un valor por defecto, en este caso null
Route::get('/coches/{matricula}/{dni?}', function ($matricula,$dni=null) {
    if($dni==null){
        return "<h1>PÁGINA PARA VER EL COCHE $matricula</h1>";
    }
    else{
        return "<h1>PÁGINA PARA VER EL PROPIETARIO DEL 
    COCHE $matricula CON DNI $dni</h1>";
    }
    
});

