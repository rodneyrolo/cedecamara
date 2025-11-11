<!DOCTYPE html>
<html>
<head>
    <title>Panel del Estudiante</title>
</head>
<body>

<a href="{{ route('estudiante.logout') }}">Cerrar sesión</a>
<hr>

<h2>Bienvenido al Panel del Estudiante</h2>
<p><strong>Estudiante:</strong> {{ $estudiante->nombre}}</p>
<ul>
    <li><a href="{{ route('estudiante.ofertas') }}">Ver ofertas disponibles</a></li>
    <li><a href="{{ route('estudiante.postulaciones') }}">Mis postulaciones</a></li>
    <li><a href="{{ route('estudiante.informes') }}">Mis informes</a></li>
</ul>

</body>
</html>
