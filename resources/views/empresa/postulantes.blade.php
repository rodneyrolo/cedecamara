<!DOCTYPE html>
<html>
<head>
    <title>Postulantes</title>
</head>
<body>

<a href="{{ route('empresa.ofertas') }}">Volver a ofertas</a>
<hr>

<h2>Postulantes para la oferta: {{ $oferta->titulo }}</h2>

<table border="1" cellpadding="8">
    <tr>
        <th>Estudiante</th>
        <th>Fecha Postulación</th>
        <th>Estado</th>
        <th>Acciones</th>
    </tr>

    @foreach($postulantes as $p)
    <tr>
        <td>{{ $p->estudiante->nombre }}</td>
        <td>{{ $p->fecha_postulacion }}</td>
        <td>{{ $p->estado }}</td>
        <td>
            <form method="POST" action="{{ route('empresa.postulantes.estado', $p->id_postulacion) }}">
                @csrf

                <select name="estado">
                    <option value="Pendiente" @selected($p->estado == 'Pendiente')>Pendiente</option>
                    <option value="Aceptada" @selected($p->estado == 'Aceptada')>Aceptada</option>
                    <option value="Rechazada" @selected($p->estado == 'Rechazada')>Rechazada</option>
                </select>

                <button type="submit">Actualizar</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>

@if($postulantes->isEmpty())
<p>No hay postulantes registrados para esta oferta.</p>
@endif

</body>
</html>
