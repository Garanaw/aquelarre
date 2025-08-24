<?php

declare(strict_types=1);

namespace App\Game\Core\Features\Characteristics\Application\Pages;

use App\Game\Core\Features\Characteristics\Application\CharacteristicResource;
use Filament\Resources\Pages\ListRecords;

class ListCharacteristics extends ListRecords
{
    protected static string $resource = CharacteristicResource::class;
}
