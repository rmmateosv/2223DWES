<?php

use App\Http\Controllers\CitaController;
use App\Http\Controllers\DentistaController;
use App\Http\Controllers\PacienteController;
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
    return view('welcome');
    //return redirect(Route('inicio'));
});

Route::controller(PacienteController::class)->group(
    function(){
        Route::get('/paciente/index','verPacientes')->name('verPacientes');

        Route::get('/paciente/crear','crearPaciente')->name('crearPaciente');
        Route::post('/paciente/crear','insertarPaciente')->name('insertarPaciente');

        Route::get('/paciente/modificar/{dni}','modificarPaciente')->name('modificarPaciente');
        Route::put('/paciente/modificar/{dni}','updatePaciente')->name('updatePaciente');

        Route::delete('/paciente/borrar/{dni}','borrarPaciente')->name('borrarPaciente');
    }
);
Route::controller(CitaController::class)->group(
    function(){
        Route::get('/cita/index','verCitas')->name('verCitas');

        Route::get('/cita/crear','crearCita')->name('crearCita');
        Route::post('/cita/crear','insertarCita')->name('insertarCita');

        Route::get('/cita/modificar/{id}','modificarCita')->name('modificarCita');
        Route::put('/cita/modificar/{id}','updateCita')->name('updateCita');

        Route::delete('/cita/borrar/{id}','borrarCita')->name('borrarCita');
    }
);
Route::controller(DentistaController::class)->group(
    function(){
        Route::get('/dentista/index','verDentistas')->name('verDentistas');

        Route::get('/dentista/crear','crearDentista')->name('crearDentista');
        Route::post('/dentista/crear','insertarDentista')->name('insertarDentista');

        Route::get('/dentista/modificar/{numCol}','modificarDentista')->name('modificarDentista');
        Route::put('/dentista/modificar/{numCol}','updateDentista')->name('updateDentista');

        Route::delete('/dentista/borrar/{numCol}','borrarDentista')->name('borrarDentista');
    }
);
