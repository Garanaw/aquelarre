<?php

declare(strict_types=1);

namespace Aquelarre\Core\User\Domain\Services;

use Aquelarre\Core\User\Domain\Dto\NewUser;
use Aquelarre\Core\User\Infrastructure\Models\User;
use Aquelarre\Core\User\Infrastructure\Repositories\Writer as Repository;

class Writer
{
    public function __construct(private readonly Repository $writer)
    {
    }

    public function create(NewUser $data): User
    {
        return $this->writer->create($data);
    }
}
