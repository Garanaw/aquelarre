<?php

declare(strict_types=1);

namespace Aquelarre\Core\User\Domain\Dto;

use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Support\Carbon;
use Spatie\DataTransferObject\DataTransferObject;

/**
 * @SuppressWarnings(PHPMD.CamelCasePropertyName)
 */
class NewUser extends DataTransferObject implements Arrayable
{
    public readonly string $name;
    // phpcs:ignore Squiz.WhiteSpace.MemberVarSpacing.Incorrect -- baseline
    public readonly string $email;
    // phpcs:ignore Squiz.WhiteSpace.MemberVarSpacing.Incorrect -- baseline
    public readonly string $password;
    // phpcs:ignore Squiz.NamingConventions.ValidVariableName.MemberNotCamelCaps, Squiz.WhiteSpace.MemberVarSpacing.Incorrect -- baseline
    public readonly ?Carbon $email_verified_at;
    // phpcs:ignore Squiz.NamingConventions.ValidVariableName.MemberNotCamelCaps, Squiz.WhiteSpace.MemberVarSpacing.Incorrect -- baseline
    public readonly string $role_name;
}
