<?php

declare(strict_types=1);

namespace App\Game\Core\Features\Kingdom\Application\Pages;

use App\Game\Core\Features\Kingdom\Application\KingdomResource;
use Filament\Resources\Pages\ListRecords;

class ListKingdoms extends ListRecords
{
    protected static string $resource = KingdomResource::class;
}
