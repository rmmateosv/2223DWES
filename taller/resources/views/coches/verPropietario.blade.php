@extends('plantilla')

@section('titulo',"PÁGINA PARA VER EL PROPIETARIO DE UN COCHE")

@section('contenido')
    <table class="table table-striped">
        <tr>
            <td>Id</td>
            <td>Nombre</td>
            <td>Teléfono</td>
            <td>Email</td>
        </tr>
        <tr>
            <td>{{$propietario->id}}</td>
            <td>{{$propietario->nombre}}</td>
            <td>{{$propietario->telefono}}</td>
            <td>{{$propietario->email}}</td>
        </tr>
    </table>
@endsection

@section('mensaje',"")