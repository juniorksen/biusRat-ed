<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Subir Video</title>
</head>
<body>
    <h2>Subir Video</h2>

    <form method="POST" action="{{ route('store') }}" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="titulo">Title:</label>
            <input type="text" class="form-control" id="titulo" name="titulo" placeholder="Enter video title">
        </div>
        <div class="form-group">
            <label for="descripcion">Description:</label>
            <textarea class="form-control" id="descripcion" name="descripcion" rows="3" placeholder="Enter video description"></textarea>
        </div>
        
        <input type="file" name="file" placeholder="File" />

        <button type="submit">Subir Video</button>
    </form>



</body>
</html>
