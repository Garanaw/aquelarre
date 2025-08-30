<?php

declare(strict_types=1);

namespace App\Game\Core\Features\Spells\Spell\Application\Pages;

use App\Game\Core\Features\Spells\Spell\Application\SpellResource;
use Filament\Resources\Pages\ViewRecord;

class ViewSpell extends ViewRecord
{
    protected static string $resource = SpellResource::class;
}
