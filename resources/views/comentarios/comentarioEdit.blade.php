<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="{{route('comentario.update', $comentario)}}" method="POST">
        @csrf {{--Importante en cada formulario. Es otro input que genera una llave--}}
        @method('PATCH')
        
        <a href="{{route('comentario.index')}}">Lista de comentarios</a>
        <h1>Editar contacto</h1>
        <label for="nombre">Nombre: </label>
        <input type="text" name="nombre" value="{{old('nombre') ?? $comentario->nombre}}"> <!-- El old es para si no pasa el filtro despues de editar, vuelva a la respuesta que estaba previamente guardada -->
        <br>

        <label for="correo">Correo electrónico: </label>
        <input type="text" name="correo" value="{{old('correo') ?? $comentario->correo}}">
        <br>

        <label for="comentario">Comentario: </label>
        <textarea name="comentario"  cols="30" rows="3">{{old('comentario') ?? $comentario->comentario}}</textarea>
        <br>

        <label for="correo">Ciudad: </label>
        <select name="ciudad">
            <option value="gdl" @selected((old('ciudad') ?? $comentario->ciudad)  == 'gdl')>Guadalajara</option>
            <option value="tonala" @selected((old('ciudad') ?? $comentario->ciudad) == 'tonala')>Tonalá</option>
            <option value="zapopan" @selected((old('ciudad') ?? $comentario->ciudad) == 'zapopan')>Zapopan</option>
        </select>
        <br>

        <input type="submit" value="Enviar">
    </form>
    @include('parciales.form-error');
</body>
</html>
