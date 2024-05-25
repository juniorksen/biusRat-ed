<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BiusRat</title>
    <link rel="stylesheet" href="style.css">
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: sans-serif;
            background-color: #000; /* Color de fondo negro */
            color: #fff; /* Color del texto */
        }

        header {
            background-color: rgba(0, 0, 0, 0.7); /* Color de fondo semi-transparente */
            padding: 20px 0;
            position: fixed; /* Encabezado fijo */
            top: 0;
            width: 100%;
            z-index: 1000; /* Asegura que esté por encima de otros elementos */
        }

        .container {
            width: 90%;
            margin: 0 auto;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .logo {
            font-size: 24px;
            font-weight: bold;
            text-transform: uppercase;
            color: #fff; /* Color del texto */
        }

        nav ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
            display: flex;
        }

        nav ul li {
            margin-right: 20px;
        }

        nav ul li a {
            text-decoration: none;
            color: #ff6600;
            font-size: 18px;
        }

        .banner {
            margin-top: 80px; /* Ajusta el margen para evitar solapamiento con el encabezado */
            width: 100%;
            height: 500px;
            background-color: #000; /* Color de fondo negro */
            background-image: url("imagen.jpg"); /* Reemplaza "imagen.jpg" con la URL de tu imagen */
            background-size: cover;
            background-position: center;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }

        .banner h1 {
            font-size: 48px;
            text-transform: uppercase;
            margin-bottom: 20px;
            color: #fff; /* Color del texto */
        }

        .banner p {
            font-size: 20px;
            line-height: 1.5;
            text-align: center;
            color: #fff; /* Color del texto */
        }

        .banner a {
            display: inline-block;
            padding: 10px 20px;
            background-color: #ff0000;
            color: #fff;
            text-decoration: none;
            font-size: 18px;
            border-radius: 5px;
            margin-top: 20px;
        }

        .banner p span {
            font-family: 'Times New Roman', Times, serif;
            font-style: italic;
        }

        @media (max-width: 768px) {
            .container {
                flex-direction: column;
                text-align: center;
            }

            nav ul {
                margin-top: 20px;
            }

            nav ul li {
                margin: 0 10px;
            }
        }
    </style>
</head>
<body>
<header>
    <div class="container">
        <div class="logo">BiusRat</div>
        <nav>
            <ul>
                
                <li><a href="{{ route('login') }}">Create cuenta</a></li>
                <li><a href="{{ route('Registrarse') }}">Iniciar sesión</a></li>
            
            </ul>
        </nav>
    </div>
</header>

<section class="banner">
    <div class="container">
        <p><span>"Cree en ti mismo y en tu capacidad para alcanzar tus sueños. La confianza en uno mismo es el ingrediente fundamental para el éxito."</span></p>
    </div>
    <div class="container">
        <p><span> Albert Einstein </span>
    </div>
</section>

</body>
</html>
