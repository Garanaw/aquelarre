<?php

declare(strict_types=1);

namespace Domain\User\Services;

use Domain\User\Dto\NewUser;
use Infrastructure\User\Models\User;
use Infrastructure\User\Repositories\Writer as Repository;

class Writer
{
    public function __construct(
        private readonly Repository $writer
    ) {
    }

    public function create(NewUser $data): User
    {
        return $this->writer->create($data);
    }
}
