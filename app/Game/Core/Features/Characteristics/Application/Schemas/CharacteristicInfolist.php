<?php

declare(strict_types=1);

namespace App\Game\Core\Features\Characteristics\Application\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class CharacteristicInfolist
{
    public static function admin(Schema $schema): Schema
    {
        return $schema->components([
            TextEntry::make('name')
                ->label('Name')
                ->placeholder('The name of the characteristic.'),
            TextEntry::make('prefix')
                ->label('Prefix')
                ->placeholder('The prefix of the characteristic.'),
            TextEntry::make('latin')
                ->label('Latin')
                ->placeholder('The latin name of the characteristic.'),
            TextEntry::make('primary')
                ->label('Primary')
                ->placeholder('Whether the characteristic is primary or not.'),
            TextEntry::make('description')
                ->label('Description')
                ->placeholder('The description of the characteristic.'),
        ]);
    }
}
