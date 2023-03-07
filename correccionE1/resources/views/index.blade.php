<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ventas</title>
</head>
<body>
    <h1>VENTAS</h1>
    <a href='{{route('crearVenta')}}'>Crear Venta</a>
    <table class="table">
        <thead>
            <tr>
                <th>Id</th>
                <th>Fecha</th>
                <th>Producto</th>
                <th>Cantidad</th>
                <th>Precio Unitario</th>
                <th>Total</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($ventas as $v)
            <tr>
                <td>{{$v->id}}</td>
                <td>{{date('d/m/Y',strtotime($v->fecha))}}</td>
                <td>{{$v->datosProducto->nombre}}</td>
                <td>{{$v->cantidad}}</td>
                <td>{{$v->precioUnitario}}</td>
                <td>{{$v->cantidad*$v->precioUnitario}}</td>
                <td><a href='{{route('modificarVenta',$v->id)}}'>Modificar</a></td>
            </tr>
            @endforeach
            
            
        </tbody>
    </table>
</body>
</html>