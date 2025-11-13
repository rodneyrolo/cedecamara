<!DOCTYPE html>
<html>
<head>
    <title>Registrar Estudiante</title>
</head>
<body>
<h2>Ofertas de Práctica Disponibles</h2>

<table border="1" cellpadding="8">
<tr>
    <th>Título</th>
    <th>Empresa</th>
    <th>Descripción</th>
	<th>Ver</th>
</tr>

@foreach($ofertas as $o)
<tr>
    <td>{{ $o->titulo }}</td>
    <td>{{ $o->empresa->nombre_empresa }}</td>
    <td>{{ $o->descripcion }}</td>
	<td><a href="{{ route('estudiante.oferta.detalle', $o->id_oferta) }}">Ver más</a></td>
</tr>
@endforeach
</table>
<a href="{{ route('estudiante.panel') }}">Volver</a>



</body>
</html>