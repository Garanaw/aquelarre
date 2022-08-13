<?php

declare(strict_types=1);

use Illuminate\Routing\Router;

/** @var Router $router */
$router = app(Router::class);

Aquelarre\Debug::$debug = true;
$router->view('/', 'static::welcome')->name('home');
Aquelarre\Debug::$debug = false;
