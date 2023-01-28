<?php

declare(strict_types=1);

use Aquelarre\Spell\Application\Actions\Index;
use Illuminate\Routing\Router;

/** @var Router $router */
$router = app(Router::class);

$router->match(['GET', 'POST'], '/', Index::class)
    ->middleware(middleware: 'web')
    ->name('spell.index');
