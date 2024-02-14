<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <a href="/info">Informacion</a>
    <hr>
    <h1>Contacto</h1>
    <form action="/contacto-guarda" method="POST">
        <!-- siempre poner csrf para formularios -->
        @csrf
        <label for="nombre">Nombre</label><br>
        <input type="text" name="nombre">
        <br><br>
        <label for="correo">Correo</label> <br>
        <input type="text" name="correo">
        <br><br>
        <label for="comentario">Comentario</label><br>
        <textarea name="comentario" cols="30" rows="5"></textarea>
        <br><br>
        <label for="ciudad">Ciudad</label><br>
        <select name="ciudad">
            <option value="gdl">Guadalajara</option>
            <option value="tonala">Tonala</option>
            <option value="zapopan">Zapopan</option>
        </select>
        <br><br>
        <input type="submit" value="Enviar">
    </form>
</body>
</html>