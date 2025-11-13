<!DOCTYPE html>
<html>
<head>
    <title>Registrar Informe</title>
</head>
<body>
<a href="{{ route('administrador.panel') }}">⬅ Volver al panel</a>
<h2>Registrar Informe de Práctica</h2>

<form method="POST" action="{{ route('informes.store') }}">
    @csrf

    <label>Estudiante</label><br>
    <select name="id_estudiante" required>
        <option value="">Seleccione</option>
        @foreach($estudiantes as $est)
            <option value="{{ $est->id_estudiante }}">{{ $est->nombre }}</option>
        @endforeach
    </select><br><br>

    <label>Oferta</label><br>
    <select name="id_oferta" required>
        <option value="">Seleccione</option>
        @foreach($ofertas as $o)
            <option value="{{ $o->id_oferta }}">
                {{ $o->titulo }} - {{ $o->empresa->nombre_empresa }}
            </option>
        @endforeach
    </select><br><br>

    <label>Fecha de Entrega</label><br>
    <input type="date" name="fecha_entrega" required><br><br>

    <label>Calificación (0 - 100)</label><br>
    <input type="number" step="0.01" name="calificacion" min="0" max="100"><br><br>

    <label>Comentarios</label><br>
    <textarea name="comentarios"></textarea><br><br>

    <button type="submit">Guardar Informe</button>
</form>

</body>
</html>
