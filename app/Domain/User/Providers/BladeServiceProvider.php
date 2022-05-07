<?php

declare(strict_types=1);

namespace Domain\User\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\View\Compilers\BladeCompiler;

class BladeServiceProvider extends ServiceProvider
{
    private const USER_NAMESPACE = 'Presentation\\User\\Components';
    private const USER_PREFIX = 'user';

    protected BladeCompiler $bladeCompiler;

    public function boot(): void
    {
        $this->bladeCompiler = $this->app->make(BladeCompiler::class);
        $this->bladeCompiler->componentNamespace(self::USER_NAMESPACE, self::USER_PREFIX);
    }
}
