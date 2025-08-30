<?php

declare(strict_types=1);

namespace App\Game\Core\Features\Rituals;

use App\Shared\Filament\Registrar;

class RitualsRegistrar extends Registrar
{
    protected function resource(): array
    {
        return [
            'in' => 'Game/Core/Features/Rituals/Application',
            'for' => 'App\\Game\\Core\\Features\\Rituals\\Application',
        ];
    }
}
