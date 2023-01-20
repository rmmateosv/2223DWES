@extends('plantilla')

@section('titulo',"PÁGINA PARA VER LOS COCHES")

@section('contenido')
<div>
    <br/>
    <div>
        <a href="{{route("crearCoche")}}" class="btn btn-success btn-sm">Nuevo</a>
    </div>
    <br/>
    <table class="table table-striped">
        <tr>
            <th>Id</th>
            <th>Matrícula</th>
            <th>Color</th>
            <th>Propietario</th>
            <th>Acciones</th>
        </tr>
    {{-- Mostrar los datos del array misCoches que nos pasa el controlador --}}
    @foreach ($misCoches as $c)
    <tr>
        <td>{{$c->id}}</td>
        <td>{{$c->matricula}}</td>
        <td>{{$c->color}}</td>
        <td>{{$c->propietario_id}}</td>
        <td>
            <a href="{{route('verCoche',$c->matricula)}}" class="btn btn-info btn-sm">Detalle</a>
            <a href="" class="btn btn-warning btn-sm">Modificar</a>
            <a href="" class="btn btn-danger btn-sm">Borrar</a>
        </td>
    </tr>        
    @endforeach
    </table>
</div>
@endsection

@section('mensaje',"")