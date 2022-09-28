<?php

declare(strict_types=1);

namespace Aquelarre\Character\Application\Actions;

use Illuminate\Contracts\View\View;
use Illuminate\View\Factory;

class Create
{
    public function __invoke(Factory $view, string $method): View
    {
        return $view->make('character::create', [
            'method' => $method,
        ]);
    }
}
