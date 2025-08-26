<?php

declare(strict_types=1);

namespace App\Game\Core\Features\Professions\Application;

use App\Shared\Filament\Registrar;

class ProfessionRegistrar extends Registrar
{
    private const string RESOURCE_PATH = 'Game/Core/Features/Professions';
    private const string RESOURCE_NAMESPACE = 'App\\Game\\Core\\Features\\Professions';

    protected function resource(): array
    {
        return [
            'in' => self::RESOURCE_PATH,
            'for' => self::RESOURCE_NAMESPACE,
        ];
    }
}
