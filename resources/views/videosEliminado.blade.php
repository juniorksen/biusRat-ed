<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Videos Eliminados</title>
</head>
<body>
    <h1>Videos Eliminados</h1>

    <table>
        <thead>
            <tr>
                <th>ID del Video</th>
                <th>ID del Usuario</th>
                <th>Título</th>
                <th>Descripción</th>
                <th>Video</th>
                <th>Fecha de Creación</th>
                <th>Fecha de Última Actualización</th>
                <th>Fecha de Eliminación</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($videosEliminados as $video)
                <tr>
                    <td>{{ $video->video_id }}</td>
                    <td>{{ $video->user_id }}</td>
                    <td>{{ $video->titulo }}</td>
                    <td>{{ $video->descripcion }}</td>
                    <td>
                        <video width="320" height="240" controls>
                            <source src="{{ asset('videos/' . $video->url_video) }}" type="video/mp4">
                            Your browser does not support the video tag.
                        </video>
                    </td>
                    <td>{{ $video->created_at }}</td>
                    <td>{{ $video->updated_at }}</td>
                    <td>{{ $video->fecha_eliminacion }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
