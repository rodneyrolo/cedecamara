<!DOCTYPE html>
<html>
<head>
    <title>Detalle de Oferta</title>
</head>
<body>
    <h2>{{ $oferta->titulo }}</h2>

    <p><strong>Empresa:</strong> {{ $oferta->empresa->nombre_empresa }}</p>
    <p><strong>Descripción:</strong> {{ $oferta->descripcion }}</p>
    <p><strong>Fecha publicación:</strong> {{ $oferta->fecha_publicacion }}</p>
    <p><strong>Estado:</strong> {{ $oferta->estado }}</p>

    <hr>

    <h3>Postularse a esta oferta</h3>

    @if(session('success'))
        <p style="color:green;">{{ session('success') }}</p>
    @endif

    @if(session('error'))
        <p style="color:red;">{{ session('error') }}</p>
    @endif

    <form method="POST" action="{{ route('postulacion.store') }}">
        @csrf

        <!-- Aquí pones temporalmente un ID de estudiante de prueba -->
        <input type="hidden" name="id_estudiante" value="1">

        <input type="hidden" name="id_oferta" value="{{ $oferta->id_oferta }}">

        <label>Comentario (opcional):</label><br>
        <textarea name="comentario"></textarea><br><br>

        <button type="submit">Postular</button>
    </form>

</body>
</html>
