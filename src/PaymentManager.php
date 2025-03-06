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

        // Cargar vistas
        $this->loadViewsFrom(__DIR__ . '/views', 'payment-manager');

        // Publicar vistas para que el usuario pueda sobrescribirlas
        $this->publishes([
            __DIR__ . '/views' => resource_path('views/auth'),
        ]);

        // Publicar rutas
        $this->publishes([
            __DIR__ . '/routes' => base_path('routes'),
        ]);

        // Publicar controladores (si están en un directorio personalizado)
        $this->publishes([
            __DIR__ . '/controllers' => app_path('Http/Controllers/Auth'),
        ]);
        
    }

    public function register()
    {
        // Opcional: Puedes hacer bindings de clases aquí
    }
}
