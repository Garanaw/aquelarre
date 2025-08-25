<?php

declare(strict_types=1);

namespace App\Game\Core\Features\Kingdom\Application;

use App\Shared\Filament\Registrar;

class KingdomRegistrar extends Registrar
{
    private const string RESOURCE_PATH = 'Game/Core/Features/Kingdom/Application';
    private const string RESOURCE_NAMESPACE = 'App\\Game\\Core\\Features\\Kingdom\\Application';

    protected function resource(): array
    {
        return [
            'in' => self::RESOURCE_PATH,
            'for' => self::RESOURCE_NAMESPACE,
        ];
    }
}
