<?php

declare(strict_types=1);

namespace App\Application\Shared\Middleware;

use Illuminate\Foundation\Application;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Symfony\Component\HttpFoundation\Response;

class ServiceProviderLoader
{
    public function __construct(private readonly Application $app)
    {
    }

    public function handle(Request $request, \Closure $next): Response
    {
        $this->getProviders()->each(
            fn (string $provider) => $this->app->register($provider)
        );

        return $next($request);
    }

    private function getProviders(): Collection
    {
        return Collection::wrap($this->app['config']->get('domain.shared.providers', []));
    }
}
