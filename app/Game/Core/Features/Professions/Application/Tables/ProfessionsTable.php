<?php

declare(strict_types=1);

namespace App\Game\Core\Features\Professions\Application\Tables;

use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class ProfessionsTable
{
    public static function admin(Table $table): Table
    {
        return $table->columns([
            TextColumn::make('name')
                ->label('Name')
                ->searchable()
                ->sortable(),
            IconColumn::make('man')
                ->boolean(),
            IconColumn::make('woman')
                ->boolean(),
            IconColumn::make('has_faith')
                ->boolean(),
            IconColumn::make('only_secondary')
                ->boolean(),
            TextColumn::make('book.name')
                ->label('Source Book')
                ->searchable()
                ->sortable(),
            TextColumn::make('description')
                ->label('Description')
                ->limit(50)
                ->wrap()
                ->tooltip(fn ($record) => $record->description)
                ->placeholder('No description provided.'),
        ]);
    }
}
