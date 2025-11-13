<!DOCTYPE html>
<html>
<head>
    <title>Panel Empresa</title>
</head>
<body>

<a href="{{ route('empresa.logout') }}">Cerrar sesión</a>
<hr>

<h2>Panel de la Empresa</h2>

<p><strong>Empresa:</strong> {{ $empresa->nombre_empresa }}</p>

<ul>
    <li><a href="{{ route('empresa.ofertas') }}">Ver mis ofertas</a></li>
</ul>

</body>
</html>

