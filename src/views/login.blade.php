@extends('layouts.app')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8 bg-light d-flex justify-content-center align-items-center p-5"> <img
                    src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/draw2.svg"
                    class="img-fluid full-height" alt="Phone image"> </div>
            <div class="col-md-4 p-5">
                <h1 class="text-center mb-4 mt-2">Autenticación de Usuario</h1>
                <form>
                    <div class="mb-3">
                        <label for="email" class="form-label">Correo Electrónico</label>
                        <input type="email" class="form-control" id="email" name="email"
                            placeholder="Ingrese su correo" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Contraseña</label>
                        <input type="password" class="form-control" id="password" name="password"
                            placeholder="Ingrese su contraseña" required>
                    </div>
                    <div class="mb-3 d-flex justify-content-between align-items-center">
                        <div>
                            <input type="checkbox" class="form-check-input" id="remember">
                            <label class="form-check-label" for="remember">Recordarme</label>
                        </div>
                        <a href="#" class="text-decoration-none">¿Olvidaste tu contraseña?</a>
                    </div>
                    <div class="d-grid mt-4">
                        <button type="submit" class="btn btn-primary">Iniciar Sesión</button>
                    </div>
                </form>
                <div class="text-center mt-4">
                    <p>¿No tienes una cuenta? <a href="{{ route('register') }}"
                            class="text-decoration-none fw-bold">Regístrate aquí</a></p>
                </div>
            </div>
        </div>
    </div>
@endsection
