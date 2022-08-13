<?php

declare(strict_types=1);

use Illuminate\Routing\Router;

/** @var Router $router */
$router = app(Router::class);

$router->view('/', 'static::welcome')->name('home');
