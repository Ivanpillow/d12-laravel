<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Detalle del Comentario</title>
</head>
<body>
    <a href="{{route('comentario.index')}}">Lista de comentarios</a>
    <h1>Detalles pa</h1>
    <ul>
        <li><strong>Nombre:</strong> {{$comentario->nombre}}</li>
        <li><strong>Correo:</strong> {{$comentario->correo}}</li>
        <li><strong>Comentario:</strong> {{$comentario->comentario}}</li>
        <li><strong>Ciudad:</strong> {{$comentario->ciudad}}</li>
    </ul>
</body>
</html>