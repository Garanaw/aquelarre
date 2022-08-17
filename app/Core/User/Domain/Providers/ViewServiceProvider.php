<?php

declare(strict_types=1);

namespace Aquelarre\Core\User\Domain\Providers;

use Aquelarre\Core\Framework\Providers\ViewServiceProvider as SharedViewServiceProvider;
use Illuminate\View\Compilers\BladeCompiler;

class ViewServiceProvider extends SharedViewServiceProvider
{
    private const USER_NAMESPACE = 'Aquelarre\\Core\\User\\Presentation\\Components';
    private const USER_ANONYMOUS_NAMESPACE = 'Core/User/Presentation/Resources/views';
    private const USER_PREFIX = 'user';

    public function boot(): void
    {
        if (parent::isBooted() === false) {
            parent::boot();
        }

        $this->loadViewsFrom(
            path: app_path(path: self::USER_ANONYMOUS_NAMESPACE),
            namespace: self::USER_PREFIX
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
