<?php

declare(strict_types=1);

namespace App\Game\Core\Features\Skills\Application\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class SkillInfolist
{
    public static function admin(Schema $schema): Schema
    {
        return $schema->components([
            Section::make('Basic info')->schema([
                TextEntry::make('name')
                    ->label('Name')
                    ->placeholder('The name of the skill.'),
                TextEntry::make('latin')
                    ->label('Latin')
                    ->placeholder('The latin name of the skill.'),
                TextEntry::make('characteristic.name')
                    ->label('Characteristic')
                    ->placeholder('The characteristic associated with the skill.'),
            ]),
            Section::make('Description')->schema([
                TextEntry::make('description')
                    ->placeholder('The description of the skill.'),
            ])
        ]);
    }
}
