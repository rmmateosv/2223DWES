<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ventas</title>
</head>
<body>
    <h1>CREAR VENTA</h1>

    <form action="{{route('insertarVenta')}}", method="POST">
        @csrf
        <label>fecha</label>
        <input type="date" name="fecha" value="{{date('Y-m-d')}}"/>

        <label>Producto</label>
        <select name="producto">
            @foreach ($productos as $p)
                <option value="{{$p->id}}">{{$p->nombre}}</option>                
            @endforeach
        </select>

        <label>Cantidad</label>
        <input type="number" name="cantidad"/>
        
        <input type="submit" value="Crear">
    </form>

    <h1>@if (isset($mensaje))
        {{$mensaje}}
    @endif</h1>
</body>
</html>