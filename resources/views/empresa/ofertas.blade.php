<!DOCTYPE html>
<html>
<head>
    <title>Mis Ofertas</title>
</head>
<body>

<a href="{{ route('empresa.panel') }}">Volver al panel</a>
<hr>

<h2>Ofertas Publicadas</h2>

<table border="1" cellpadding="8">
    <tr>
        <th>Título</th>
        <th>Descripción</th>
        <th>Fecha Publicación</th>
        <th>Estado</th>
        <th>Postulantes</th>
    </tr>

    @foreach($ofertas as $o)
    <tr>
        <td>{{ $o->titulo }}</td>
        <td>{{ $o->descripcion }}</td>
        <td>{{ $o->fecha_publicacion }}</td>
        <td>{{ $o->estado }}</td>
        <td>
            <a href="{{ route('empresa.postulantes', $o->id_oferta) }}">
                Ver postulantes
            </a>
        </td>
    </tr>
    @endforeach
</table>

</body>
</html>
