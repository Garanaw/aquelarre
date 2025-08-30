<?php

declare(strict_types=1);

namespace App\Game\Core\Features\Spells\Spell\Application\Schemas;

use App\Filament\Infolists\Components\SpellComponentsEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class SpellInfolist
{
    public static function admin(Schema $schema): Schema
    {
        return $schema->components([
            Section::make('Details')
                ->schema([
                    TextEntry::make('name')
                        ->label('Spell Name')
                        ->placeholder('The name of the spell.'),
                    TextEntry::make('vis')
                        ->label('Vis')
                        ->badge()
                        ->color(fn ($state) => match($state) {
                            1, 2 => 'success',
                            3, 4 => 'warning',
                            5, 6, 7 => 'danger',
                            default => 'primary',
                        })
                        ->placeholder('The amount of Vis required to cast the spell.'),
                    TextEntry::make('form.name')
                        ->label('Form')
                        ->placeholder('The form of the spell.'),
                    TextEntry::make('nature.name')
                        ->label('Nature')
                        ->placeholder('The nature of the spell.'),
                    TextEntry::make('origin.name')
                        ->label('Origin')
                        ->placeholder('The origin of the spell.'),
                    TextEntry::make('book.name')
                        ->label('Source Book')
                        ->placeholder('The book where this spell is detailed.'),
                ]),
            Section::make('Info')->schema([
                TextEntry::make('expiration')
                    ->label('Expiration')
                    ->placeholder('The expiration time of the spell, if applicable.')
                    ->default('No expiration'),
                TextEntry::make('duration')
                    ->label('Duration')
                    ->placeholder('The duration of the spell effect.'),
                SpellComponentsEntry::make('components')
                    ->label('Components')
                    ->placeholder('The components required to cast the spell (e.g., verbal, somatic, material).'),
            ]),
            Section::make('Description')->schema([
                TextEntry::make('description')
                    ->label('Description')
                    ->placeholder('A detailed description of the spell, its effects, and usage.')
                    ->html(),
            ])->columns(1),
        ]);
    }
}
