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
        $blade = $this->app->make(BladeCompiler::class);
        $blade->componentNamespace(self::SHARED_NAMESPACE, self::SHARED_PREFIX);
        $blade->anonymousComponentNamespace(app_path(self::SHARED_ANONYMOUS_NAMESPACE), self::SHARED_PREFIX);
    }
}
