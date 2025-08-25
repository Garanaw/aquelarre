<?php

declare(strict_types=1);

namespace App\Game\Core\Features\Kingdom\Application\Schemas;

use Filament\Infolists\Components\IconEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class KingdomInfolist
{
    public static function admin(Schema $schema): Schema
    {
        return $schema->components([
            Section::make('Basic info')->schema([
                TextEntry::make('name')
                    ->label('Name')
                    ->placeholder('The name of the kingdom.'),
                IconEntry::make('peninsular')
                    ->boolean()
                    ->label('Peninsular')
                    ->placeholder('Whether the kingdom is peninsular or not.'),
            ]),
            Section::make('Description')->schema([
                TextEntry::make('description')
                    ->placeholder('The description of the kingdom.'),
            ]),
        ]);
    }
}
