<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    function registro(){
        return view('login/registro');
    }
    
    function registrar(Request $request){
        
    }
    function login(){
        return view('login/login');
    }
    function logear(Request $request){
        
    }
    function salir(){
        
    }
}
