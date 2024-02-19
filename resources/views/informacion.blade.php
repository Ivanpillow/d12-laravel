<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <a href="/comentario">Contacto</a>
    <br>
    <h1>Información</h1>
    {{ $tipo }}
    @if($tipo == 'alumno')
        <h2>Alumnos</h2>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Molestias est numquam modi dicta similique voluptatem ab atque. Aspernatur modi eos molestias, nihil quis cum harum sint rerum, corporis facilis quaerat!</p>
    @elseif($tipo == 'prof' || $tipo == 'profesor')
        <h2>Profesores</h2>
        <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quod tempore doloribus adipisci id explicabo fugiat, eos ratione dolor voluptate architecto deserunt debitis assumenda magni veritatis similique fuga nostrum quasi voluptatibus?</p>
    @else
    @endif
</body>
</html>