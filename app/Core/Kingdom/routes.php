<?php

declare(strict_types=1);

use Aquelarre\Core\Kingdom\Application\Actions\Roll;
use Illuminate\Routing\Router;

/** @var Router $router */
$router = app(Router::class);

$router->get('roll', Roll::class)->name('kingdom.roll');
