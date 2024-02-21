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
    <form action="/comentario" method="POST">
        <!-- siempre poner csrf para formularios -->
        @csrf
        <label for="nombre">Nombre</label><br>
        <input type="text" name="nombre" value="{{ old('nombre') }}">
        @error('nombre')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <br><br>

        <label for="correo">Correo</label> <br>
        <input type="text" name="correo" value="{{ old('correo') }}">
        @error('correo')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <br><br>

        <label for="comentario">Comentario</label><br>
        <textarea name="comentario" cols="30" rows="5"> {{ old('comentario') }} </textarea>
        @error('comentario')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <br><br>
        
        <label for="ciudad">Ciudad</label><br>
        <select name="ciudad">
            <option value="gdl" @selected(old('ciudad') == 'gdl')>Guadalajara</option>
            <option value="tonala" @selected(old('ciudad') == 'tonala')>Tonala</option>
            <option value="zapopan" @selected(old('ciudad') == 'zapopan')>Zapopan</option>
        </select>
        @error('ciudad')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <br><br>
        <input type="submit" value="Enviar">

        {{-- @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif --}}
        

    </form>
</body>
</html>