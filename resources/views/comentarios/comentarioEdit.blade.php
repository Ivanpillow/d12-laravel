<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <hr>
    <h1>Editar Comentario</h1>

    <form action="{{ route('comentario.update', $comentario) }}" method="POST">
        <!-- siempre poner csrf para formularios -->
        @csrf
        <!-- metodo patch para poder editar -->
        @method('PATCH')
        <label for="nombre">Nombre</label><br>
        <input type="text" name="nombre" value="{{ old('nombre') ?? $comentario->nombre }}">
        @error('nombre')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <br><br>

        <label for="correo">Correo</label> <br>
        <input type="text" name="correo" value="{{ old('correo') ?? $comentario->correo }}">
        @error('correo')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <br><br>

        <label for="comentario">Comentario</label><br>
        <textarea name="comentario" cols="30" rows="5"> {{ old('comentario') ?? $comentario->comentario }}</textarea>
        @error('comentario')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <br><br>

        <label for="ciudad">Ciudad</label><br>
        <select name="ciudad">
            <option value="gdl" @selected((old('ciudad') ?? $comentario->ciudad) == 'gdl')>Guadalajara</option>
            <option value="tonala" @selected((old('ciudad') ?? $comentario->ciudad) == 'tonala')>Tonala</option>
            <option value="zapopan" @selected((old('ciudad') ?? $comentario->ciudad) == 'zapopan')>Zapopan</option>
        </select>
        @error('ciudad')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <br><br>
        <input type="submit" value="Enviar">
    </form>
</body>
</html>