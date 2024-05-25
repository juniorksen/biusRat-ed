<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
body {
    margin: 0;
    padding: 0;
    font-family: Arial, sans-serif;
    background-color: #f2f2f2; /* Color de fondo */
    color: #333; /* Color del texto */
    position: relative; /* Añadido para que el botón de vuelta esté posicionado correctamente */
}

h2 {
    text-align: center;
    margin-top: 50px;
}

.back-link {
    position: absolute;
    top: 10px;
    right: 10px;
    text-decoration: none;
    color: #007bff;
}

form {
    width: 300px;
    margin: 50px auto 0; /* Ajustado el margen superior */
    background-color: #fff;
    padding: 20px;
    border-radius: 5px;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
}

form label {
    display: block;
    margin-bottom: 5px;
    font-weight: bold;
}

form input[type="email"],
form input[type="password"] {
    width: calc(100% - 12px);
    padding: 6px;
    margin-bottom: 10px;
    border: 1px solid #ccc;
    border-radius: 3px;
}

form button {
    width: 100%;
    background-color: #007bff;
    color: #fff;
    border: none;
    padding: 10px;
    border-radius: 3px;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

form button:hover {
    background-color: #0056b3;
}

a {
    display: block;
    margin-top: 20px;
    text-align: center;
    color: #007bff;
    text-decoration: none;
}

a:hover {
    text-decoration: underline;
}

.error-message {
    color: #ff0000;
    margin-bottom: 10px;
}

    </style>
</head>
<body>
    <h2>Iniciar sesión</h2>

    @if ($errors->any())
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <a href="{{ route('index') }}">back</a> 
    <form method="POST" action="{{ route('iniciar') }}">
        @csrf

        <div>
            <label for="email">Correo electrónico:</label>
            <input type="email" id="email" name="email" value="{{ old('email') }}" required autofocus>
        </div>

        <div>
            <label for="password">Contraseña:</label>
            <input type="password" id="password" name="password" required>
        </div>

        <div>
            <button type="submit">Iniciar sesión</button>
        </div>
    </form>
</body>
</html>
