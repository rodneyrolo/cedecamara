<!DOCTYPE html>
<html>
<head>
    <title>Login Empresa</title>
</head>
<body>

<h2>Ingreso de Empresa</h2>

@if(session('error'))
    <p style="color:red;">{{ session('error') }}</p>
@endif

<form method="POST" action="{{ route('empresa.login.do') }}">
    @csrf

    <label>ID Empresa</label><br>
    <input type="number" name="id_empresa" required><br><br>

    <button type="submit">Ingresar</button>
</form>

</body>
</html>
