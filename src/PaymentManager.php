<?php

namespace VilaxDev\PaymentManager;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;

class PaymentManager extends ServiceProvider
{
    public function boot()
    {
        // Cargar rutas
        $this->loadRoutesFrom(__DIR__ . '/routes/auth.php');

        // Cargar vistas desde resources/views/auth
        $this->loadViewsFrom(resource_path('views/auth'), 'payment-manager');

        // Publicar vistas para que el usuario pueda sobrescribirlas
        $this->publishes([
            __DIR__ . '/views' => resource_path('views/auth'),
        ], 'payment-manager');  // Aquí es donde asignas el tag 'payment-manager'

        // Publicar rutas
        $this->publishes([
            __DIR__ . '/routes' => base_path('routes'),
        ], 'payment-manager');  // Asegúrate de agregar el mismo tag

        // Publicar controladores
        $this->publishes([
            __DIR__ . '/controllers' => app_path('Http/Controllers/Auth'),
        ], 'payment-manager');  // Asegúrate de agregar el mismo tag
    }


    public function register()
    {
        // Opcional: Puedes hacer bindings de clases aquí
    }
}
