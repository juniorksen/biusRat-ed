<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Videos de {{ $usuario->name }}</title>
    <style>
        body {
            background-color: black;
            color: white;
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        .logo {
            font-size: 24px;
            font-weight: bold;
            text-transform: uppercase;
            color: #ff6600;
        }

        header {
            background-color: #333;
            padding: 10px 0;
            position: fixed;
            width: 100%;
            top: 0;
            z-index: 1000;
        }

        nav ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            gap: 20px;
        }

        nav ul li a {
            text-decoration: none;
            color: #ff6600;
            font-size: 18px;
            transition: color 0.3s;
        }

        nav ul li a:hover {
            color: #ffa500;
        }

        @media (max-width: 768px) {
            nav ul {
                flex-direction: column;
                gap: 10px;
                margin-top: 10px;
            }
        }

        .container {
            width: 90%;
            margin: 0 auto;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        #main {
            padding: 20px 0;
            margin-top: 80px; /* Para hacer espacio para la barra de navegación fija */
        }

        .head h2 {
            margin: 0;
            padding: 20px 0;
            text-align: center;
        }

        .movie {
            text-align: center;
            margin-bottom: 20px;
        }

        .video-container {
            position: relative;
            width: 100%;
            max-width: 1080px; /* Ajusta el tamaño máximo del video */
            height: auto;
            margin: 0 auto;
        }

        .video-container video {
            width: 100%;
            height: auto;
        }

        .video-link {
            display: block;
            margin-top: 10px;
            color: #ff6600;
            text-decoration: none;
        }

        .video-link:hover {
            text-decoration: underline;
        }

        .videos, .calorias {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            justify-content: center;
            padding: 20px;
        }

        .video-item, .caloria-item {
            background-color: #000000;
            padding: 20px;
            border-radius: 8px;
            text-align: center;
            width: calc(33.333% - 40px);
            box-sizing: border-box;
        }

        .video-item h3, .caloria-item h3 {
            margin: 10px 0;
            font-size: 18px;
            color: #ff6600;
        }

        .video-item p, .caloria-item p {
            font-size: 14px;
        }

        .video-item img, .caloria-item img {
            width: 90%;
            height: auto;
            border-radius: 8px;
        }

        h2 {
            text-align: center;
            padding: 20px 0;
            color: #ff6600;
        }

        .links {
            text-align: center;
            margin-top: 20px;
        }

        .links a {
            color: #ff6600;
            text-decoration: none;
            padding: 10px 20px;
            border: 1px solid #ff6600;
            border-radius: 5px;
            transition: background-color 0.3s, color 0.3s;
        }

        .links a:hover {
            background-color: #ffa500;
            color: black;
        }

    </style>
</head>
<body>

<header>
    <div class="container">
        <div class="logo">BiusRat</div>
        <nav>
            <ul>
                <li><a href="{{ route('ejercicios') }}">Create Video</a></li>
                <li><a href="{{ route('presentacion') }}">Video de Presentacion</a></li>  
                <li><a href="{{ route('caloriascreate') }}">Crear Plan Alimentario</a></li>
            </ul>
        </nav>
    </div>
</header>

<div id="main">
    <div class="videos">
        @forelse ($videos as $video)
        <div class="video-item" style="width: 100%;"> <!-- Aumenta el ancho del video-item -->
            <h3 class="video-title">{{ $video->titulo }}</h3>
            <div class="video-container">
                <video controls>
                    <source src="{{ asset('videos/' . $video->url_video) }}" type="video/mp4">
                    Your browser does not support the video tag.
                </video>
            </div>
            <p class="video-description">{{ $video->descripcion }}</p>
        </div>
        @empty
        <p>No hay videos disponibles para este usuario.</p>
        @endforelse
    </div>

    <h2> Plan Alimentario</h2>
    <div class="calorias">
        @forelse ($calorias as $caloria)
        <div class="caloria-item">
            <div class="caloria-content">
                <img src="{{ asset('videos/' . $caloria->url_comida) }}" alt="Comida">
                <h3 class="caloria-title">{{ $caloria->titulo }}</h3>
                <p class="caloria-description">{{ $caloria->descripcion }}</p>
            </div>
        </div>
        @empty
        <p>No Tiene Plan Alimentario</p>
        @endforelse
    </div>

    {{ $videos->links() }}

    <div class="links">
        <a href="{{ route('todos') }}">Volver al Index</a>
    </div>
</div>

</body>
</html>
