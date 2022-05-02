<?php

declare(strict_types=1);

namespace Domain\Shared\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\View\Compilers\BladeCompiler;

class BladeServiceProvider extends ServiceProvider
{
    private const SHARED_NAMESPACE = 'Presentation\\Shared\\Components';
    private const SHARED_PREFIX = 'shared';

    protected BladeCompiler $bladeCompiler;

    public function boot(): void
    {
        $this->bladeCompiler = $this->app->make(BladeCompiler::class);
        $this->bladeCompiler->componentNamespace(self::SHARED_NAMESPACE, self::SHARED_PREFIX);

        if (method_exists($this, 'registerDomainComponents')) {
            $this->registerDomainComponents();
        }
    }
}
