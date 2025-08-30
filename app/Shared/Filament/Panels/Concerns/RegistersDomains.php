<?php

declare(strict_types=1);

namespace App\Shared\Filament\Panels\Concerns;

use App\Shared\Filament\Registrar;
use Filament\Panel;

trait RegistersDomains
{
    protected function registerDomains(Panel $panel, array $registrars): Panel
    {
        return collect($registrars)
            ->map(fn (string $registrar): Registrar => resolve($registrar))
            ->reduce(
                static fn (Panel $panel, Registrar $registrar) => $registrar->register($panel),
                $panel,
            );
    }
}
