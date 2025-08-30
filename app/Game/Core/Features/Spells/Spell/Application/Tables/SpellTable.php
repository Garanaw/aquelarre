<?php

declare(strict_types=1);

namespace App\Game\Core\Features\Spells\Spell\Application\Tables;

use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class SpellTable
{
    public static function admin(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->label('Name')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('vis')
                    ->label('Vis')
                    ->badge()
                    ->color(fn ($state) => match($state) {
                        1, 2 => 'success',
                        3, 4 => 'warning',
                        5, 6, 7 => 'danger',
                        default => 'primary',
                    })
                    ->searchable()
                    ->sortable(),
                TextColumn::make('form.name')
                    ->label('Form')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('nature.name')
                    ->label('Nature')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('origin.name')
                    ->label('Origin')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('book.name')
                    ->label('Source Book')
                    ->searchable()
                    ->sortable(),
            ]);
    }
}
