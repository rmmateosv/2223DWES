@extends('plantilla')

@section('titulo',"PÁGINA PARA CREAR UNA PIEZA")

@section('contenido')
    <form action="{{route("insertarPieza")}}" method="post">
        @csrf {{-- Para evitar ataques--}}
        <br/>        
        <p>
            <label for="clase">Clase</label><br/>
            <select name='clase' id='clase'>
                @if (old('clase')=='Refrigeración')
                    <option selected='selected'>Refrigeración</option>
                @else
                    <option>Refrigeración</option>
                @endif    
                @if (old('clase')=='Fitro')
                    <option selected='selected'>Filtro</option>
                @else
                    <option>Filtro</option>
                @endif                            
                @if (old('clase')=='Motor')
                    <option selected='selected'>Motor</option>
                @else
                    <option>Motor</option>
                @endif
                @if (old('clase')=='Otros')
                    <option selected='selected'>Otros</option>
                @else
                    <option>Otros</option>
                @endif
            </select>          
        </p>
        <p>
            <label for="descripcion">Descripción</label><br/>
            <input type="text" name="descripcion" id="descripcion" value="{{old('descripcion')}}"/>
            @error('descripcion')
                <div class="alert alert-danger">
                   Es obligatio rellenar la descripción y debe contener menos de 255 caracteres          
                </div>                
            @enderror             
        </p>
        <p>
            <label for="precio">Precio</label><br/>
            <input type="number" step="0.1" name="precio" id="precio" value="{{old('precio')}}"/>            
            @error('precio')
                <div class="alert alert-danger">
                   Precio es obligatio          
                </div>                
            @enderror   
        </p>
        <p>
            <label for="stock">Stock</label><br/>
            <input type="number" name="stock" id="stock" value="{{old('stock')}}"/>            
            @error('stock')
                <div class="alert alert-danger">
                   Stock es obligatio          
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
