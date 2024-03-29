@extends('plantilla')

@section('titulo',"PÁGINA PARA MODIFICAR REPARACIÓN:")

@section('contenido')
<div>
    <br/>
    <div>
        <p>
            <span class='text-success'>Reparación:</span><span>{{$r->id}}</span>
        </p>
        <p>
            <span class='text-success'>Fecha:</span> <span>{{date('d/m/Y H:i:s',strtotime($r->fecha))}}</span>
        </p>        
        <p>
            <span class='text-success'>Matrícula:</span> <span>{{$r->coche->matricula}}</span>
            <span class='text-success'> Propietario:</span> <span>{{$r->coche->propietario->nombre}}</span>
        </p>              
    </div>
    <div>
        <form action="{{route("insertaPiezaReparacion",$r->id)}}" method="POST">
            @csrf
            <button type="submit"class="btn btn-success btn-sm">Nueva Pieza</button>
            <select name="pieza">
                <option value="-1">-- Selecciona Pieza --</option>
                @foreach ($piezas as $p)
                    <option value="{{$p->id}}">{{$p->clase}}-{{$p->descripcion}}</option>
                @endforeach
            </select>        
        </form>
        
    </div>
    <br/>
    <form action="{{route('updatePiezaReparacion',$r->id)}}" method="post">
        @csrf
        @method('PUT')
        <table class="table table-striped">
            <tr>
                <th>Pieza</th>
                <th style="text-align:right;">Cantidad</th>
                <th style="text-align:right;">Precio Unidad</th>
                <th style="text-align:right;">Total</th>
                <th>Acciones</th>
            </tr>
        {{-- Mostrar las pieza de la reparación --}}
        @foreach ($r->piezasReparacion() as $pr)
        <tr>
            <td>{{$pr->pieza->descripcion}}</td>
            <td align="right">{{$pr->cantidad}}</td>
            <td align="right">{{number_format($pr->importe,2,',')}}</td>
            <td align="right">{{number_format($pr->importe*$pr->cantidad,2,',')}}</td>
            <td>            
                <button type="submit" name="suma" value="{{$pr->pieza_id}}" class="btn btn-success btn-sm">+</button>                      
                <button type="submit" name="resta" value="{{$pr->pieza_id}}" class="btn btn-danger btn-sm">-</button>                      
            </td>
        </tr>        
        @endforeach
        </table>        
    </form>
@endsection

@if (session('mensaje'))
    @section('mensaje',session('mensaje'))
@endif