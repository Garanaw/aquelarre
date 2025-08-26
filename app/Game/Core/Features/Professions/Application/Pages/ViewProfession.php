<?php

declare(strict_types=1);

namespace App\Game\Core\Features\Professions\Application\Pages;

use App\Game\Core\Features\Professions\Application\ProfessionResource;
use Filament\Resources\Pages\ViewRecord;

class ViewProfession extends ViewRecord
{
    protected static string $resource = ProfessionResource::class;
}
