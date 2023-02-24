@extends('plantilla')

@section('titulo','Pacientes')

@section('contenido')
    <form action="{{route('updatePaciente',$paciente->dni)}}" method="POST">
        @csrf
        @method('PUT')
        <p>
            <label for="dni">DNI</label><br/>
            <input name="dni" id="dni" placeholder="11111111A" value="{{$paciente->dni}}"/> 
            @error('dni')
                <div class="alert alert-danger">
                    {{$message}}
                </div>                
            @enderror
        </p>
        <p>   
            <label for="nombre">Nombre</label><br/>
            <input name="nombre" id="nombre" value="{{$paciente->nombre}}"/> 
            @error('nombre')
                <div class="alert alert-danger">
                    {{$message}}
                </div>                
            @enderror 
        </p>
        <p> 
            <label for="telefono">Teléfono</label><br/>
            <input type="tel" name="telefono" id="telefono"  value="{{$paciente->telefono}}"/> 
            @error('telefono')
                <div class="alert alert-danger">
                    {{$message}}
                </div>                
            @enderror  
        </p>
        <p> 
            <label for="email">Email</label><br/>
            <input type="email" name="email" id="email"  value="{{$paciente->email}}"/> 
            @error('telefono')
                <div class="alert alert-danger">
                    {{$message}}
                </div>                
            @enderror 
        </p>
        <p> 
            <label for="fechaN">Fecha Nacimiento</label><br/>
            <input type="date" name="fechaN" id="fechaN"  value="{{$paciente->fechaNac}}"/> 
            @error('fechaN')
                <div class="alert alert-danger">
                    {{$message}}
                </div>                
            @enderror                     
        </p>
        <input class = "btn btn-outline-primary" type="submit" name="modificar" value="Modficar"/>
        <a class = "btn btn-outline-danger" type="reset" href="{{route('verPacientes')}}"/>Cancelar</a>
    </form>
@endsection

@if (session('textoMensaje'))
    @section('mensaje',session('textoMensaje'))        
@endif
    