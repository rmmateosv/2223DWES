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
                    <option value="{{$p->id}}">{{$p->nombre}}</option>
                @endforeach
            </select>
        </p>
        <p>
            <label for="matricula">Matricúla</label><br/>
            <input name="matricula" id="matricula" placeholder="1111AAA"/>             
        </p>
        <p>
            <label for="color">Color</label><br/>
            <input name="color" id="color"/>             
        </p>
        <p>            
            <input class = "btn btn-primary" type="submit" name="crear" value="Crear"/>             
        </p>
        
    </form>
@endsection

@if (session('mensaje'))
    @section('mensaje',session('mensaje'))
@endif
