<?php

declare(strict_types=1);

use App\Game\Core\Features\Kingdom\Application\Actions\Roll;
use App\Shared\Routing\Middleware\MiddlewareStore;
use Illuminate\Routing\Router;

$router = resolve(Router::class);

$commonMiddleware = MiddlewareStore::commonMiddleware();

$router->group([
    'prefix' => 'kingdoms',
    'middleware' => [
        ...$commonMiddleware,
        'web',
        'auth',
    ]
], function (Router $router) {
    $router->get('/roll', Roll::class)
        ->name('kingdoms.roll');
});
