<x-mi-layout titulo="Listado Alumnos">
    <table class="table">
        <tr>
            <th>Nombre</th>
            <th>Correo</th>
            <th>Acciones</th>
        </tr>
        @foreach ($alumnos as $alumno)
            <tr>
                <td>{{ $alumno->nombre }}</td>
                <td>{{ $alumno->correo }}</td>
                <td>
                   <a href="{{ route('alumno.agendar-materia', $alumno) }}">Agendar Materia</a>
                </td>
            </tr>
        @endforeach
    </table>
</x-mi-layout>
