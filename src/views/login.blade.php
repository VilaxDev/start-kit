<!DOCTYPE html>
<html lang="es">
<head>
    <title>Login</title>
</head>
<body>
    <h2>Iniciar Sesión</h2>
    <form method="POST" action="{{ route('login') }}">
        @csrf
        <input type="email" name="email" required placeholder="Correo">
        <input type="password" name="password" required placeholder="Contraseña">
        <button type="submit">Ingresar</button>
    </form>
    <a href="{{ route('register') }}">Registrarse</a>
</body>
</html>
