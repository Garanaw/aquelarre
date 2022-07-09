<?php

declare(strict_types=1);

namespace Aquelarre\Core\Framework\Providers;

use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Routing\Router;
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
        $this->routes(function (): void {
            Route::middleware('api')
                ->prefix('api')
                ->group(base_path('routes/api.php'));

            Route::middleware('web')
                ->group(base_path('routes/web.php'));

            $this->mapRoutes();
        });
    }

    private function mapRoutes(): void
    {
        /** @var Router $router */
        $router = $this->app->make(abstract: Router::class);
        $domains = collect($this->app['config']['domain.available_domains']);

        $domains->each(function (string|array $domain) use ($router): void {
            if (is_string($domain)) {
                $this->mapDomainRoutes(router: $router, domainName: $domain);
                return;
            }

            collect($domain)->each(function (string $domainName) use ($router): void {
                $this->mapDomainRoutes(router: $router, domainName: $domainName);
            });
        });
    }

    private function mapDomainRoutes(Router $router, string $domainName): void
    {
        $domainRoutes = $this->app['config']['domain.' . $domainName]['routes'] ?? null;

        if (empty($domainRoutes)) {
            return;
        }

        $router->middleware($domainRoutes['middleware'] ?? [])
            ->prefix(prefix: $domainRoutes['prefix'] ?? '')
            ->group(base_path(path: $domainRoutes['file']));
    }

    protected function configureRateLimiting(): void
    {
        // phpcs:ignore SlevomatCodingStandard.Functions.StaticClosure.ClosureNotStatic -- baseline
        RateLimiter::for(name: 'api', callback: static function (Request $request) {
            return Limit::perMinute(maxAttempts: 60)->by(key:$request->user()?->id ?: $request->ip());
        });
    }
}
