<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Index</title>
    <link rel="stylesheet" href="{{ asset('css/pagination.css') }}">
    <style>
        body {
            background-color: black;
            color: white;
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        header {
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
            margin-top: 30px; 
        }

        .video-title {
            margin: 0;
            padding: 20px 0;
            text-align: center;
        }

        .video-item {
            text-align: center;
            margin-bottom: 20px;
        }

        .video-wrapper {
            position: relative;
            width: 100%;
            max-width: 800px; /* Ajusta el tamaño máximo del video */
            height: auto;
            margin: 0 auto;
        }

        .video-wrapper video {
            width: 100%;
            height: auto;
        }

        .video-description {
            margin-top: 10px;
        }

        .video-list {
            padding: 1px;
        }

        .btn {
            color: #ff6600;
            text-decoration: none;
            padding: 10px 20px;
            border: 1px solid #ff6600;
            border-radius: 5px;
            transition: background-color 0.3s, color 0.3s;
        }

        .btn:hover {
            background-color: #ff6600;
            color: black;
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
        <nav>
            <ul>
                <li><a href="{{ route('create') }}">Create Video</a></li>
                <li><a href="{{ route('presentacion') }}">Video de Presentacion</a></li>
                <li><a href="{{ route('calorias') }}">Ver el Plan Alimentario</a></li>
            </ul>
        </nav>
    </div>
</header>
<div id="main">
    <div class="video-list">
        @forelse ($videos as $video)
            <div class="video-item">
                <h2 class="video-title">{{ $video->titulo }}</h2>
                <div class="video-wrapper">
                    <video controls>
                        <source src="{{ asset('videos/' . $video->url_video) }}" type="video/mp4">
                        Your browser does not support the video tag.
                    </video>
                </div>
                <p class="video-description">{{ $video->descripcion }}</p>

                <!-- Formulario para eliminar el video -->
                <form action="{{ route('videos.destroy', $video->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="btn" type="submit" onclick="return confirm('¿Estás seguro de que deseas eliminar este video?')">Eliminar</button>
                </form>
            </div>
        @empty
            <p>No videos found.</p>
        @endforelse
    </div>

    <div class="pagination">
        {{ $videos->links() }}
    </div>
    <div class="links">
        <a href="{{ route('logout') }}">Salir</a>
        <a href="{{ route('todos') }}">Ver todos los videos</a>
    </div>
</div>
</body>
</html>
