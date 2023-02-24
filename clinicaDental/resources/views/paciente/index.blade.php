@extends('plantilla')

@section('titulo','Pacientes')

@section('contenido')
    <a class="btn btn-outline-primary" href="{{route('crearPaciente')}}">+</a>
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
                <td>{{date('d/m/Y',strtotime($p->fechaNac))}}</td>                
                <td>
                    <a class="btn btn-outline-primary" href="/paciente/modificar/{{$p->dni}}">Modificar</a>
                    <form action="{{route('borrarPaciente',$p->dni)}}" method="post">
                        @csrf
                        @method('DELETE')
                        <a href="" class="btn btn-outline-danger" 
                                data-bs-toggle='modal' data-bs-target='#confirmar{{$p->dni}}'>Borrar</a>
                        <!-- The Mensaje Modal de confirmación de borrar coche -->
                        <div class="modal" id="confirmar{{$p->dni}}">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <!-- Modal Header -->
                                    <div class="modal-header">
                                        <h4 class="modal-title">Confirmación</h4>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                    </div>                
                                    <!-- Modal body -->
                                    <div class="modal-body">¿Deseas borrar el paciente {{$p->dni}}?</div>                
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
    