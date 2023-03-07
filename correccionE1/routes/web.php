<?php

use App\Http\Controllers\VentaController;
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
Route::controller(VentaController::class)->group(
    function(){
        Route::get('ventas/index','verVentas')->name('verVentas');
        Route::get('ventas/crear','crearVenta')->name('crearVenta');
        Route::get('ventas/modificar/{id}','modificarVenta')->name('modificarVenta');
        Route::post('ventas/crear','insertarVenta')->name('insertarVenta');
    });
