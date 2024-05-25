<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Index</title>
    <link rel="stylesheet" href="{{asset('css/calorias.css')}}">
</head>
<body>
    <nav style="margin-top: 10px">
        <ul>
            <li><a href="{{ route('ejercicios') }}">Create Video</a></li>
            <li><a href="{{ route('presentacion') }}">video de presentacion</a></li>  
            <li><a href="{{ route('caloriascreate') }}">Crear plan alimentario</a></li>
        </ul>
    </nav>   

    <div class="container" style="margin-top: 30px">
        @forelse ($calorias as $Caloria)
        <div class="movie">
            <img src="{{ asset('videos/' .$Caloria->url_comida )}}" ></img>
            <h2>{{ $Caloria->titulo }}</h2>
            <p>{{ $Caloria->descripcion }}</p>
            <div class="calories-container">
                <p>Calorias; {{ $Caloria->calorias }}</p>
            </div>
        </div>
        @empty
        <li>No videos found.</li>
        @endforelse
    </div>
    {{ $calorias->links() }}

    <nav >
        <ul>
            <li><a href="{{ route('logout') }}">Salir</a></li> 
            <li><a href="{{ route('todos') }} ">Ver todos los entrenadores </a></li> 
        </ul>
    </nav>  
</body>
</html>
