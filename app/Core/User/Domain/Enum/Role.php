<?php

declare(strict_types=1);

namespace Aquelarre\Core\User\Domain\Enum;

enum Role: string
{
    case SuperAdmin = 'super-admin';
    case Admin = 'admin';
    case User = 'user';

    public static function isUser(string $role): bool
    {
        return $role === self::User->value;
    }

    public static function isAdmin(string $role): bool
    {
        return $role === self::Admin->value;
    }

    public static function isSuperAdmin(string $role): bool
    {
        return $role === self::SuperAdmin->value;
    }
}
