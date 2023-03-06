<?php

namespace App\Http\Controllers;

use App\Models\Nota;
use Illuminate\Http\Request;

class NotaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //Recupear todas las notas
        $notas = Nota::all();
        return $notas;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //Crear nota
        $nota = new Nota();
        //$nota->nombre = $request->nombre;
        $nota->asig = $request->asig;
        $nota->nota = $request->nota;
        //Guardar en la bd $options = 0)
        if($nota->save()){
            return $nota;
        }
        else{
            //Devover error
            return response()->json('Error al crear la nota',500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Nota $nota)
    {
        //Recuperar una nota si creamos el controlador de la api después del modelo
        //$nota = Nota::find($id); 
        return $nota;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Nota $nota)
    {
        //Modificar nota. Hay que pasar nombre y asignatura
        // Modificar la nota
        $nota->nota = $request->nota;
        if($nota->save()){
            return response()->json('Nota modificada',200);
        }
        else{
            return response()->json('Error al modificar',500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Nota $nota)
    {
        if($nota->delete()){
            return response()->json('Nota borrada',200);
        }
        else{
            return response()->json('Error al borrar',500);
        }
    }

    public function buscarPorAsig($asig){
        //Buscar todas las notas de una asignatura
        $notas = Nota::where('asig',$asig)->orderBy('nombre')->get();
        return $notas;
    }
}
