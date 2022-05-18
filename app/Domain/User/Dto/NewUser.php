<?php

declare(strict_types=1);

namespace Domain\User\Dto;

use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Support\Carbon;
use Spatie\DataTransferObject\DataTransferObject;

class NewUser extends DataTransferObject implements Arrayable
{
    private const USER_DATA_FIELDS = [
        'name',
        'email',
        'password',
        'email_verified_at',
    ];

    public readonly string $name;
    public readonly string $email;
    public readonly string $password;
    public readonly ?Carbon $email_verified_at;
    public readonly string $role_name;
}
