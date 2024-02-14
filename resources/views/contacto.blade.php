<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="/contacto-guarda" method="POST">
        @csrf 
        {{--Importante en cada formulario. Es otro input que genera una llave--}}
        {{--Comentario--}}
        <h1>Contacto</h1>
        <label for="nombre">Nombre: </label>
        <input type="text" name="nombre">
        <br>
        <label for="correo">Correo electrónico: </label>
        <input type="text" name="correo">
        <br>
        <label for="comentario">Comentario: </label>
        <textarea name="comentario"  cols="30" rows="3"></textarea>
        <br>
        <label for="correo">Ciudad: </label>
        <select name="ciudad">
            <option value="gdl">Guadalajara</option>
            <option value="tonala">Tonalá</option>
            <option value="zapopan">Zapopan</option>
        </select>
        <br>
        <input type="submit" value="Enviar">
    </form>
</body>
</html>