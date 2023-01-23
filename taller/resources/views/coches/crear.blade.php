@extends('plantilla')

@section('titulo',"PÁGINA PARA CREAR UN COCHE")

@section('contenido')
    <form action="{{route("insertarCoche")}}" method="post">
        @csrf {{-- Para evitar ataques--}}
        <br/>
        <p>
            <label for="propietario">Selecciona Propietario</label><br/>
            <select name="propietario" id="propietario">
                @foreach ($propietarios as $p)
                @if (old('propietario')==$p->id)
                    <option value="{{$p->id}}" selected='selected'>{{$p->nombre}}</option>
                @else
                    <option value="{{$p->id}}">{{$p->nombre}}</option>
                @endif
                    
                @endforeach
            </select>
            @error('propietario')
                <div class="alert alert-danger">
                    Selecciona Propietario
                </div>                
            @enderror
        </p>
        <p>
            <label for="matricula">Matricúla</label><br/>
            <input name="matricula" id="matricula" placeholder="1111AAA" 
            value="{{old('matricula')}}"/> 
            @error('matricula')
                <div class="alert alert-danger">
                    Matrícula obligatoria y longitud entre 7 y 10
                </div>                
            @enderror            
        </p>
        <p>
            <label for="color">Color</label><br/>
            <input name="color" id="color" value="{{old('color')}}"/>
            @error('color')
                <div class="alert alert-danger">
                   Rellena color
                </div>                
            @enderror             
        </p>
        <p>            
            <input class = "btn btn-primary" type="submit" name="crear" value="Crear"/>             
        </p>
        
    </form>
@endsection

@if (session('mensaje'))
    @section('mensaje',session('mensaje'))
@endif
