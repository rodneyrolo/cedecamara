<!DOCTYPE html>
<html>
<head>
    <title>Perfil del Estudiante</title>
</head>
<body>

<a href="{{ route('estudiante.panel') }}">Volver al Panel</a> | 
<a href="{{ route('estudiante.logout') }}">Cerrar sesión</a>

<hr>

<h2>Mi Perfil</h2>

{{-- Mensaje de éxito --}}
@if(session('success'))
    <p style="color: green;">{{ session('success') }}</p>
@endif

<form action="{{ route('estudiante.perfil.guardar') }}" method="POST">
    @csrf

    <p>
        <label for="nombre">Nombre:</label><br>
        <input type="text" name="nombre" id="nombre" value="{{ old('nombre', $estudiante->nombre) }}">
        @error('nombre')
            <br><span style="color: red;">{{ $message }}</span>
        @enderror
    </p>

    <p>
        <label for="email">Correo:</label><br>
        <input type="email" name="email" id="email" value="{{ old('email', $estudiante->email) }}">
        @error('email')
            <br><span style="color: red;">{{ $message }}</span>
        @enderror
    </p>

    <p>
        <label for="carrera">Carrera:</label><br>
        <input type="text" name="carrera" id="carrera" value="{{ old('carrera', $estudiante->carrera) }}">
        @error('carrera')
            <br><span style="color: red;">{{ $message }}</span>
        @enderror
    </p>

    <p>
        <label for="nrocelular">Número de celular:</label><br>
        <input type="text" name="nrocelular" id="nrocelular" value="{{ old('nrocelular', $estudiante->nrocelular) }}">
        @error('nrocelular')
            <br><span style="color: red;">{{ $message }}</span>
        @enderror
    </p>

    <p>
        <button type="submit">Guardar cambios</button>
    </p>
</form>

</body>
</html>