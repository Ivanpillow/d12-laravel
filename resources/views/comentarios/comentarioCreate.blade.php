<x-mi-layout titulo="Crear Comentario">

    @include('parciales.form-error')

    <form action="{{ route('comentario.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <label for="nombre">Nombre</label><br>
        <input type="text" name="nombre" value="{{ old('nombre') }}">
        @error('nombre')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <br><br>

        <label for="correo">Correo</label><br>
        <input type="text" name="correo" value="{{ old('correo') }}">
        @error('correo')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <br><br>

        <label for="comentario">Comentario</label><br>
        <textarea name="comentario" cols="30" rows="5">{{ old('comentario') }}</textarea>
        <br><br>
        <label for="ciudad">Ciudad</label><br>
        <select name="ciudad">
            <option value="GDL" @selected(old('ciudad') == 'GDL')>Guadalajara</option>
            <option value="Zapopan" @selected(old('ciudad') == 'Zapopan')>Zapopan</option>
            <option value="Tonalá" @selected(old('ciudad') == 'Tonalá')>Tonalá</option>
        </select>
        <br>
        <hr>
        <input type="file" name="archivo">
        <br><br>
        <input type="submit" value="Enviar">
    </form>
</x-mi-layout>