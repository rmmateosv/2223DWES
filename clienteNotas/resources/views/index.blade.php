<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cliente API REST NOTAS</title>
</head>
<body>
    <a href="{{route('crearNota')}}">Crear</a>
    <table class="table">
        <thead>
            <tr>
                <th>Id</th>
                <th>Nombre</th>
                <th>Aignatura</th>
                <th>Nota</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($notas as $n)
                <tr>
                    <td>{{$n["id"]}}</td>
                    <td>{{$n["nombre"]}}</td>
                    <td>{{$n["asig"]}}</td>
                    <td>{{$n["nota"]}}</td>
                    <td><a href="{{route('modificarNota',$n["id"])}}">Modificar</a>
                        <a href="{{route('borrarNota',$n["id"])}}">Borrar</a>
                    </td>
                </tr>                
            @endforeach
        </tbody>
    </table>
</body>
</html>