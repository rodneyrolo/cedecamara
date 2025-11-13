<!DOCTYPE html>
<html>
<head>
    <title>Panel Administrador</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>
<a href="{{ route('administrador.logout') }}">Cerrar sesión</a>
<hr>
<h2>Panel del Administrador</h2>
<p><strong>Administrador:</strong> {{ $administrador->nombre_admin }}</p>

<h3>Opciones de gestión</h3>
<ul>
    <li><a href="{{ route('empresa.create') }}">➕ Crear empresa</a></li>
    <li><a href="{{ route('estudiante.create') }}">➕ Crear estudiante</a></li>
    <li><a href="{{ route('informes.index') }}">📄 Gestionar informes</a></li>
    <li><a href="{{ route('administrador.ofertas') }}">⚙️ Gestionar ofertas</a></li>
    <li><a href="{{ route('administrador.empresas') }}">🏢 Ver empresas</a></li>
    <li><a href="{{ route('administrador.estudiantes') }}">🎓 Ver estudiantes</a></li>
</ul>

</body>
</html>

