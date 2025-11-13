<!DOCTYPE html>
<html>
<head>
    <title>Informes de Práctica</title>
</head>
<body>
<a href="{{ route('administrador.panel') }}">⬅ Volver al panel</a>
<h2>Listado de Informes de Práctica</h2>

@if(session('success'))
    <p style="color: green;">{{ session('success') }}</p>
@endif

<a href="{{ route('informes.create') }}">➕ Registrar nuevo informe</a>

<table border="1" cellpadding="8">
    <tr>
        <th>ID</th>
        <th>Estudiante</th>
        <th>Oferta</th>
        <th>Fecha Entrega</th>
        <th>Calificación</th>
        <th>Acciones</th>
    </tr>

    @foreach($informes as $informe)
    <tr>
        <td>{{ $informe->id_informe }}</td>
        <td>{{ $informe->estudiante->nombre }}</td>
        <td>{{ $informe->oferta->titulo }}</td>
        <td>{{ $informe->fecha_entrega }}</td>
        <td>{{ $informe->calificacion }}</td>
        <td>
            <a href="{{ route('informes.show', $informe->id_informe) }}">Ver</a>
        </td>
    </tr>
    @endforeach
</table>

</body>
</html>
