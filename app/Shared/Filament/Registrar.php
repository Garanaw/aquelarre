<?php

declare(strict_types=1);

namespace App\Shared\Filament;

use Filament\Panel;

abstract class Registrar
{
    public function register(Panel $panel): Panel
    {
        if ($resource = $this->resource()) {
            $panel->discoverResources(
                in: app_path($resource['in']),
                for: $resource['for'],
            );
        } else {
            throw new \RuntimeException(
                'No resource defined for ' . static::class
            );
        }

        if ($clusters = $this->cluster()) {
            $panel->discoverClusters(
                in: app_path($clusters['in']),
                for: $clusters['for'],
            );
        }

        if ($widgets = $this->widgets()) {
            $panel->discoverWidgets(
                in: app_path($widgets['in']),
                for: $widgets['for'],
            );
        }

        if ($pages = $this->pages()) {
            $panel->discoverPages(
                in: app_path($pages['in']),
                for: $pages['for'],
            );
        }

        return $panel;
    }

    abstract protected function resource(): array;

    protected function cluster(): ?array
    {
        return null;
    }

    protected function widgets(): ?array
    {
        return null;
    }

    protected function pages(): ?array
    {
        return null;
    }
}
