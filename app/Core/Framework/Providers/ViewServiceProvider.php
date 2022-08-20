<?php

declare(strict_types=1);

namespace Aquelarre\Core\Framework\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\View\Compilers\BladeCompiler;

class ViewServiceProvider extends ServiceProvider
{
    private const SHARED_NAMESPACE = 'Aquelarre\\Core\\Shared\\Presentation\\Components';
    private const SHARED_ANONYMOUS_NAMESPACE = 'Core/Shared/Presentation/Resources/views';
    private const SHARED_PREFIX = 'shared';

    private static bool $booted = false;

    public function boot(): void
    {
        $sharedPath = app_path(path: self::SHARED_ANONYMOUS_NAMESPACE);

        $this->loadViewsFrom(
            path: $sharedPath,
            namespace: self::SHARED_PREFIX
        );

        /** @var BladeCompiler $blade */
        $blade = $this->app->make(abstract: BladeCompiler::class);
        $blade->componentNamespace(namespace: self::SHARED_NAMESPACE, prefix: self::SHARED_PREFIX);
        $blade->anonymousComponentNamespace(
            directory: $sharedPath,
            prefix: self::SHARED_PREFIX
        );

        self::$booted = true;
    }

    protected function isBooted(): bool
    {
        return self::$booted;
    }
}
