<!DOCTYPE html>
<html>
<head>
    <title>Administrar Ofertas</title>
</head>
<body>

<a href="{{ route('administrador.panel') }}">⬅ Volver al panel</a>
<hr>

<h2>Empresas registradas</h2>

<table border="1" cellpadding="8">
    <tr>
        <th>ID</th>
        <th>Nombre</th>
		<th>Direccion</th>
        <th>Celular</th>
		<th>Email</th>
        <th>Acciones</th>
    </tr>

    @foreach($empresas as $empresa)
    <tr>
        <td>{{ $empresa->id_empresa }}</td>
        <td>{{ $empresa->nombre_empresa }}</td>
		<td>{{ $empresa->direccion }}</td>
		<td>{{ $empresa->nrocelular }}</td>
        <td>{{ $empresa->email }}</td>
        <td>
            <a href="{{ route('administrador.empresas.editar', $empresa->id_empresa) }}">Editar</a>

            <form action="{{ route('administrador.empresas.eliminar', $empresa->id_empresa) }}" method="POST" style="display:inline;">
                @csrf @method('DELETE')
                <button type="submit" onclick="return confirm('¿Eliminar esta empresa?')">Eliminar</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>