<?php

declare(strict_types=1);

use App\Character\Application\Actions\Create;
use Illuminate\Routing\Router;

$router =  resolve(Router::class);

$router->group(['prefix' => 'characters', 'middleware' => ['web', 'auth']], function (Router $router) {
    $router->get('create/{method}', Create::class)
        ->name('characters.create')
        ->where('method', 'classic|free');
});
