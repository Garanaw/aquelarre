<?php

declare(strict_types=1);

namespace Aquelarre\Core\User\Domain\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\View\Compilers\BladeCompiler;

/**
 * @deprecated Use Aquelarre\Core\User\Domain\Providers\ViewServiceProvider instead.
 */
class BladeServiceProvider extends ServiceProvider
{
    private const USER_NAMESPACE = 'Aquelarre\\Core\\User\\Presentation\\Components';
    private const USER_ANONYMOUS_NAMESPACE = 'Core/User/Presentation/Resources/views';
    private const USER_PREFIX = 'user';

    protected BladeCompiler $bladeCompiler;

    public function boot(): void
    {
        $this->bladeCompiler = $this->app->make(BladeCompiler::class);
        $this->bladeCompiler->componentNamespace(self::USER_NAMESPACE, self::USER_PREFIX);
        $this->bladeCompiler->anonymousComponentNamespace(app_path(self::USER_ANONYMOUS_NAMESPACE), self::USER_PREFIX);
    }
}
