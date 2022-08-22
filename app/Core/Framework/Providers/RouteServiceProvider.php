<?php

declare(strict_types=1);

namespace Aquelarre\Core\Framework\Providers;

use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Routing\Router;
use Illuminate\Routing\RouteRegistrar;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{
    public const HOME = '/';

    public function boot(): void
    {
        $this->configureRateLimiting();

        $this->routes(function (): void {
            Route::middleware('api')
                ->prefix('api')
                ->group(base_path('routes/api.php'));

            $this->mapRoutes();
        });
    }

    private function mapRoutes(): void
    {
        /** @var Router $router */
        $router = $this->app->make(abstract: Router::class);

        collect($this->app['config']['domain.available_domains'])
            ->flatten(depth: 1)
            ->each(callback: fn (string $domain) => $this->mapDomainRoutes(router: $router, domainName: $domain));
    }

    private function mapDomainRoutes(Router $router, string $domainName): void
    {
        $domainRoutes = $this->app['config']['domain.' . $domainName]['routes'] ?? null;

        if (empty($domainRoutes)) {
            return;
        }

        $routeRegistrar = new RouteRegistrar(router: $router);
        $middleware = Arr::wrap($domainRoutes['middleware'] ?? []);

        if (empty($middleware) === false) {
            $routeRegistrar->middleware($middleware);
        }

        if (isset($domainRoutes['prefix'])) {
            $routeRegistrar->prefix($domainRoutes['prefix']);
        }

        $routeRegistrar->group(base_path(path: $domainRoutes['file']));
    }

    protected function configureRateLimiting(): void
    {
        // phpcs:ignore SlevomatCodingStandard.Functions.StaticClosure.ClosureNotStatic -- baseline
        RateLimiter::for(name: 'api', callback: static function (Request $request) {
            return Limit::perMinute(maxAttempts: 60)->by(key:$request->user()?->id ?: $request->ip());
        });
    }
}
