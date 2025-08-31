<?php

declare(strict_types=1);

namespace App\Providers;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Routing\RouteRegistrar as Registrar;

class RouteRegistrar
{
    public function __invoke(Application $app): void
    {
        $router = $app->make(Registrar::class);

        $router->group(app_path('Character/routes.php'));
    }
}
