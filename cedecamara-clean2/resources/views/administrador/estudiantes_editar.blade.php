<!DOCTYPE html>
<html>
<head>
    <title>Editar Estudiante</title>
</head>
<body>

<a href="{{ route('administrador.estudiantes') }}">⬅ Volver a estudiantes</a>
<hr>

<h2>Editar Estudiante</h2>

@if ($errors->any())
    <div style="color:red;">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form method="POST" action="{{ route('administrador.estudiantes.actualizar', $estudiante->id_estudiante) }}">
    @csrf

    <label>Nombre:</label><br>
    <input type="text" name="nombre" value="{{ old('nombre', $estudiante->nombre ?? $estudiante->nombre) }}"><br><br>

    <label>Email:</label><br>
    <input type="email" name="email" value="{{ old('email', $estudiante->email) }}"><br><br>

    <label>Carrera:</label><br>
    <input type="text" name="carrera" value="{{ old('carrera', $estudiante->carrera) }}"><br><br>

    <label>Celular:</label><br>
    <input type="text" name="nrocelular" value="{{ old('nrocelular', $estudiante->nrocelular) }}"><br><br>

    <button type="submit">💾 Guardar cambios</button>
</form>

</body>
</html>

