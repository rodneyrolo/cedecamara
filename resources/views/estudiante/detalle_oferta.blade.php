<!DOCTYPE html>
<html>
<head>
    <title>Registrar Estudiante</title>
</head>
<body>
<h2>{{ $oferta->titulo }}</h2>

<p><strong>Empresa:</strong> {{ $oferta->empresa->nombre_empresa }}</p>
<p><strong>Descripción:</strong> {{ $oferta->descripcion }}</p>
<p><strong>Ubicación:</strong> {{ $oferta->empresa->direccion }}</p>
<p><strong>Modalidad:</strong> {{ $oferta->modalidad }}</p>

<a href="{{ route('estudiante.postular', $oferta->id_oferta) }}">✅ Postularme</a>

<br><br>
<a href="{{ route('estudiante.ofertas') }}">Volver</a>

	

</body>
</html>