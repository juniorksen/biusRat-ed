<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Subir video de presentacion</title>
</head>
<body>
    <h2>Subir Video</h2>

    <form method="POST" action="{{ route('presentacion2') }}" enctype="multipart/form-data">
        @csrf
    <div class="form-group">
        <input type="file" name="file" placeholder="File" />
    </div>
        <button type="submit">Subir Video</button>
    </form>

</body>
</html>
