<!DOCTYPE html>
<html>
<head>
    <title>Registrar Estudiante</title>
</head>
<body>
<h2>Mis Postulaciones</h2>

<table border="1" cellpadding="8">
<tr>
    <th>Oferta</th>
    <th>Empresa</th>
    <th>Fecha</th>
    <th>Estado</th>
</tr>

@foreach($postulaciones as $p)
<tr>
    <td>{{ $p->oferta->titulo }}</td>
    <td>{{ $p->oferta->empresa->nombre_empresa }}</td>
    <td>{{ $p->fecha_postulacion }}</td>
    <td>{{ $p->estado }}</td>
</tr>
@endforeach
</table>

<a href="{{ route('estudiante.panel') }}">Volver</a>

</body>
</html>