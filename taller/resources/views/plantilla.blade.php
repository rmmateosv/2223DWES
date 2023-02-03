<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Taller</title>
    <!-- <script src="https://cdn.tailwindcss.com"></script> -->
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    
</head>
<body>
    <div class="container">
        <header>
            <h1>@yield('titulo')</h1>
            <nav>
                <a class="btn btn-info" href="{{route('verCoches')}}">Coches</a>
                <a class="btn btn-info" href="{{route('verPropietarios')}}">Propietarios</a>
                <a class="btn btn-info" href="{{route('verPiezas')}}">Piezas</a>
                <a class="btn btn-info" href="{{route('verReparaciones')}}">Reparaciones</a>
            </nav>
        </header>
        <main>
            @yield("contenido")
        </main>
        <footer>
            <h3>@yield("mensaje")</h3>
        </footer>
    </div>
</body>
</html>