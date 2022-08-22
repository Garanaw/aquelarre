<?php

declare(strict_types=1);

use Aquelarre\Character\Application\Actions\Create;
use Illuminate\Routing\Router;

/** @var Router $router */
$router = app(Router::class);

$router->get(uri: '/create/{method}', action: Create::class)
    ->middleware(middleware: ['web'])
    ->name(name: 'create')
    ->where('method', 'classic|free');
