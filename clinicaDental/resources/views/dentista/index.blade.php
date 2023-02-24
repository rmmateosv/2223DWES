@extends('plantilla')

@section('titulo','Dentistas')

@section('contenido')
    <a class="btn btn-outline-primary" href="{{route('crearDentista')}}">+</a>
    <table class="table">
        <thead>
            <tr>
                <th>Colegiado</th>
                <th>Nombre</th>
                <th>Especialidad</th>      
                <th>Acciones</th>           
            </tr>
        </thead>
        <tbody>
            @foreach ($dentistas as $d)
            <tr>
                <td>{{$d->numCol}}</td>
                <td>{{$d->nombre}}</td>
                <td>{{$d->especialidad}}</td>                         
                <td>
                    <form action="{{route('borrarDentista',$d->numCol)}}" method="post">
                    <a class="btn btn-outline-primary" href="{{route('modificarDentista',$d->numCol)}}">Modificar</a>                    
                        @csrf
                        @method('DELETE')
                        <a href="" class="btn btn-outline-danger" 
                                data-bs-toggle='modal' data-bs-target='#confirmar{{$d->numCol}}'>Borrar</a>
                        <!-- The Mensaje Modal de confirmación de borrar coche -->
                        <div class="modal" id="confirmar{{$d->numCol}}">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <!-- Modal Header -->
                                    <div class="modal-header">
                                        <h4 class="modal-title">Confirmación</h4>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                    </div>                
                                    <!-- Modal body -->
                                    <div class="modal-body">¿Deseas borrar el dentista {{$d->numCol}}?</div>                
                                    <!-- Modal footer -->
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-outline-danger"
                                            data-bs-dismiss="modal" name="borrar">Borrar</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </td>
                
            </tr>  
            @endforeach
                      
        </tbody>
    </table>
    
@endsection

@if (session('textoMensaje'))
    @section('mensaje',session('textoMensaje'))        
@endif
    