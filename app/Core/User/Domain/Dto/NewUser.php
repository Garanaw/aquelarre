<?php

declare(strict_types=1);

namespace Aquelarre\Core\User\Domain\Dto;

use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Support\Carbon;
use Spatie\DataTransferObject\Attributes\MapFrom;
use Spatie\DataTransferObject\Attributes\MapTo;
use Spatie\DataTransferObject\DataTransferObject;

/**
 * @SuppressWarnings(PHPMD.CamelCasePropertyName)
 */
class NewUser extends DataTransferObject implements Arrayable
{
    public readonly string $name;

    public readonly string $email;

    public readonly string $password;

    #[
        MapFrom('email_verified_at'),
        MapTo('email_verified_at'),
    ]
    public readonly ?Carbon $emailVerifiedAt;

    #[
        MapFrom('role_name'),
        MapTo('role_name'),
    ]
    public readonly string $roleName;
}
