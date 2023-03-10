<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cliente API REST NOTAS</title>
</head>
<body>   
    <form action="{{route('insertarNota')}}" method="post">
        @csrf
        <p>
            <label>Nombre</label><br/>
            <input type="text" name="nombre"/>
            @error('nombre')
                **Obligatorio
            @enderror
        </p>
        
        <p>
            <label>Aignatura</label><br/>
            <input type="text" name="asig"/>
            @error('asig')
                **Obligatorio
            @enderror
        </p>
        <p>
            <label>Nota</label><br/>
            <input type="number" name="nota"/>
            @error('nota')
                **Obligatorio
            @enderror
        </p>
        <p>
            
            <input type="submit" name="crear" value="Crear Nota"/>
        </p>
    </form>
</body>
</html>