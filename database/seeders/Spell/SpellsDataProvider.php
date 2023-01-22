<?php

declare(strict_types=1);

namespace Database\Seeders\Spell;

use Aquelarre\Core\Framework\Infrastructure\Seed\Loaders\Book\BookLoader;
use Aquelarre\Core\Framework\Infrastructure\Seed\Loaders\Spell\FormLoader;
use Aquelarre\Core\Framework\Infrastructure\Seed\Loaders\Spell\NatureLoader;
use Aquelarre\Core\Framework\Infrastructure\Seed\Loaders\Spell\OriginLoader;

interface SpellsDataProvider
{
    public function getData(
        BookLoader $books,
        FormLoader $forms,
        NatureLoader $natures,
        OriginLoader $origins
    ): array;
}
