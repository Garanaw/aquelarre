<?php

declare(strict_types=1);

namespace Aquelarre\Core\Framework\Providers;

use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{
    // phpcs:disable SlevomatCodingStandard.TypeHints.UselessConstantTypeHint.UselessVarAnnotation -- baseline
    /**
     * The path to the "home" route for your application.
     *
     * This is used by Laravel authentication to redirect users after login.
     *
     * @var string
     */
    // phpcs:enable SlevomatCodingStandard.TypeHints.UselessConstantTypeHint.UselessVarAnnotation -- baseline
    public const HOME = '/home';

    public function boot(): void
    {
        $this->configureRateLimiting();

        // phpcs:ignore SlevomatCodingStandard.TypeHints.ReturnTypeHint.MissingNativeTypeHint -- baseline
        $this->routes(static function () {
            Route::middleware('api')
                ->prefix('api')
                ->group(base_path('routes/api.php'));

            Route::middleware('web')
                ->group(base_path('routes/web.php'));
        });
    }

    protected function configureRateLimiting(): void
    {
        // phpcs:ignore SlevomatCodingStandard.Functions.StaticClosure.ClosureNotStatic -- baseline
        RateLimiter::for(name: 'api', callback: static function (Request $request) {
            return Limit::perMinute(maxAttempts: 60)->by(key:$request->user()?->id ?: $request->ip());
        });
    }
}
