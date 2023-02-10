<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{    
    function registro(){
        return view('login/registro');
    }

    function registrar(Request $request){
        $request->validate([
            'email'=>'required|email:rfc,dns|unique:App\Models\User,email',
            'pass' => 'required|min:3',
            'nombre' => 'required'
        ]);
        //Crear usuario
        $us = new User();
        $us->email=$request->email;
        //Guardar password encriptada
        $us->password=Hash::make($request->pass);
        $us->name=$request->nombre;
        //Guardar en bd
        if($us->save()){
            Auth::login($us);
            return redirect(route('inicio'));
        }
        else{
            return back()->with('mensaje','Se ha producido error al registar el usuario');
        }


    }
    function login(){
        return view('login/login');
    }
    function logear(Request $request){
        //Validaciones
        $request->validate([
            'email'=>'required|email:rfc,dns',
            'pass' => 'required|min:3'
        ]);

        $credenciales=["email"=>$request->email,
        "password"=>$request->pass];
        //Autenticar
        if(Auth::attempt($credenciales)){
            $request->session()->regenerate();
            return redirect(route('inicio'));
        }
        else{
            return back()->with('mensaje','Error, datos incorrectos');
        }
    }
    function salir(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect(route('login'));
    }
}
