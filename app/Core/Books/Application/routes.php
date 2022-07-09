<?php

declare(strict_types=1);

use Aquelarre\Core\Books\Application\Actions\Index;
use Illuminate\Routing\Router;

/** @var Router $router */
$router = app(Router::class);

$router->get(uri: '/', action: Index::class);
$router->post(uri: '/', action: Index::class);
