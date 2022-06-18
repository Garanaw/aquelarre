<?php

declare(strict_types=1);

namespace Aquelarre\Core\Shared\Application\Middleware;

use Illuminate\Foundation\Application;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Symfony\Component\HttpFoundation\Response;

class ServiceProviderLoader
{
    public function __construct(protected readonly Application $app)
    {
    }

    public function handle(Request $request, \Closure $next): Response
    {
        $this->getProviders()->each(
            fn (string $provider) => $this->app->register($provider)
        );

        return $next($request);
    }

    protected function getProviders(): Collection
    {
        return Collection::wrap($this->app['config']->get('domain.shared.providers', []));
    }
}
