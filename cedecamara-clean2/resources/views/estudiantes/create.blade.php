<!DOCTYPE html>
<html>
<head>
    <title>Registrar Estudiante</title>
</head>
<body>
    <a href="{{ route('administrador.panel') }}">⬅ Volver al panel</a>
    <h2>Registrar Estudiante</h2>

    @if(session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif

    <form method="POST" action="{{ route('estudiante.store') }}">
        @csrf
        <label>Nombre:</label>
        <input type="text" name="nombre" required>

        <label>Email:</label>
        <input type="email" name="email" required>

        <label>Carrera:</label>
        <input type="text" name="carrera" required>

        <label>Celular:</label>
        <input type="text" name="nrocelular">

        <button type="submit">Registrar</button>
    </form>
</body>
</html>