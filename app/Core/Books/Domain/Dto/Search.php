<?php

declare(strict_types=1);

namespace Aquelarre\Core\Books\Domain\Dto;

use Aquelarre\Core\User\Infrastructure\Models\User;
use Spatie\DataTransferObject\DataTransferObject;

class Search extends DataTransferObject
{
    readonly public User $user;
}
