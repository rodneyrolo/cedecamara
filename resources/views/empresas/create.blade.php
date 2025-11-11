<!DOCTYPE html>
<html>
<head>
    <title>Registrar Empresa</title>
</head>
<body>
    <h2>Registrar Empresa</h2>

    @if(session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif

    <form method="POST" action="{{ route('empresa.store') }}">
        @csrf

        <label>Nombre empresa:</label><br>
        <input type="text" name="nombre_empresa" required><br><br>

        <label>Dirección:</label><br>
        <input type="text" name="direccion"><br><br>

        <label>Celular:</label><br>
        <input type="text" name="nrocelular"><br><br>

        <label>Email:</label><br>
        <input type="email" name="email"><br><br>

        <button type="submit">Registrar</button>
    </form>
</body>
</html>