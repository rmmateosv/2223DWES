<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Registro</title>

    <!-- Scripts -->
    {{-- <script src="https://cdn.tailwindcss.com"></script> --}}
    <script src="{{ asset('js/app.js') }}" defer></script>
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div class="contenedor">
        <br/>
        <div>
            <form action="{{route("registrar")}}" method="POST">
                @csrf
                <!-- Nombre input -->
                <div class="form-outline mb-4">
                    <label class="form-label" for="nombre">Nombre:</label>
                    <input type="text" id="nombre" name="nombre" class="form-control" />
                    @error('nombre')
                        <p class="text-danger">Nombre es obligatorio</p>                    
                    @enderror
                </div>
                <!-- Email input -->
                <div class="form-outline mb-4">
                    <label class="form-label" for="email">Email:</label>
                    <input type="email" id="email" name="email" class="form-control" />
                    @error('email')
                        <p class="text-danger">Email es obligatorio, con formato correcto y no se puede repetir</p>                    
                    @enderror
                </div>
                <!-- Password input -->
                <div class="form-outline mb-4">
                    <label class="form-label" for="pass">Contraseña:</label>
                    <input type="password" id="pass" name="pass" class="form-control" />
                    @error('pass')
                        <p class="text-danger">Passwrod es obligatorio y mínimo 8 caracteres</p>                    
                    @enderror
                </div>    
                <!-- Submit button -->
                <div id="boton">
                    <button type="submit" class="btn btn-primary btn-block mb-4">Registrar</button>
                </div>  
            </form>
            <div>
                <span class="text-danger">
                    @if (session('mensaje'))
                        {{session('mensaje')}}
                    @endif
                </span>
            </div>
        </div>
        <br/>     
    </div>   
</body>
</html>

