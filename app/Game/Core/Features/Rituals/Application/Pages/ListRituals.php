<?php

declare(strict_types=1);

namespace App\Game\Core\Features\Rituals\Application\Pages;

use App\Game\Core\Features\Rituals\Application\RitualResource;
use Filament\Resources\Pages\ListRecords;

class ListRituals extends ListRecords
{
    protected static string $resource = RitualResource::class;
}
