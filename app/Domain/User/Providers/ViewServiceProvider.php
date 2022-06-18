<?php

declare(strict_types=1);

namespace Domain\User\Providers;

use Illuminate\Support\ServiceProvider;

class ViewServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        $this->loadViewsFrom(
            app_path('Presentation/User/Resources/views'),
            'user'
        );
    }
}
