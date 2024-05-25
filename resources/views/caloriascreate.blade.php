<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Subir Video</title>
</head>
<body>
    <h2>Subir Video</h2>

    <form method="POST" action="{{ route('storecalorias') }}" enctype="multipart/form-data">
        @csrf
        <label for="titulo">Título:</label><br>
        <input type="text" id="titulo" name="titulo"><br>
        
        <label for="descripcion">Descripción:</label><br>
        <textarea id="descripcion" name="descripcion"></textarea><br>
        
        <input type="file" name="file" placeholder="File" />
        
        <label for="calorias">Calorías:</label><br>
        <input type="number" id="calorias" name="calorias"><br>
        
        <input type="submit" value="Guardar">
    </form>



</body>
</html>
