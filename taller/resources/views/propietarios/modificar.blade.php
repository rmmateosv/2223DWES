@extends('plantilla')

@section('titulo',"PÁGINA PARA MODIFICAR UN PROPIETARIO")

@section('contenido')
    <form action="{{route("updatePropietario",$propietario->id)}}" method="post">
        @csrf {{-- Para evitar ataques--}}
        @method('PUT')
        <br/>
        
        <p>
            <label for="nombre">Nombre del Propietario</label><br/>
            <input name="nombre" id="nombre" placeholder="Nombre y apellidos" 
            value="{{$propietario->nombre}}"/> 
            @error('nombre')
                <div class="alert alert-danger">                    
                    Nombre es obligatorio y menor de 255                    
                </div>                
            @enderror            
        </p>
        <p>
            <label for="email">Email</label><br/>
            <input type="email" name="email" id="email" value="{{$propietario->email}}"/>
            @error('email')
                <div class="alert alert-danger">
                   Es obligatio rellenar el email o email incorrecto           
                </div>                
            @enderror             
        </p>
        <p>
            <label for="telefono">Teléfono</label><br/>
            <input type="tel" name="telefono" id="telefono" value="{{$propietario->telefono}}"/>
            @error('telefono')
                <div class="alert alert-danger">
                   Es obligatio rellenar el teléfono
                </div>                
            @enderror             
        </p>
        <p>            
            <input class = "btn btn-primary" type="submit" name="modificar" value="Modificar"/>             
        </p>
        
    </form>
@endsection

@if (session('mensaje'))
    @section('mensaje',session('mensaje'))
@endif
