@extends('plantilla')

@section('titulo','Dentista')

@section('contenido')
    <form action="{{route('updateDentista',$dentista->numCol)}}" method="POST">
        @csrf
        @method('PUT')
        <p>
            <label for="numCol">Nº Colegiado</label><br/>
            <input type="number" name="numCol" id="numCol" value="{{$dentista->numCol}}"/> 
            @error('numCol')
                <div class="alert alert-danger">
                    {{$message}}
                </div>                
            @enderror
        </p>
        <p>   
            <label for="nombre">Nombre</label><br/>
            <input name="nombre" id="nombre" value="{{$dentista->nombre}}"/> 
            @error('nombre')
                <div class="alert alert-danger">
                    {{$message}}
                </div>                
            @enderror 
        </p>
        <p> 
            <label for="especialidad">Especialidad</label><br/>
            <select name="especialidad" id="especialidad">
                @if ($dentista->especialidad=='OdontoPediatría')
                    <option selected='selected'>OdontoPediatría</option>
                @else
                    <option>OdontoPediatría</option>
                @endif+

                @if ($dentista->especialidad=='Periodoncia')
                    <option selected='selected'>Periodoncia</option>
                @else
                    <option>Periodoncia</option>
                @endif
                @if ($dentista->especialidad=='Endodoncia')
                    <option selected='selected'>Endodoncia</option>
                @else
                    <option>Endodoncia</option>
                @endif
                @if ($dentista->especialidad=='Rehabilitación Oral')
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
       
        <input class = "btn btn-outline-primary" type="submit" name="Modficar" value="Modificar"/>
        <a class = "btn btn-outline-danger" type="reset" href="{{route('verDentistas')}}">Cancelar</a>
    </form>
@endsection

@if (session('textoMensaje'))
    @section('mensaje',session('textoMensaje'))        
@endif
    