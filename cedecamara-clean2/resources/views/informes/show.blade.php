<!DOCTYPE html>
<html>
<head>
    <title>Detalle del Informe</title>
</head>
<body>
<a href="{{ route('administrador.panel') }}">⬅ Volver al panel</a>
<h2>Informe #{{ $informe->id_informe }}</h2>

<p><strong>Estudiante:</strong> {{ $informe->estudiante->nombre }}</p>
<p><strong>Oferta:</strong> {{ $informe->oferta->titulo }}</p>
<p><strong>Fecha de Entrega:</strong> {{ $informe->fecha_entrega }}</p>
<p><strong>Calificación:</strong> {{ $informe->calificacion }}</p>
<p><strong>Comentarios:</strong><br>{{ $informe->comentarios }}</p>

<a href="{{ route('informes.index') }}">Volver</a>

</body>
</html>
