<?php

use App\Http\Controllers\NotasController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::controller(NotasController::class)->group(
    function(){
        Route::get('/notas', "verNotas")->name('verNotas');

        Route::get('/notas/crear', "crearNota")->name('crearNota');
        Route::post('/notas/crear', "insertarNota")->name('insertarNota');
        
        Route::get('/notas/modificar/{id}', "modificarNota")->name('modificarNota');
        Route::put('/notas/modificar/{id}', "updateNota")->name('updateNota');

        Route::get('/notas/borrar/{id}', "borrarNota")->name('borrarNota');

    }
);
