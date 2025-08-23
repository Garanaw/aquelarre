<?php

declare(strict_types=1);

namespace App\Permission\Domain\Enum;

enum Role: string
{
    case ADMIN = 'admin';
    case MODERATOR = 'moderator';
    case EDITOR = 'editor';
    case PLAYER = 'player';
}
