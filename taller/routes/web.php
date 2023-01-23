<?php

use App\Http\Controllers\CocheControler;
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

Route::controller(CocheControler::class)->group(
    function(){
        Route::get('/coches', "verCoches")->name('verCoches');
        Route::get('/coches/crear', "crearCoche")-> name('crearCoche');
        //Esta ruta recoge los datos del formulario de crear coche y los
        //envia por post a la función insertarCoche del controlador
        Route::post('/coches/crear', "insertarCoche")->name('insertarCoche');

        Route::get('/coches/modificar/{id}','modificarCoche')->name('modificarCoche');
        Route::put('/coches/modificar','updateCoche')->name('updateCoche');
        
        //Ruta con dos parámetros, el segundo es opcional
        //Para decir que es opcional ponemos una ? en la ruta
        // y en la función hay que dar un valor por defecto, en este caso null
        Route::get('/coches/{matricula}/{dni?}',"verCoche")->name('verCoche');
        
        
    }
        
);


//Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
