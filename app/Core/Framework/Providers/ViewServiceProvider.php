<?php

declare(strict_types=1);

namespace Aquelarre\Core\Framework\Providers;

use Illuminate\Support\ServiceProvider;

class ViewServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        $this->loadViewsFrom(
            app_path('Presentation/Shared/Resources/views'),
            'shared'
        );
    }
}

