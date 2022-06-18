<?php

declare(strict_types=1);

namespace Aquelarre\Core\User\Domain\Dto;

use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Support\Carbon;
use Spatie\DataTransferObject\DataTransferObject;

class NewUser extends DataTransferObject implements Arrayable
{
    public readonly string $name;
    public readonly string $email;
    public readonly string $password;
    public readonly ?Carbon $email_verified_at;
    public readonly string $role_name;
}
