<?php

declare(strict_types=1);

namespace Aquelarre\Core\User\Domain\Dto;

use Illuminate\Support\Carbon;
use Illuminate\Support\Fluent;

/**
 * @property string $name
 * @property string $email
 * @property string $password
 * @property ?Carbon $emailVerifiedAt
 * @property string $roleName
 */
class NewUser extends Fluent
{
}
