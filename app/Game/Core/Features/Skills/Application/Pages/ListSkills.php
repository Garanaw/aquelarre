<?php

declare(strict_types=1);

namespace App\Game\Core\Features\Skills\Application\Pages;

use App\Game\Core\Features\Skills\Application\SkillResource;
use Filament\Resources\Pages\ListRecords;

class ListSkills extends ListRecords
{
    protected static string $resource = SkillResource::class;
}
