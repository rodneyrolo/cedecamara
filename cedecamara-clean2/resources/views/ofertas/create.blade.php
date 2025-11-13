<!DOCTYPE html>
<html>
<head>
    <title>Publicar Oferta de Práctica</title>
</head>
<body>
    <h2>Publicar Oferta de Práctica</h2>

    @if(session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif

    <form method="POST" action="{{ route('oferta.store') }}">
        @csrf

        <label>Empresa:</label><br>
        <select name="id_empresa" required>
            <option value="">Seleccione una empresa</option>
            @foreach($empresas as $empresa)
                <option value="{{ $empresa->id_empresa }}">
                    {{ $empresa->nombre_empresa }}
                </option>
            @endforeach
        </select><br><br>

        <label>Título:</label><br>
        <input type="text" name="titulo" required maxlength="100"><br><br>

        <label>Descripción:</label><br>
        <textarea name="descripcion"></textarea><br><br>
		
		<label>Modalidad:</label><br>
        <input type="text" name="modalidad" required maxlength="100"><br><br>

        <label>Fecha de publicación:</label><br>
        <input type="date" name="fecha_publicacion"><br><br>

        <label>Estado:</label><br>
        <input type="text" name="estado" placeholder="abierta / cerrada" maxlength="20"><br><br>

        <button type="submit">Publicar Oferta</button>
    </form>

</body>
</html>
