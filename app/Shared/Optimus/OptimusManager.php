<?php

declare(strict_types=1);

namespace App\Shared\Optimus;

use GrahamCampbell\Manager\AbstractManager;
use Illuminate\Contracts\Config\Repository;
use Jenssegers\Optimus\Optimus;

class OptimusManager extends AbstractManager
{
    public function __construct(
        Repository $config,
        protected readonly OptimusFactory $factory
    ) {
        parent::__construct($config);
    }

    protected function createConnection(array $config): Optimus
    {
        return $this->factory->make($config);
    }

    protected function getConfigName(): string
    {
        return 'optimus';
    }

    public function getFactory(): OptimusFactory
    {
        return $this->factory;
    }
}
