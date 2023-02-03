<?php

use App\Http\Controllers\CocheControler;
use App\Http\Controllers\PiezaController;
use App\Http\Controllers\PropietarioController;
use App\Http\Controllers\ReparacionController;
use App\Models\Pieza;
use App\Models\Propietario;
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
    //return "<h1>BIENVENIDO</h1>";
    //Redirecciona a ruta verCoches
    return redirect()->route('verCoches');
});

Route::controller(CocheControler::class)->group(
    function(){
        Route::get('/coches', "verCoches")->name('verCoches');
        Route::get('/coches/crear', "crearCoche")-> name('crearCoche');
        //Esta ruta recoge los datos del formulario de crear coche y los
        //envia por post a la función insertarCoche del controlador
        Route::post('/coches/crear', "insertarCoche")->name('insertarCoche');

        Route::get('/coches/modificar/{id}','modificarCoche')->name('modificarCoche');
        Route::put('/coches/modificar/{id}','updateCoche')->name('updateCoche');

        Route::delete('/coches/borrar/{id}','eliminarCoche')->name('eliminarCoche');
        
        //Ruta con dos parámetros, el segundo es opcional
        //Para decir que es opcional ponemos una ? en la ruta
        // y en la función hay que dar un valor por defecto, en este caso null
        Route::get('/coches/{matricula}/{dni?}',"verCoche")->name('verCoche');
        
        
    }
        
);
Route::controller(PropietarioController::class)->group(
    function(){
        //General para ver todos los propietaros
        Route::get("/propietarios","verPropietarios")->name('verPropietarios');
        
        //Carga formulario para crear propietario
        Route::get("/propietarios/crear","crearPropietario")->name('crearPropietario');
        //Desde el formulario se crea en la bd por post
        Route::post("/propietarios/crear","insertarPropietario")->name('insertarPropietario');
        
        //Carga formulario para modificar propietario
        Route::get("/propietarios/modificar/{id}","modificarPropietario")->name('modificarPropietario');
        //Desde el formulario se mdodificar en la bd por put
        Route::put("/propietarios/modificar/{id}","updatePropietario")->name('updatePropietario');
        
        //Desde el formulario se borra en la bd por delete
        Route::delete("/propietarios/borrar/{id}","borrarPropietario")->name('borrarPropietario');

        //Mostrar los coches del propietario
        Route::get("/propietarios/verCoches/{id}","verCochesPropietario")->name('verCochesPropietario');
    }
);

Route::controller(PiezaController::class)->group(
    function(){
        //Ver piezas
        Route::get('/piezas','verPiezas')->name('verPiezas');

        //Crear piezas
        Route::get('/piezas/crear','crearPieza')->name('crearPieza');
        Route::post('/piezas/insertar','insertarPieza')->name('insertarPieza');

        //Modificar piezas
        Route::get('/piezas/modificar/{id}','modificarPieza')->name('modificarPieza');
        Route::put('/piezas/update/{id}','updatePieza')->name('updatePieza');

        //Borrar piezas
        Route::delete('/piezas/borrar/{id}','borrarPieza')->name('borrarPieza');
    }
);
Route::controller(ReparacionController::class)->group(
    function(){
        //Ver reparaciones
        Route::get('/reparaciones','verReparaciones')->name('verReparaciones');
        //Crear reparación
        //Solamente tenemos post porque no vamos a hacer un formulario para crear
        Route::post('/reparaciones/insertar','insertarReparacion')->name('insertarReparacion');
        //Modficar reparación
        //Solamente tenemos get porque modificar una reparación lo que va a hacer
        //es gestionar pieza_reparacion
        Route::get('/reparaciones/modificar/{id}','modificarReparacion')->name('modificarReparacion');
    }
);


//Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
