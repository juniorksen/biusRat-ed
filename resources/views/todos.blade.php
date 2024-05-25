<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BiusRat</title>
    <link rel="stylesheet" href="css/todos.css">
    <script src="js/jquery-1.4.2.min.js" defer></script>
    <script src="js/jquery-func.js" defer></script>
    <style>
        /* Incluye aquí el CSS actualizado para simplificar la referencia */
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
            max-width: 800px; /* Ajusta el tamaño máximo del video */
            height: auto;
            margin: 0 auto;
        }

        .video-container video {
            width: 100%;
            height: auto;
        }

        .video-link {
            color: #ff6600;
            text-decoration: none;
            padding: 10px 20px;
            border: 1px solid #ff6600;
            border-radius: 5px;
            transition: background-color 0.3s, color 0.3s;
        }

        .video-link:hover {
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
                <li><a href="{{ route('ejercicios') }}">Crear videos</a></li>
                <li><a href="{{ route('logout') }}">Salir</a></li>
                <li><a href="{{ route('parques') }}">Lugares</a></li>
            </ul>
        </nav>
    </div>
</header>
<div id="shell">
    <div id="main">
        <div id="content">
            <div class="box">
                <div class="head">
                    <h2>Entrenadores</h2>
                </div>
                @foreach ($usuariosConVideos as $usuario)
                <div class="movie">
                    <div class="video-container">
                        <video controls>
                            <source src="{{ asset('videos/' . $usuario->userPhoto->url_fotos) }}" type="video/mp4">
                            Tu navegador no soporta el elemento de video.
                        </video>
                    </div>
                    <a class="video-link" href="{{ route('mostrarVideosUsuario', ['usuarioId' => $usuario->id]) }}">Ver videos de {{ $usuario->name }}</a>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
</body>
</html>
