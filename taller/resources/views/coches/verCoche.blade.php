@extends('plantilla')

@section('titulo',"PÁGINA PARA VER EL COCHE $matricula")

@section('contenido')
<table class="table table-striped">
    <tr>
        <th>Id</th>
        <th>Matrícula</th>
        <th>Color</th>
        <th>Propietario</th>
    </tr>
    <tr>
        <td>{{$miCoche->id}}</td>
        <td>{{$miCoche->matricula}}</td>
        <td>{{$miCoche->color}}</td>
        <td>{{$miCoche->propietario_id}}</td>
    </tr>  
</table>
<a href="{{route('verCoche',[$miCoche->matricula,$miCoche->propietario_id])}}" 
    class="btn btn-info btn-sm">Ver Propietario</a>
@endsection

@section('mensaje',"")