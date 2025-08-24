<?php

declare(strict_types=1);

namespace App\Books\Application;

use App\Shared\Filament\Registrar;

class BookRegistrar extends Registrar
{
    protected function resource(): array
    {
        return [
            'in' => 'Books/Application',
            'for' => 'App\\Books\\Application',
        ];
    }
}
