@extends('plantilla')

@section('titulo',"PÁGINA PARA VER LOS COCHES DE UN PROPIETARIO")

@section('contenido')
<div>
    <br/>
    <div>
        {{$propietario->nombre}}
    </div>
    <br/>
    <table class="table table-striped">
        <tr>
            <th>Id</th>
            <th>Matrícula</th>
            <th>Color</th>
        </tr>
    {{-- Mostrar los datos del array coches del propietaro que nos pasa el controlador --}}
    @foreach ($propietario->coches()->get() as $c)
    <tr>
        <td>{{$c->id}}</td>
        <td>{{$c->matricula}}</td>
        <td>{{$c->color}}</td>        
    </tr>        
    @endforeach
    </table>        
    
@endsection

@if (session('mensaje'))
    @section('mensaje',session('mensaje'))
@endif