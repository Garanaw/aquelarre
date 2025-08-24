<?php

declare(strict_types=1);

namespace App\Game\Core\Features\Characteristics\Application;

use App\Shared\Filament\Registrar;

class CharacteristicsRegistrar extends Registrar
{
    private const string RESOURCE_PATH = 'Game/Core/Features/Characteristics/Application';
    private const string RESOURCE_NAMESPACE = 'App\\Game\\Core\\Features\\Characteristics\\Application';

    protected function resource(): array
    {
        return [
            'in' => self::RESOURCE_PATH,
            'for' => self::RESOURCE_NAMESPACE,
        ];
    }
}
