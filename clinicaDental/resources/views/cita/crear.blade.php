@extends('plantilla')

@section('titulo','Crear Cita')

@section('contenido')
    <form action="{{route('insertarCita')}}" method="POST">
        @csrf
        <p>
            <label for="fecha">Fecha</label><br/>
            @if (empty(old('fecha')))
                <input type="datetime-local" name="fecha" id="fecha"  value="{{now()}}"/> 
            @else
                <input type="datetime-local" name="fecha" id="fecha"  value="{{old('fecha')}}"/> 
            @endif
            
            @error('fecha')
                <div class="alert alert-danger">
                    {{$message}}
                </div>                
            @enderror
        </p>
        <p>   
            <label for="paciente">Paciente</label><br/>
            <select name="paciente" id="paciente">
                @foreach ($pacientes as $p)
                    @if (old('paciente')==$p->dni)
                        <option selected='selected' value="{{$p->dni}}">{{$p->dni}}-{{$p->nombre}}</option>
                    @else
                        <option value="{{$p->dni}}">{{$p->dni}}-{{$p->nombre}}</option>
                    @endif
                @endforeach
            </select>
            @error('paciente')
                <div class="alert alert-danger">
                    {{$message}}
                </div>                
            @enderror 
        </p>
        <p>   
            <label for="dentista">Dentista</label><br/>
            <select name="dentista" id="dentista">
                @foreach ($dentistas as $d)
                    @if (old('dentista')==$d->numCol)
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
            <input type="text" name="motivo" id="motivo" value="{{old('motivo')}}"/> 
            @error('motivo')
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
    