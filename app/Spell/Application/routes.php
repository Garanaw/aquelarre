<?php

declare(strict_types=1);

use Aquelarre\Spell\Application\Actions\Index;
use Aquelarre\Spell\Application\Actions\Show;
use Illuminate\Routing\Router;

/** @var Router $router */
$router = app(Router::class);

$router->match(['GET', 'POST'], '/', Index::class)
    ->middleware(middleware: 'web')
    ->name('spell.index');

$router->get(uri: '/{spell}', action: Show::class)
    ->middleware(middleware: 'web')
    ->name(name: 'spell.show');
