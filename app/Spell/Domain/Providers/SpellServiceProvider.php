<?php

declare(strict_types=1);

namespace Aquelarre\Spell\Domain\Providers;

use Aquelarre\Core\Framework\Providers\ViewServiceProvider as SharedViewServiceProvider;
use Illuminate\View\Compilers\BladeCompiler;

class SpellServiceProvider extends SharedViewServiceProvider
{
    private const SPELL_NAMESPACE = 'Aquelarre\\Spell\\Presentation\\Components';
    private const SPELL_ANONYMOUS_NAMESPACE = 'Spell/Presentation/Resources/views';
    private const SPELL_PREFIX = 'spell';

    public function boot(): void
    {
        if (parent::isBooted() === false) {
            parent::boot();
        }

        $this->loadViewsFrom(
            path: app_path(path: self::SPELL_ANONYMOUS_NAMESPACE),
            namespace: self::SPELL_PREFIX
        );

        /** @var BladeCompiler $bladeCompiler */
        $bladeCompiler = $this->app->make(abstract: BladeCompiler::class);
        $bladeCompiler->componentNamespace(namespace: self::SPELL_NAMESPACE, prefix: self::SPELL_PREFIX);
        $bladeCompiler->anonymousComponentNamespace(
            directory: app_path(path: self::SPELL_ANONYMOUS_NAMESPACE),
            prefix: self::SPELL_PREFIX
        );
    }
}
