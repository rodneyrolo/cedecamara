<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Cedecamara</title>
    <style>
        body { font-family: Arial, sans-serif; background-color: #f4f4f4; display: flex; justify-content: center; align-items: center; height: 100vh; margin: 0; }
        .login-container { background-color: #fff; padding: 40px; border-radius: 8px; box-shadow: 0 4px 8px rgba(0,0,0,0.1); width: 100%; max-width: 400px; }
        h1 { text-align: center; color: #333; margin-bottom: 20px; }
        .form-group { margin-bottom: 20px; }
        label { display: block; margin-bottom: 8px; color: #555; }
        input, select { width: 100%; padding: 12px; border: 1px solid #ddd; border-radius: 4px; box-sizing: border-box; }
        button { width: 100%; padding: 12px; background-color: #007bff; color: white; border: none; border-radius: 4px; cursor: pointer; font-size: 16px; }
        button:hover { background-color: #0056b3; }
        .error-message { color: #d93025; font-size: 14px; margin-top: 5px; }
    </style>
</head>
<body>
    <div class="login-container">
        <h1>Cedecamara</h1>
        <form method="POST" action="{{ url('/login') }}">
            @csrf
            <div class="form-group">
                <label for="tipo_ingreso">Tipo de ingreso</label>
                <select id="tipo_ingreso" name="tipo_ingreso" required>
                    <option value="estudiante">Estudiante</option>
                    <option value="empresa">Empresa</option>
                </select>
            </div>

            <div class="form-group">
                <label for="id">ID de Usuario</label>
                <input id="id" type="text" name="id" required autofocus>
                @error('id')
                    <p class="error-message">{{ $message }}</p>
                @enderror
            </div>

            <div class="form-group">
                <button type="submit">
                    Ingresar
                </button>
            </div>
        </form>
    </div>
</body>
</html>
