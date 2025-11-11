<!DOCTYPE html>
<html>
<head>
    <title>Registrar Estudiante</title>
</head>
<body>
<h2>Mis Informes de Práctica</h2>

<table border="1" cellpadding="8">
<tr>
    <th>Oferta</th>
    <th>Fecha Entrega</th>
    <th>Calificación</th>
    <th>Comentarios</th>
</tr>

@foreach($informes as $i)
<tr>
    <td>{{ $i->oferta->titulo }}</td>
    <td>{{ $i->fecha_entrega }}</td>
    <td>{{ $i->calificacion }}</td>
    <td>{{ $i->comentarios }}</td>
</tr>
@endforeach
</table>

<a href="{{ route('estudiante.panel') }}">Volver</a>


</body>
</html>