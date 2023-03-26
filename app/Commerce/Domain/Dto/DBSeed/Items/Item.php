<?php

declare(strict_types=1);

namespace Aquelarre\Commerce\Domain\Dto\DBSeed\Items;

use Illuminate\Support\Fluent;

/**
 * @property string|array|object $name
 * @property string $type
 * @property ?string $family
 * @property ?string $origin
 * @property ?string $material
 * @property ?int $weight
 * @property bool $is_wearable
 * @property bool $is_consumable
 * @property bool $is_storable
 * @property bool $is_container
 * @property string $description
 */
// phpcs:ignoreFile
abstract class Item extends Fluent
{
    public static function cloth(string|array|object $name): Cloth
    {
        return is_string($name) ? Cloth::ofItemName($name) : new Cloth(
            static::ensureArray($name)
        );
    }

    public static function food(string|array|object $name): Food
    {
        return is_string($name) ? Food::ofItemName($name) : new Food(
            static::ensureArray($name)
        );
    }

    public static function transport(string|array|object $name): Transport
    {
        return is_string($name) ? Transport::ofItemName($name) : new Transport(
            static::ensureArray($name)
        );
    }

    public static function possession(string|array|object $name): Possession
    {
        return is_string($name) ? Possession::ofItemName($name) : new Possession(
            static::ensureArray($name)
        );
    }

    public static function service(string|array|object $name): Service
    {
        return is_string($name) ? Service::ofItemName($name) : new Service(
            static::ensureArray($name)
        );
    }

    public static function commodity(string|array|object $name): Commodity
    {
        return is_string($name) ? Commodity::ofItemName($name) : new Commodity(
            static::ensureArray($name)
        );
    }

    public static function jewel(string|array|object $name): Jewel
    {
        return is_string($name) ? Jewel::ofItemName($name) : new Jewel(
            static::ensureArray($name)
        );
    }

    public static function poison(string|array|object $name): Poison
    {
        return is_string($name) ? Poison::ofItemName($name) : new Poison(
            static::ensureArray($name)
        );
    }

    public static function weapon(string|array|object $name): Weapon
    {
        return is_string($name) ? Weapon::ofItemName($name) : new Weapon(
            static::ensureArray($name)
        );
    }

    public static function armor(string|array|object $name): Armor
    {
        return is_string($name) ? Armor::ofItemName($name) : new Armor(
            static::ensureArray($name)
        );
    }

    public static function shield(string|array|object $name): Shield
    {
        return is_string($name) ? Shield::ofItemName($name) : new Shield(
            static::ensureArray($name)
        );
    }

    protected static function ensureArray(object|array $data): array
    {
        return is_object($data) ? (array) $data : $data;
    }

    public function description(string $description): self
    {
        $this->description = $description;
        return $this;
    }

    public function container(): self
    {
        $this->is_container = true;
        return $this;
    }
}
