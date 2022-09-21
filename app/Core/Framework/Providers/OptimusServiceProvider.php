<?php

declare(strict_types=1);

namespace Aquelarre\Core\Framework\Providers;

use Illuminate\Support\ServiceProvider;
use Jenssegers\Optimus\Optimus;

class OptimusServiceProvider extends ServiceProvider
{
    public function register()
    {
        $config = $this->app['config']['optimus'];

        $this->app->singleton(abstract: Optimus::class, concrete: fn () =>  new Optimus(
            prime: (int)$config['prime'],
            inverse: (int)$config['random'],
            xor: (int)$config['inverse'],
        ));
    }
}
