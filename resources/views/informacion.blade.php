<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Info</title>
</head>
<body>
    <a href="/contacto">Contacto</a>
    <hr>
    <h1>Información</h1>

    @if ($tipo == 'alumno')
        <h2>Alumnos</h2>
        <p>bla bla bla</p>
    @elseif($tipo == 'prof' || $tipo == 'profesor')
    <h2>Profesores</h2>
    <p>dsdsdsds</p>
    @else
        <h2>Publico General</h2>
    @endif

    <h2>Alumnos</h2>
    <p>ejemploejeplo</p>

    <h2>Profesores</h2>
    <p>ejemploejeplo</p>

</body>
</html>