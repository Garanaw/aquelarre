<?php

declare(strict_types=1);

namespace App\Game\Core\Features\Skills\Application\Pages;

use App\Game\Core\Features\Skills\Application\SkillResource;
use App\Game\Core\Features\Skills\Infrastructure\Models\Skill;
use Filament\Resources\Pages\ViewRecord;

class ViewSkill extends ViewRecord
{
    protected static string $resource = SkillResource::class;

    public function getTitle(): string
    {
        /** @var ?Skill $record */
        $record = $this->getRecord();

        return $record?->name->toString() ?? parent::getTitle();
    }
}
