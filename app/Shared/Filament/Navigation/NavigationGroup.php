<?php

declare(strict_types=1);

namespace App\Shared\Filament\Navigation;

use BackedEnum;
use Filament\Support\Contracts\HasIcon;
use Filament\Support\Icons\Heroicon;

enum NavigationGroup implements HasIcon
{
    case ACL;
    case CORE;

    public function getIcon(): string|BackedEnum|null
    {
        return match ($this) {
            self::ACL => Heroicon::Key,
            self::CORE => Heroicon::Cog8Tooth,
        };
    }
}
