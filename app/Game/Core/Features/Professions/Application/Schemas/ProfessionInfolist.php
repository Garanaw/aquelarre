<?php

declare(strict_types=1);

namespace App\Game\Core\Features\Professions\Application\Schemas;

use Filament\Infolists\Components\IconEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class ProfessionInfolist
{
    public static function admin(Schema $schema): Schema
    {
        return $schema->components([
            Section::make('General')->schema([
                TextEntry::make('name')
                    ->label('Profession Name')
                    ->placeholder('The name of the profession.'),
                IconEntry::make('man')
                    ->label('Can be done by men?')
                    ->boolean()
                    ->placeholder('A brief description of the profession.'),
                IconEntry::make('woman')
                    ->label('Can be done by women?')
                    ->boolean()
                    ->placeholder('A brief description of the profession.'),
                IconEntry::make('has_faith')
                    ->label('Requires Faith?')
                    ->boolean()
                    ->placeholder('A brief description of the profession.'),
                IconEntry::make('only_secondary')
                    ->label('Is Secondary Only?')
                    ->boolean()
                    ->placeholder('A brief description of the profession.'),
                TextEntry::make('book.name')
                    ->label('Source Book')
                    ->placeholder('The book where this profession is detailed.'),
            ]),
            Section::make('Description')->schema([
                TextEntry::make('description')
                    ->label('Description')
                    ->placeholder('A detailed description of the profession, its roles, and responsibilities.'),
            ]),
        ]);
    }
}
