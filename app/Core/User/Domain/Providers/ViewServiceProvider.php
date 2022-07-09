<?php

declare(strict_types=1);

namespace Aquelarre\Core\User\Domain\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\View\Compilers\BladeCompiler;

class ViewServiceProvider extends ServiceProvider
{
    private const USER_NAMESPACE = 'Aquelarre\\Core\\User\\Presentation\\Components';
    private const USER_ANONYMOUS_NAMESPACE = 'Core/User/Presentation/Resources/views';
    private const USER_PREFIX = 'user';

    public function boot(): void
    {
        $this->loadViewsFrom(
            app_path('Core/User/Presentation/Resources/views'),
            'user'
        );

        /** @var BladeCompiler $bladeCompiler */
        $bladeCompiler = $this->app->make(abstract: BladeCompiler::class);
        $bladeCompiler->componentNamespace(namespace: self::USER_NAMESPACE, prefix: self::USER_PREFIX);
        $bladeCompiler->anonymousComponentNamespace(
            directory: app_path(path: self::USER_ANONYMOUS_NAMESPACE),
            prefix: self::USER_PREFIX
        );
    }
}
