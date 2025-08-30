<?php

declare(strict_types=1);

namespace App\Game\Core\Features\Rituals\Application\Pages;

use App\Game\Core\Features\Rituals\Application\RitualResource;
use Filament\Resources\Pages\ViewRecord;

class ViewRitual extends ViewRecord
{
    protected static string $resource = RitualResource::class;
}
