<?php

declare(strict_types=1);

namespace Aquelarre\Core\Books\Domain\Dto;

use Aquelarre\Core\User\Infrastructure\Models\User;
use Illuminate\Support\Fluent;

/**
 * @property-read User $user
 */
class Search extends Fluent
{
}
