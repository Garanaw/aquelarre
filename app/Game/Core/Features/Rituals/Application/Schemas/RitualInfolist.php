<?php

declare(strict_types=1);

namespace App\Game\Core\Features\Rituals\Application\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class RitualInfolist
{
    public static function admin(Schema $schema): Schema
    {
        return $schema->components([
            Section::make('Details')->schema([
                TextEntry::make('name')
                    ->label('Name'),
                TextEntry::make('latin')
                    ->label('Latin'),
                TextEntry::make('duration')
                    ->label('Duration'),
                TextEntry::make('ordo')
                    ->label('Ordo')
                    ->badge()
                    ->color(fn ($state) => match ($state) {
                        1, 2 => 'success',
                        3, 4 => 'warning',
                        5, 6, 7 => 'danger',
                        default => 'primary',
                    }),
                TextEntry::make('book.name')
                    ->label('Book'),
            ]),
            Section::make('Effects')->schema([
                TextEntry::make('effects')
                    ->label('Effects')
                    ->html(),
            ])->columnSpanFull(),
        ]);
    }
}
