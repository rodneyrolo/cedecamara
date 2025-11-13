<!DOCTYPE html>
<html>
<head>
    <title>Editar Empresa</title>
</head>
<body>

<a href="{{ route('administrador.empresas') }}">⬅ Volver a empresas</a>
<hr>

<h2>Editar Empresa</h2>

@if ($errors->any())
    <div style="color:red;">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form method="POST" action="{{ route('administrador.empresas.actualizar', $empresa->id_empresa) }}">
    @csrf

    <label>Nombre:</label><br>
    <input type="text" name="nombre_empresa" value="{{ old('nombre_empresa', $empresa->nombre_empresa) }}"><br><br>

    <label>Email:</label><br>
    <input type="email" name="email" value="{{ old('email', $empresa->email) }}"><br><br>

    <label>Teléfono:</label><br>
    <input type="text" name="nrocelular" value="{{ old('nrocelular', $empresa->nrocelular) }}"><br><br>

    <label>Dirección:</label><br>
    <input type="text" name="direccion" value="{{ old('direccion', $empresa->direccion) }}"><br><br>

    <button type="submit">💾 Guardar cambios</button>
</form>

</body>
</html>
