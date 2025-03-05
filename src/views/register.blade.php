<!DOCTYPE html>
<html lang="es">

<head>
    <title>Registro</title>
</head>

<body>
    <h2>Registro de Usuario</h2>
    <form method="POST" action="{{ route('register') }}">
        @csrf
        <input type="text" name="name" required placeholder="Nombre">
        <input type="email" name="email" required placeholder="Correo">
        <input type="password" name="password" required placeholder="Contraseña">
        <input type="password" name="password_confirmation" required placeholder="Confirmar Contraseña">
        <button type="submit">Registrarse</button>
    </form>
    <a href="{{ route('login') }}">Iniciar Sesión</a>
</body>

</html>
