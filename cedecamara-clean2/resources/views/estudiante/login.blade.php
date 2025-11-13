<!DOCTYPE html>
<html>
<head>
    <title>Registrar Estudiante</title>
</head>
<body>
   <h2>Ingreso del Estudiante</h2>

<form method="POST" action="{{ route('estudiante.login.do') }}">
    @csrf

    <label>ID Estudiante</label><br>
    <input type="number" name="id_estudiante" required><br><br>

    <button type="submit">Ingresar</button>
</form>
</body>
</html>