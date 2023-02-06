@extends('plantilla')

@section('titulo',"PÁGINA PARA ")

@section('contenido')
<div>
    <br/>
    <div>
        <form action="{{route("insertarReparacion")}}" method="POST">
            @csrf
            <button type="submit"class="btn btn-success btn-sm">Nuevo</button>
            <select name="coche">
                <option value="-1">-- Selecciona Matrícula --</option>
                @foreach ($coches as $c)
                    <option value="{{$c->id}}">{{$c->matricula}}-{{$c->propietario->nombre}}</option>
                @endforeach
            </select>        
        </form>
        
    </div>
    <br/>
    <table class="table table-striped">
        <tr>
            <th>Id</th>
            <th>Matrícula</th>
            <th>Fecha</th>
            <th style="text-align:right;">Tiempo</th>
            <th style="text-align:center;">Pagado</th>
            <th>Acciones</th>
        </tr>
    {{-- Mostrar los datos del array misCoches que nos pasa el controlador --}}
    @foreach ($reparaciones as $r)
    <tr>
        <td>{{$r->id}}</td>
        <td>{{$r->coche->matricula}}</td>
        <td>{{date("d/m/Y H:i:s",strtotime($r->fecha))}}</td>
        <td align="right">{{$r->tiempo}}</td>
        <td style="text-align:center;">{{($r->pagado==0?"-":"v")}}</td>
        <td>            
            <a href="{{route('modificarReparacion',$r->id)}}" class="btn btn-warning btn-sm">Modificar</a>                      
        </td>
    </tr>        
    @endforeach
    </table>        
    
@endsection

@if (session('mensaje'))
    @section('mensaje',session('mensaje'))
@endif