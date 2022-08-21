<?php

declare(strict_types=1);
namespace Aquelarre\Character\Domain\Providers;

use Aquelarre\Core\Framework\Providers\ViewServiceProvider as SharedViewServiceProvider;
use Illuminate\View\Compilers\BladeCompiler;

class ViewServiceProvider extends SharedViewServiceProvider
{
    private const CHARACTER_NAMESPACE = 'Aquelarre\\Character\\Presentation\\Components';
    private const CHARACTER_ANONYMOUS_NAMESPACE = 'Character/Presentation/Resources/views';
    private const CHARACTER_PREFIX = 'character';

    public function boot(): void
    {
        if (parent::isBooted() === false) {
            parent::boot();
        }

        $this->loadViewsFrom(
            path: app_path(path: self::CHARACTER_ANONYMOUS_NAMESPACE),
            namespace: self::CHARACTER_PREFIX
        );

        /** @var BladeCompiler $bladeCompiler */
        $bladeCompiler = $this->app->make(abstract: BladeCompiler::class);
        $bladeCompiler->componentNamespace(namespace: self::CHARACTER_NAMESPACE, prefix: self::CHARACTER_PREFIX);
        $bladeCompiler->anonymousComponentNamespace(
            directory: app_path(path: self::CHARACTER_ANONYMOUS_NAMESPACE),
            prefix: self::CHARACTER_PREFIX
        );
    }
}
