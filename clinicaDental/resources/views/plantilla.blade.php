<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
    <title>ArteDental</title>
    <style>
        header{display: flex;align-content: center}
    </style>
</head>
<body class="container">
    <header>
        <div >
            <img src="{{ asset('img/logo.svg') }}" alt="Logo" style="height: 100px"/>            
        </div>
        <div  id="botones">
            <h1 class="text-primary">ArteDental</h1>
            <a class="btn btn-outline-primary" href="{{route('verPacientes')}}">Pacientes</a>
            <a class="btn btn-outline-primary" href="{{route('verDentistas')}}">Dentistas</a>
            <a class="btn btn-outline-primary" href="{{route('verCitas')}}">Citas</a>                        
        </div>
        <h2 class="text-dark">@yield('titulo')<h2>
    </header>

    <main>
        @yield('contenido')
    </main>

    <footer>
        <div class="text-danger">
            @yield('mensaje')
        </div>
        
    </footer>
</body>
</html>