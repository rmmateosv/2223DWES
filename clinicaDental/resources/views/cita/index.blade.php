@extends('plantilla')

@section('titulo','Citas')

@section('contenido')
    <a class="btn btn-outline-primary" href="{{route('crearCita')}}">+</a>
    <table class="table">
        <thead>
            <tr>
                <th>Id</th>
                <th>Fecha</th>
                <th>Paciente</th>
                <th>Dentista</th>   
                <th>Motivo</th>
                <th>Diagnóstico</th>   
                <th>Acciones</th>           
            </tr>
        </thead>
        <tbody>
            @foreach ($citas as $c)
            <tr>
                <td>{{$c->id}}</td>
                <td>{{date('d/m/Y H:i',strtotime($c->fecha))}}</td>
                <td>{{$c->paciente}}-{{$c->datosPaciente->nombre}}</td>    
                <td>{{$c->datosDentista->nombre}}</td>
                <td>{{$c->motivo}}</td>
                <td>{{$c->diagnostico}}</td>                        
                <td>
                    <a class="btn btn-outline-primary" href="{{route('modificarCita',$c->id)}}">Modificar</a>                    
                </td>
                
            </tr>  
            @endforeach
                      
        </tbody>
    </table>
    
@endsection

@if (session('textoMensaje'))
    @section('mensaje',session('textoMensaje'))        
@endif
    