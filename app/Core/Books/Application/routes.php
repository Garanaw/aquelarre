<?php

declare(strict_types=1);

use Aquelarre\Core\Books\Application\Actions\Index;
use Illuminate\Routing\Router;

/** @var Router $router */
$router = app(Router::class);

$router->get('/', Index::class);
$router->post('/', Index::class);
