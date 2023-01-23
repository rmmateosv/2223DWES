@extends('plantilla')

@section('titulo',"PÁGINA PARA MODIFICAR UN COCHE")

@section('contenido')
    <form action="{{route("updateCoche")}}" method="post">
        @csrf {{-- Para evitar ataques--}}
        @method('PUT')
        <br/>
        <p>
            <label for="id">Id</label><br/>
            <input name="id" id="id" disabled='disabled' value={{$coche->id}}/>  
            '''CAMBIAR Y PONER EN ROUTE'                    
        </p>
        <p>
            <label for="propietario">Selecciona Propietario</label><br/>
            <select name="propietario" id="propietario">
                @foreach ($propietarios as $p)
                @if ($coche->propietario_id==$p->id)
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
            value="{{$coche->matricula}}"/> 
            @error('matricula')
                <div class="alert alert-danger">
                    Matrícula obligatoria y longitud entre 7 y 10
                </div>                
            @enderror            
        </p>
        <p>
            <label for="color">Color</label><br/>
            <input name="color" id="color" value="{{$coche->color}}"/>
            @error('color')
                <div class="alert alert-danger">
                   Rellena color
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
