<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cliente API REST NOTAS</title>
</head>
<body>   
    <form action="{{route('updateNota',$nota['id'])}}" method="post">
        @method('PUT')
        @csrf
        <p>
            <label>Nombre</label><br/>
            <input type="text" name="nombre" value="{{$nota['nombre']}}" disabled="disabled"/>           
        </p>
        
        <p>
            <label>Aignatura</label><br/>
            <input type="text" name="asig" value="{{$nota['asig']}}"  disabled="disabled"/>            
        </p>
        <p>
            <label>Nota</label><br/>
            <input type="number" name="nota" value="{{$nota['nota']}}"/>
            @error('nota')
                **Obligatorio
            @enderror
        </p>
        <p>
            
            <input type="submit" name="modificar" value="Moficar Nota"/>
        </p>
    </form>
</body>
</html>