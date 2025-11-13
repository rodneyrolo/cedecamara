<!DOCTYPE html>
<html>
<head>
    <title>Login Administrador</title>
</head>
<body>

<h2>Ingreso de Administrador</h2>

@if(session('error'))
    <p style="color:red;">{{ session('error') }}</p>
@endif

<form method="POST" action="{{ route('administrador.login.do') }}">
    @csrf

    <label>ID Administrador</label><br>
    <input type="number" name="id_administrador" required><br><br>

    <button type="submit">Ingresar</button>
</form>

</body>
</html>
