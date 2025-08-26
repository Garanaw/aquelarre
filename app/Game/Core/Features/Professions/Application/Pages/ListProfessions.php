<?php

declare(strict_types=1);

namespace App\Game\Core\Features\Professions\Application\Pages;

use App\Game\Core\Features\Professions\Application\ProfessionResource;
use Filament\Resources\Pages\ListRecords;

class ListProfessions extends ListRecords
{
    protected static string $resource = ProfessionResource::class;
}
