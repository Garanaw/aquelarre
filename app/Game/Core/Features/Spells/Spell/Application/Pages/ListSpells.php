<?php

declare(strict_types=1);

namespace App\Game\Core\Features\Spells\Spell\Application\Pages;

use App\Game\Core\Features\Spells\Spell\Application\SpellResource;
use Filament\Resources\Pages\ListRecords;

class ListSpells extends ListRecords
{
    protected static string $resource = SpellResource::class;
}
