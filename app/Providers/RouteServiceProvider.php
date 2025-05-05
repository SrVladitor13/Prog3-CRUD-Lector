<?php

namespace App\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * Define tu ruta principal del "home" después del login.
     *
     * @var string
     */
    public const HOME = '/home';

    /**
     * Registra las rutas para la aplicación.
     */
    public function boot(): void
    {
        $this->routes(function () {
            // Rutas API
            Route::prefix('api')
                ->middleware('api')
                ->group(base_path('routes/api.php'));

            // Rutas web
            Route::middleware('web')
                ->group(base_path('routes/web.php'));
        });
    }
}
