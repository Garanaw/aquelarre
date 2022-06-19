<?php

declare(strict_types=1);

namespace Aquelarre\Core\User\Domain\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\View\Compilers\BladeCompiler;

class BladeServiceProvider extends ServiceProvider
{
    private const USER_NAMESPACE = 'Aquelarre\\Core\\User\\Presentation\\Components';
    private const USER_ANONYMOUS_NAMESPACE = 'Core/User/Presentation/Resources/views';
    private const USER_PREFIX = 'user';

    protected BladeCompiler $bladeCompiler;

    public function boot(): void
    {
        $this->bladeCompiler = $this->app->make(abstract: BladeCompiler::class);

        $this->bladeCompiler->componentNamespace(namespace: self::USER_NAMESPACE, prefix: self::USER_PREFIX);
        $this->bladeCompiler->anonymousComponentNamespace(
            directory: app_path(path: self::USER_ANONYMOUS_NAMESPACE),
            prefix: self::USER_PREFIX
        );

        $this->loadViewsFrom(
            path: app_path(path: self::USER_ANONYMOUS_NAMESPACE),
            namespace: self::USER_PREFIX
        );
    }
}
