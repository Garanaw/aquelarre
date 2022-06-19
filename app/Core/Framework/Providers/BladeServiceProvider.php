<?php

declare(strict_types=1);

namespace Aquelarre\Core\Framework\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\View\Compilers\BladeCompiler;

class BladeServiceProvider extends ServiceProvider
{
    private const SHARED_NAMESPACE = 'Aquelarre\\Core\\Shared\\Presentation\\Components';
    private const SHARED_ANONYMOUS_NAMESPACE = 'Core/Shared/Presentation/Resources/views';
    private const SHARED_PREFIX = 'shared';

    public function boot(): void
    {
        /** @var BladeCompiler $blade */
        $blade = $this->app->make(abstract: BladeCompiler::class);

        $blade->componentNamespace(namespace: self::SHARED_NAMESPACE, prefix: self::SHARED_PREFIX);
        $blade->anonymousComponentNamespace(
            directory: app_path(path: self::SHARED_ANONYMOUS_NAMESPACE),
            prefix: self::SHARED_PREFIX
        );

        $this->loadViewsFrom(
            path: app_path(path: self::SHARED_ANONYMOUS_NAMESPACE),
            namespace: self::SHARED_PREFIX
        );
    }
}
