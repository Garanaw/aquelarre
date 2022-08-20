<?php

declare(strict_types=1);

namespace Aquelarre\Static\Domain\Providers;

use Aquelarre\Core\Framework\Providers\ViewServiceProvider as SharedViewServiceProvider;
use Illuminate\View\Compilers\BladeCompiler;

class ViewServiceProvider extends SharedViewServiceProvider
{
    private const STATIC_NAMESPACE = 'Aquelarre\\Static\\Presentation\\Components';
    private const STATIC_ANONYMOUS_NAMESPACE = 'Static/Presentation/Resources/views';
    private const STATIC_PREFIX = 'static';

    public function boot(): void
    {
        if (parent::isBooted() === false) {
            parent::boot();
        }

        $this->loadViewsFrom(
            path: app_path(path: 'Static/Presentation/Resources/views'),
            namespace: self::STATIC_PREFIX
        );

        /** @var BladeCompiler $bladeCompiler */
        $bladeCompiler = $this->app->make(abstract: BladeCompiler::class);
        $bladeCompiler->componentNamespace(namespace: self::STATIC_NAMESPACE, prefix: self::STATIC_PREFIX);
        $bladeCompiler->anonymousComponentNamespace(
            directory: app_path(path: self::STATIC_ANONYMOUS_NAMESPACE),
            prefix: self::STATIC_PREFIX
        );
    }
}
