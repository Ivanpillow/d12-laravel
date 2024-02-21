<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="{{route('comentario.store')}}" method="POST">
        @csrf 
        {{--Importante en cada formulario. Es otro input que genera una llave--}}
        {{--Comentario--}}
        <!-- <a href="/comentario">Lista de comentarios</a>-->
        <a href="{{route('comentario.index')}}">Lista de comentarios</a>
        <h1>Contacto</h1>
        <label for="nombre">Nombre: </label>
        <input type="text" name="nombre" value="{{old('nombre')}}">
        @error('nombre')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <br>

        <label for="correo">Correo electrónico: </label>
        <input type="text" name="correo" value="{{old('correo')}}">
        @error('correo')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <br>

        <label for="comentario">Comentario: </label>
        <textarea name="comentario"  cols="30" rows="3">{{old('comentario')}}</textarea>
        @error('comentario')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <br>

        <label for="ciudad">Ciudad: </label>
        <select name="ciudad">
            <option value="gdl" @selected(old('ciudad') == 'gdl')>Guadalajara</option>
            <option value="tonala" @selected(old('ciudad') == 'tonala')>Tonalá</option>
            <option value="zapopan" @selected(old('ciudad') == 'zapopan')>Zapopan</option>
        </select>
        @error('ciudad')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <br>
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
