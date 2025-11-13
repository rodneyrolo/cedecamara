<!DOCTYPE html>
<html>
<head>
    <title>Registrar Estudiante</title>
</head>
<body>
    <a href="{{ route('administrador.panel') }}">⬅ Volver al panel</a>
    <h2>Registrar Estudiante</h2>

   @if ($errors->any())
    <div style="color: red;">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('estudiante.store') }}" method="POST">
    @csrf

    <label>Nombre:</label>
    <input type="text" name="nombre" value="{{ old('nombre') }}" required><br>

    <label>Email:</label>
    <input type="email" name="email" value="{{ old('email') }}" required><br>

    <label>Teléfono:</label>
    <input type="text" name="nrocelular" value="{{ old('nrocelular') }}"><br>

    <label>Carrera:</label>
    <input type="text" name="carrera" value="{{ old('carrera') }}"><br>

    <button type="submit">Crear Estudiante</button>
</form>
</body>
</html>