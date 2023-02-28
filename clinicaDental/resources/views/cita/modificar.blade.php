@extends('plantilla')

@section('titulo','Modificar Cita')

@section('contenido')
    <form action="{{route('updateCita',$cita->id)}}" method="POST">
        @csrf
        @method('PUT')
        <p>
            <label for="fecha">Fecha</label><br/>
            <input type="datetime-local" name="fecha" id="fecha"  value="{{$cita->fecha}}"/>                         
            @error('fecha')
                <div class="alert alert-danger">
                    {{$message}}
                </div>                
            @enderror
        </p>
        <p>   
            <label for="paciente">Paciente</label><br/>
            <input name="paciente" id="paciente" disabled="disabled" value="{{$cita->datosPaciente->nombre}}"/>            
        </p>
        <p>   
            <label for="dentista">Dentista</label><br/>
            <select name="dentista" id="dentista">
                @foreach ($dentistas as $d)
                    @if ($cita->dentista==$d->numCol)
                        <option selected='selected' value="{{$d->numCol}}">{{$d->nombre}}</option>
                    @else
                        <option value="{{$d->numCol}}">{{$d->nombre}}</option>
                    @endif
                @endforeach
            </select>
            @error('dentista')
                <div class="alert alert-danger">
                    {{$message}}
                </div>                
            @enderror 
        </p>
        <p>
            <label for="motivo">Motivo</label><br/>
            <input type="text" name="motivo" id="motivo" value="{{$cita->motivo}}"/> 
            @error('motivo')
                <div class="alert alert-danger">
                    {{$message}}
                </div>                
            @enderror
        </p>
        <p>
            <label for="diagnostico">Diagnóstico</label><br/>
            <input type="text" name="diagnostico" id="diagnostico" value="{{$cita->diagnostico}}"/> 
            @error('diagnostico')
                <div class="alert alert-danger">
                    {{$message}}
                </div>                
            @enderror
        </p>
       
        <input class = "btn btn-outline-primary" type="submit" name="Modificar" value="Modificar"/>
        <a class="btn btn-outline-primary" href="{{route('verCitas')}}">Cancelar</a>                    
        
    </form>
@endsection

@if (session('textoMensaje'))
    @section('mensaje',session('textoMensaje'))        
@endif
    