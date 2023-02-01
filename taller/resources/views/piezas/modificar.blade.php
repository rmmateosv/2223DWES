@extends('plantilla')

@section('titulo',"PÁGINA PARA MODIFICAR UNA PIEZA")

@section('contenido')
    <form action="{{route("updatePieza",$pieza->id)}}" method="post">
        @csrf {{-- Para evitar ataques--}}
        @method('PUT')
        <br/>        
        <p>
            <label for="clase">Clase</label><br/>
            <select name='clase' id='clase'>
                @if ($pieza->clase=='Refrigeración')
                    <option selected='selected'>Refrigeración</option>
                @else
                    <option>Refrigeración</option>
                @endif    
                @if ($pieza->clase=='Fitro')
                    <option selected='selected'>Filtro</option>
                @else
                    <option>Filtro</option>
                @endif                            
                @if ($pieza->clase=='Motor')
                    <option selected='selected'>Motor</option>
                @else
                    <option>Motor</option>
                @endif
                @if ($pieza->clase=='Otros')
                    <option selected='selected'>Otros</option>
                @else
                    <option>Otros</option>
                @endif
            </select>          
        </p>
        <p>
            <label for="descripcion">Descripción</label><br/>
            <input type="text" name="descripcion" id="descripcion" value="{{$pieza->descripcion}}"/>
            @error('descripcion')
                <div class="alert alert-danger">
                   Es obligatio rellenar la descripción y debe contener menos de 255 caracteres          
                </div>                
            @enderror             
        </p>
        <p>
            <label for="precio">Precio</label><br/>
            <input type="number" step="0.1" name="precio" id="precio" value="{{$pieza->precio}}"/>            
            @error('precio')
                <div class="alert alert-danger">
                   Precio es obligatio          
                </div>                
            @enderror   
        </p>
        <p>
            <label for="stock">Stock</label><br/>
            <input type="number" name="stock" id="stock" value="{{$pieza->stock}}"/>            
            @error('stock')
                <div class="alert alert-danger">
                   Stock es obligatio          
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
