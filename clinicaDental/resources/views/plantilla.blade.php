<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
    <title>ArteDental</title>
</head>
<body>
    <header>
        <div  class="d-flex justify-content-center" >
            <img src="{{ asset('img/logo.svg') }}" alt="Logo" style="height: 100px"/>
            <h1 class="text-primary">ArteDental</h1>
            
        </div>
        <div  class="d-flex justify-content-center" >
            <a class="btn btn-outline-primary" href="/paciente/index">Pacientes</a>
            <a class="btn btn-outline-primary" href="/dentista/index">Dentistas</a>
            <a class="btn btn-outline-primary" href="/cita/index">Citas</a>            
        </div>
        <div class="d-flex justify-content-center text-primary" >
            <h2 class="text-primary">@yield('titulo')<h2>
        </div>
    </header>

    <main>
        @yield('contenido')
    </main>

    <footer>
        @yield('mensaje')
    </footer>
</body>
</html>