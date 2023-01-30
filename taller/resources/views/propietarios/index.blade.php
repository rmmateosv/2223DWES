@extends('plantilla')

@section('titulo',"PÁGINA PARA VER LOS PROPIETARIOS")

@section('contenido')
<div>
    <br/>
    <div>
        <a href="{{route("crearPropietario")}}" class="btn btn-success btn-sm">Nuevo</a>
    </div>
    <br/>
    <table class="table table-striped">
        <tr>
            <th>Id</th>
            <th>Nombre</th>
            <th>Email</th>
            <th>Teléfono</th>
        </tr>
    {{-- Mostrar los datos del array misCoches que nos pasa el controlador --}}
    @foreach ($propietarios as $p)
    <tr>
        <td>{{$p->id}}</td>
        <td>{{$p->nombre}}</td>
        <td>{{$p->email}}</td>
        <td>{{$p->telefono}}</td>
        <td>
            <a href="{{route('verCoche',$p->id)}}" class="btn btn-info btn-sm">Coches</a>
            <a href="{{route('modificarPropietario',$p->id)}}" class="btn btn-warning btn-sm">Modificar</a>
            <form action="{{route('borrarPropietario',$p->id)}}" method="post" style="display:inline">
                @csrf {{-- Para evitar ataques--}}
                @method('DELETE')
                <a href="" class="btn btn-danger btn-sm" 
                             data-bs-toggle='modal' data-bs-target='#confirmar{{$p->id}}'>Borrar</a>
                <!-- The Mensaje Modal de confirmación de borrar coche -->
                <div class="modal" id="confirmar{{$p->id}}">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <!-- Modal Header -->
                            <div class="modal-header">
                                <h4 class="modal-title">Confirmación</h4>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                            </div>                
                            <!-- Modal body -->
                            <div class="modal-body">¿Deseas borrar el propietario {{$p->id}}?</div>                
                            <!-- Modal footer -->
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary"
                                    data-bs-dismiss="modal" name="borrar">Borrar</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>            
        </td>
    </tr>        
    @endforeach
    </table>        
    
@endsection

@if (session('mensaje'))
    @section('mensaje',session('mensaje'))
@endif