<?php

declare(strict_types=1);

namespace App\Game\Core\Features\Spells;

use App\Shared\Filament\Registrar;

class SpellRegistrar extends Registrar
{
    private const string RESOURCE_PATH = 'Game/Core/Features/Spells/Spell/Application';
    private const string RESOURCE_NAMESPACE = 'App\\Game\\Core\\Features\\Spells\\Spell\\Application';

    protected function resource(): array
    {
        return [
            'in' => self::RESOURCE_PATH,
            'for' => self::RESOURCE_NAMESPACE,
        ];
    }
}
