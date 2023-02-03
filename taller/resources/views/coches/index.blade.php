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
        <td>{{$c->propietario->nombre}}</td>
        <td>
            <a href="{{route('verCoche',$c->matricula)}}" class="btn btn-info btn-sm">Detalle</a>
            <a href="{{route('modificarCoche',$c->id)}}" class="btn btn-warning btn-sm">Modificar</a>
            <form action="{{route('eliminarCoche',$c->id)}}" method="post" style="display:inline">
                @csrf {{-- Para evitar ataques--}}
                @method('DELETE')
                <a href="" class="btn btn-danger btn-sm" 
                             data-bs-toggle='modal' data-bs-target='#confirmar{{$c->id}}'>Borrar</a>
                <!-- The Mensaje Modal de confirmación de borrar coche -->
                <div class="modal" id="confirmar{{$c->id}}">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <!-- Modal Header -->
                            <div class="modal-header">
                                <h4 class="modal-title">Confirmación</h4>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                            </div>                
                            <!-- Modal body -->
                            <div class="modal-body">¿Deseas borrar el coche {{$c->id}}?</div>                
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
    {{-- {{$misCoches->links()}} --}}
@endsection

@if (session('mensaje'))
    @section('mensaje',session('mensaje'))
@endif