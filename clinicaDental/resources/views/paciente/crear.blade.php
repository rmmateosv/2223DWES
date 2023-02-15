@extends('plantilla')

@section('titulo','Pacientes')

@section('contenido')
    <form action="{{route('insertarPaciente')}}" method="POST">
        @csrf
        <p>
            <label for="dni">DNI</label><br/>
            <input name="dni" id="dni" placeholder="11111111A" value="{{old('dni')}}"/> 
            @error('dni')
                <div class="alert alert-danger">
                    DNI debe ser de 8 dígitos y una letra
                </div>                
            @enderror
        </p>
        <p>   
            <label for="nombre">Nombre</label><br/>
            <input name="nombre" id="nombre" value="{{old('nombre')}}"/> 
            @error('nombre')
                <div class="alert alert-danger">
                    Obligatorio
                </div>                
            @enderror 
        </p>
        <p> 
            <label for="telefono">Teléfono</label><br/>
            <input type="tel" name="telefono" id="telefono"  value="{{old('telefono')}}"/> 
            @error('telefono')
                <div class="alert alert-danger">
                    Obligatorio
                </div>                
            @enderror  
        </p>
        <p> 
            <label for="email">Email</label><br/>
            <input type="email" name="email" id="email"  value="{{old('email')}}"/> 
            @error('telefono')
                <div class="alert alert-danger">
                    Formato incorrecto
                </div>                
            @enderror 
        </p>
        <p> 
            <label for="fechaN">Fecha Nacimiento</label><br/>
            <input type="date" name="fechaN" id="fechaN"  value="{{old('fechaN')}}"/> 
            @error('fechaN')
                <div class="alert alert-danger">
                    Obligatorio
                </div>                
            @enderror                     
        </p>
        <input class = "btn btn-outline-primary" type="submit" name="crear" value="Crear"/>
        <input class = "btn btn-outline-danger" type="reset" value="Limpiar"/>
    </form>
@endsection

@if (session('textoMensaje'))
    @section('mensaje',session('textoMensaje'))        
@endif
    