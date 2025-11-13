<!DOCTYPE html>
<html>
<head>
    <title>Administrar Ofertas</title>
</head>
<body>

<a href="{{ route('administrador.panel') }}">⬅ Volver al panel</a>
<hr>

<h2>Estudiantes registrados</h2>

<table border="1" cellpadding="8">
    <tr>
        <th>ID</th>
        <th>Nombre</th>
        <th>Email</th>
		<th>Carrera</th>
		<th>Celular</th>
        <th>Acciones</th>
    </tr>

    @foreach($estudiantes as $est)
    <tr>
        <td>{{ $est->id_estudiante }}</td>
        <td>{{ $est->nombre }}</td>
		<td>{{ $est->email }}</td>
		<td>{{ $est->carrera }}</td>
        <td>{{ $est->nrocelular }}</td>
        <td>
            <a href="{{ route('administrador.estudiantes.editar', $est->id_estudiante) }}">Editar</a>

            <form action="{{ route('administrador.estudiantes.eliminar', $est->id_estudiante) }}" method="POST" style="display:inline;">
                @csrf @method('DELETE')
                <button type="submit" onclick="return confirm('¿Eliminar este estudiante?')">Eliminar</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>
