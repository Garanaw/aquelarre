<?php

declare(strict_types=1);

namespace Aquelarre\Commerce\Domain\Dto\DBSeed\Equipables;

use Illuminate\Support\Fluent;

abstract class Equipable extends Fluent
{
    public static function weapon(int $itemId): Weapon
    {
        return Weapon::ofItemId($itemId);
    }

    public static function armor(int $itemId): Armor
    {
        return Armor::ofItemId($itemId);
    }

    public static function shield(int $itemId): Shield
    {
        return Shield::ofItemId($itemId);
    }
}
