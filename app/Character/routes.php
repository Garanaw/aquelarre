<?php

declare(strict_types=1);

use App\Character\Application\Actions\Create;
use App\Shared\Routing\Middleware\MiddlewareStore;
use Illuminate\Routing\Router;

$router =  resolve(Router::class);

$commonMiddleware = MiddlewareStore::commonMiddleware();

$router->group([
    'prefix' => 'characters',
    'middleware' => [
        ...$commonMiddleware,
        'web',
        'auth',
    ]
], function (Router $router) {
    $router->get('create/{method}', Create::class)
        ->name('characters.create')
        ->where('method', 'classic|free');
});
