<?php

declare(strict_types=1);

namespace App\Providers\Filament;

use Illuminate\Support\AggregateServiceProvider;

class PanelsProvider extends AggregateServiceProvider
{
    protected $providers = [
        AdminPanelProvider::class,
        UserPanelProvider::class,
    ];
}
