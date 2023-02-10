<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Taller</title>
    <!-- Scripts -->
    {{-- <script src="https://cdn.tailwindcss.com"></script> --}}
    <script src="{{ asset('js/app.js') }}" defer></script>
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body>

    <style>
        .align-right {
            text-align: right;
        }

        .align-center {
            text-align: center;
        }

        .contenedor {
            display: grid;
            grid-template-columns: 50%;
            margin-top: 30px;
            justify-content: center
        }

        #boton {
            text-align: center;
        }
    </style>

    <div class="contenedor">
        <h1>Acceso a Taller</h1>

        <form action="{{route("logear")}}" method="POST">
            @csrf
            
            <!-- Email input -->
            <div class="form-outline mb-4">
                <label class="form-label" for="email">Email:</label>
                <input type="email" id="email" name="email" class="form-control" />
            </div>

            <!-- Password input -->
            <div class="form-outline mb-4">
                <label class="form-label" for="pass">Contraseña:</label>
                <input type="password" id="pass" name="pass" class="form-control" />
            </div>

            <!-- Submit button -->
            <div id="boton">
                <button type="button" class="btn btn-primary btn-block mb-4">Login</button>
            </div>
            <!-- Register buttons -->
            <div class="text-center">
                <p>¿No tienes cuenta?
                    <a href="#!">Registrar</a>
                </p>
            </div>
        </form>

    </div>

</body>

</html>