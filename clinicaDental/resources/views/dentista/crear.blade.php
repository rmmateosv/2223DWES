@extends('plantilla')

@section('titulo','Dentista')

@section('contenido')
    <form action="{{route('insertarDentista')}}" method="POST">
        @csrf
        <p>
            <label for="numCol">Nº Colegiado</label><br/>
            <input type="number" name="numCol" id="numCol" value="{{old('numCol')}}"/> 
            @error('numCol')
                <div class="alert alert-danger">
                    {{$message}}
                </div>                
            @enderror
        </p>
        <p>   
            <label for="nombre">Nombre</label><br/>
            <input name="nombre" id="nombre" value="{{old('nombre')}}"/> 
            @error('nombre')
                <div class="alert alert-danger">
                    {{$message}}
                </div>                
            @enderror 
        </p>
        <p> 
            <label for="especialidad">Especialidad</label><br/>
            <select name="especialidad" id="especialidad">
                @if (old('especialidad')=='OdontoPediatría')
                    <option selected='selected'>OdontoPediatría</option>
                @else
                    <option>OdontoPediatría</option>
                @endif+

                @if (old('especialidad')=='Periodoncia')
                    <option selected='selected'>Periodoncia</option>
                @else
                    <option>Periodoncia</option>
                @endif
                @if (old('especialidad')=='Endodoncia')
                    <option selected='selected'>Endodoncia</option>
                @else
                    <option>Endodoncia</option>
                @endif
                @if (old('especialidad')=='Rehabilitación Oral')
                    <option selected='selected'>Rehabilitación Oral</option>
                @else
                    <option>Rehabilitación Oral</option>
                @endif          
            </select> 
            @error('especialidad')
                <div class="alert alert-danger">
                    {{$message}}
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
    