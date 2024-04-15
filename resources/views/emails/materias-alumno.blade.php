<h1>Holaaa {{ $alumno->nombre }}</h1>
<p>
    Estas son las materias a las que estás inscrito:

    <ul>
        @foreach ($alumno->materias as $materia)
            <li>{{ $materia->nombre }}</li>
        @endforeach
    </ul>
</p>