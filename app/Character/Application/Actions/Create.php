<?php

declare(strict_types=1);

namespace App\Character\Application\Actions;

use Illuminate\Contracts\View\View;
use Illuminate\View\Factory;

class Create
{
    public function __invoke(
        string $method,
        Factory $view,
    ): View {
        return $view->make('character.create.create', [
            'mode' => $method,
        ]);
    }
}
