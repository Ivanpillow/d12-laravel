<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Listado de come ntariuos bruh</title>
</head>
<body>
    <a href="/comentario/create">Nuevo comentario</a>
    <h1>Lista grande</h1>
    <table border="2">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Correo</th>
                <th>Ciudad</th>
                <th>Fecha</th>
                <th>Detalles</th>
            </tr>
        </thead>
        <tbody>
            @foreach($comentarios as $comentario)
                <tr>
                    <td>{{$comentario->nombre}}</td>
                    <td>{{$comentario->correo}}</td>
                    <td>{{$comentario->ciudad}}</td>
                    <td>{{$comentario->created_at}}</td>
                    <td>
                        <a href="{{route('comentario.show', $comentario->id)}}">Ver más</a>    | 
                        <a href="{{route('comentario.edit', $comentario->id)}}">Editar</a><br>
                        <form action="{{route('comentario.destroy', $comentario)}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <input type="submit" value="Eliminar" style="border-radius: 2px; margin: auto;">
                        </form>
                    </td>
                    
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>