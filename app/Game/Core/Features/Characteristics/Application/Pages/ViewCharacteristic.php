<?php

declare(strict_types=1);

namespace App\Game\Core\Features\Characteristics\Application\Pages;

use App\Game\Core\Features\Characteristics\Application\CharacteristicResource;
use App\Game\Core\Features\Characteristics\Infrastructure\Models\Characteristic;
use Filament\Resources\Pages\ViewRecord;
use Illuminate\Contracts\Support\Htmlable;

class ViewCharacteristic extends ViewRecord
{
    protected static string $resource = CharacteristicResource::class;

    public function getTitle(): string|Htmlable
    {
        /** @var Characteristic $record */
        $record = $this->getRecord();

        return $record?->name->toString() ?? parent::getTitle();
    }
}
