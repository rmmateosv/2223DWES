@extends('plantilla')

@section('titulo','Pacientes')

@section('contenido')
    <table class="table">
        <thead>
            <tr>
                <th>Dni</th>
                <th>Nombre</th>
                <th>Teléfono</th>
                <th>Email</th>
                <th>Fecha Nacimiento</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pacientes as $p)
            <tr>
                <td>{{$p->dni}}</td>
                <td>{{$p->nombre}}</td>
                <td>{{$p->telefono}}</td>
                <td>{{$p->email}}</td>
                <td>{{$p->fechaNac}}</td>
                <td>
                    <a class="btn btn-outline-warning" href="/paciente/modificar">Modificar</a>
                </td>
            </tr>  
            @endforeach
                      
        </tbody>
    </table>
    
@endsection

@if (session('textoMensaje'))
    @section('mensaje',session('textoMensaje'))        
@endif
    