<?php

declare(strict_types=1);

namespace Domain\Shared\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\View\Compilers\BladeCompiler;

class BladeServiceProvider extends ServiceProvider
{
    private const SHARED_NAMESPACE = 'Presentation\\Shared\\Components';
    private const SHARED_ANONYMOUS_NAMESPACE = 'Presentation\\Shared\\Resources\\views';
    private const SHARED_PREFIX = 'shared';

    protected BladeCompiler $bladeCompiler;

    public function boot(): void
    {
        $this->bladeCompiler = $this->app->make(BladeCompiler::class);
        $this->bladeCompiler->componentNamespace(self::SHARED_NAMESPACE, self::SHARED_PREFIX);
        $this->bladeCompiler->anonymousComponentNamespace(app_path(self::SHARED_ANONYMOUS_NAMESPACE), self::SHARED_PREFIX);
    }
}
