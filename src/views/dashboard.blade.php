<!DOCTYPE html>
<html lang="es">

<head>
    <title>Dashboard</title>
</head>

<body>
    <h2>Bienvenido al Dashboard</h2>
    <p>Hola, {{ auth()->user()->name }}</p>
    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit">Cerrar Sesión</button>
    </form>
</body>

</html>
