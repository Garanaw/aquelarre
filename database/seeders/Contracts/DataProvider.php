<?php

declare(strict_types=1);

namespace Database\Seeders\Contracts;

use Aquelarre\Core\Framework\Infrastructure\Seed\Loaders\Loader;
use Illuminate\Foundation\Application;

abstract class DataProvider
{
    public function __construct(
        private readonly Application $app,
    ) {
    }

    protected function getLoader(string $class): Loader
    {
        return $this->app->make(abstract: $class);
    }

    protected function getLoadedLoader(string $class): Loader
    {
        return tap(
            value: $this->getLoader(class: $class),
            callback: fn (Loader $loader) => $loader->load()
        );
    }

    public abstract function getData(): array;
}
