<?php

declare(strict_types=1);

namespace Aquelarre\Core\Books\Domain\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\View\Compilers\BladeCompiler;

class ViewServiceProvider extends ServiceProvider
{
    private const BOOKS_NAMESPACE = 'Aquelarre\\Core\\Books\\Presentation\\Components';
    private const BOOKS_ANONYMOUS_NAMESPACE = 'Core/Books/Presentation/Resources/views';
    private const BOOKS_PREFIX = 'books';

    public function boot(): void
    {
        $this->loadViewsFrom(
            path: app_path(path: 'Core/Books/Presentation/Resources/views'),
            namespace: 'books'
        );

        /** @var BladeCompiler $bladeCompiler */
        $bladeCompiler = $this->app->make(abstract: BladeCompiler::class);
        $bladeCompiler->componentNamespace(namespace: self::BOOKS_NAMESPACE, prefix: self::BOOKS_PREFIX);
        $bladeCompiler->anonymousComponentNamespace(
            directory: app_path(path: self::BOOKS_ANONYMOUS_NAMESPACE),
            prefix: self::BOOKS_PREFIX
        );
    }
}
