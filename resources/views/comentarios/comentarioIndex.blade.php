<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Listado Comentarios</title>
</head>
<body>
    <!-- <a href="/comentario/create"> Nuevo Comentario </a> -->
    <a href="{{ route('comentario.create')}}"> Nuevo Comentario </a>
    <h1>Lista de comentario </h1>
    <table border=1>
        <thead>
            <tr>
                <th>Nombre </th>
                <th>Correo </th>
                <th>Ciudad </th>
                <th>Creado / Enviado </th>
            </tr>
        </thead>
        <body>
            @foreach ($comentarios as $comentario)
            <tr>
                <td>{{ $comentario->user->name }}</td>
                <td>{{ $comentario->user->email }}</td>
                <td>{{ $comentario->ciudad }}</td>
                <td>{{ $comentario->created_at }}</td>
                <td>
                    <a href="{{ route('comentario.show', $comentario->id) }}"> Detalle </a>
                    <br>
                    <a href="{{ route('comentario.edit', $comentario->id) }}"> Editar </a>
                    <br>
                    <form action="{{ route('comentario.destroy', $comentario) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <input type="submit" value="Eliminar" style="border-radius: 5px solid;">
                    </form>

                </td>
            </tr>
            @endforeach
        </body>
    </table>
    
</body>
</html>