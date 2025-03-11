@extends('layouts.admin')
@section('content')
    <style>
        /* Main color variables */
        :root {
            --primary-color: #4361ee;
            --secondary-color: #3f37c9;
            --accent-color: #4cc9f0;
            --success-color: #4ade80;
            --warning-color: #fbbf24;
            --danger-color: #f87171;
            --light-bg: #f8f9fa;
            --dark-bg: #1e293b;
            --text-light: #f8fafc;
            --text-dark: #1e293b;
            --border-radius: 12px;
            --box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
        }

        /* Sidebar styling */
        .sidebar {
            background: linear-gradient(135deg, var(--dark-bg) 0%, #0f172a 100%);
            transition: all 0.3s ease;
            box-shadow: var(--box-shadow);
            z-index: 1000;
        }

        .sidebar .nav-link {
            border-radius: var(--border-radius);
            margin-bottom: 5px;
            transition: all 0.3s ease;
            padding: 10px 15px;
        }

        .sidebar .nav-link:hover {
            background-color: rgba(255, 255, 255, 0.1);
            transform: translateX(5px);
        }

        .sidebar .nav-link.active {
            background-color: var(--primary-color);
        }

        .sidebar .nav-link i {
            font-size: 1.2rem;
        }

        .sidebar h4 {
            font-weight: 700;
            background: linear-gradient(to right, var(--accent-color), var(--primary-color));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            margin-bottom: 20px;
            padding-bottom: 10px;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }

        /* Main content area */
        main {
            background-color: var(--light-bg);
            min-height: 100vh;
            transition: all 0.3s ease;
        }

        /* Card styling */
        .card {
            border-radius: var(--border-radius);
            border: none;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
            overflow: hidden;
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: var(--box-shadow);
        }

        .card-body {
            padding: 1.5rem;
        }

        .card h5 {
            font-size: 1.1rem;
            font-weight: 700;
            color: var(--text-dark);
        }

        .card p {
            font-size: 0.9rem;
        }

        .card h3 {
            font-weight: 700;
            font-size: 2rem;
        }

        .card h3.text-primary {
            color: var(--primary-color) !important;
        }

        .card h3.text-success {
            color: var(--success-color) !important;
        }

        .card h3.text-warning {
            color: var(--warning-color) !important;
        }

        /* Alert styling */
        .alert {
            border-radius: var(--border-radius);
            border: none;
            background-color: rgba(67, 97, 238, 0.1);
            border-left: 4px solid var(--primary-color);
            color: var(--text-dark);
        }

        /* Button styling */
        .btn {
            border-radius: var(--border-radius);
            padding: 8px 16px;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .btn-primary {
            background-color: var(--primary-color);
            border-color: var(--primary-color);
        }

        .btn-primary:hover {
            background-color: var(--secondary-color);
            border-color: var(--secondary-color);
        }

        .btn-danger {
            background-color: var(--danger-color);
            border-color: var(--danger-color);
        }

        /* Mobile sidebar toggle */
        #showSidebar {
            border-radius: var(--border-radius);
        }

        /* Show sidebar on mobile when activated */
        @media (max-width: 767.98px) {
            .sidebar {
                position: fixed;
                top: 0;
                left: -100%;
                width: 250px;
                height: 100vh;
                z-index: 1050;
                transition: left 0.3s ease;
            }

            .sidebar.show {
                left: 0;
            }
        }

        /* Dashboard welcome heading */
        h2.fw-bold {
            color: var(--text-dark);
            position: relative;
            padding-bottom: 10px;
        }

        h2.fw-bold:after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 50px;
            height: 3px;
            background: linear-gradient(to right, var(--primary-color), var(--accent-color));
            border-radius: 3px;
        }
    </style>
    <div class="container-fluid p-0 overflow-hidden">
        <div class="row g-0">
            <!-- Sidebar con altura completa -->
            <nav class="col-md-3 col-lg-2 bg-dark sidebar" id="sidebar">
                <div class="d-flex flex-column h-100 p-3">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h4 class="text-white m-0">Admin Panel</h4>
                        <button class="btn btn-sm btn-outline-light d-md-none" id="closeSidebar">
                            <i class="bi bi-x-lg"></i>
                        </button>
                    </div>

                    <ul class="nav flex-column mb-auto">
                        <li class="nav-item mb-3">
                            <a class="nav-link text-white d-flex align-items-center" href="#">
                                <i class="bi bi-speedometer2 me-2"></i> Dashboard
                            </a>
                        </li>
                        <li class="nav-item mb-3">
                            <a class="nav-link text-white d-flex align-items-center" href="#">
                                <i class="bi bi-people me-2"></i> Usuarios
                            </a>
                        </li>
                        <li class="nav-item mb-3">
                            <a class="nav-link text-white d-flex align-items-center" href="#">
                                <i class="bi bi-gear me-2"></i> Configuraciones
                            </a>
                        </li>
                    </ul>

                    <div class="mt-auto">
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit"
                                class="btn btn-danger w-100 d-flex align-items-center justify-content-center">
                                <i class="bi bi-box-arrow-right me-2"></i> Cerrar Sesión
                            </button>
                        </form>
                    </div>
                </div>
            </nav>

            <!-- Contenido principal -->
            <main class="col-md-9 col-lg-10 ms-md-auto px-md-4 py-4">
                <!-- Botón para mostrar sidebar en móvil -->
                <div class="d-md-none mb-3">
                    <button class="btn btn-dark" id="showSidebar">
                        <i class="bi bi-list"></i> Menú
                    </button>
                </div>

                <div
                    class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
                    <h2 class="fw-bold">Bienvenido al Dashboard</h2>
                </div>

                <div class="alert alert-primary" role="alert">
                    <strong>Hola, {{ auth()->user()->name }}!</strong> Esperamos que tengas un excelente día gestionando tu
                    plataforma.
                </div>

                <div class="row g-4">
                    <div class="col-12 col-md-4">
                        <div class="card shadow-sm border-0 h-100">
                            <div class="card-body">
                                <h5 class="fw-bold">Usuarios Activos</h5>
                                <p class="text-muted">Cantidad de usuarios registrados recientemente.</p>
                                <h3 class="text-primary mb-0">245</h3>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-md-4">
                        <div class="card shadow-sm border-0 h-100">
                            <div class="card-body">
                                <h5 class="fw-bold">Nuevas Órdenes</h5>
                                <p class="text-muted">Órdenes recibidas en las últimas 24 horas.</p>
                                <h3 class="text-success mb-0">58</h3>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-md-4">
                        <div class="card shadow-sm border-0 h-100">
                            <div class="card-body">
                                <h5 class="fw-bold">Ingresos</h5>
                                <p class="text-muted">Ganancias generadas esta semana.</p>
                                <h3 class="text-warning mb-0">$5,340</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const sidebar = document.getElementById('sidebar');
            const showSidebar = document.getElementById('showSidebar');
            const closeSidebar = document.getElementById('closeSidebar');

            // Mostrar sidebar en móvil
            if (showSidebar) {
                showSidebar.addEventListener('click', function() {
                    sidebar.classList.add('show');
                });
            }

            // Cerrar sidebar en móvil
            if (closeSidebar) {
                closeSidebar.addEventListener('click', function() {
                    sidebar.classList.remove('show');
                });
            }
        });
    </script>
@endsection
