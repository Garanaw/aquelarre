<?php

declare(strict_types=1);

namespace App\Game\Core\Features\Spells\Spell\Application\Tables;

use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
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
            ])->filters([
                SelectFilter::make('vis')
                    ->label('Vis')
                    ->options([
                        1 => '1',
                        2 => '2',
                        3 => '3',
                        4 => '4',
                        5 => '5',
                        6 => '6',
                        7 => '7',
                    ])->multiple(),
                SelectFilter::make('form')
                    ->label('Form')
                    ->relationship('form', 'name')
                    ->multiple(),
                SelectFilter::make('nature')
                    ->label('Nature')
                    ->relationship('nature', 'name'),
                SelectFilter::make('origin')
                    ->label('Origin')
                    ->relationship('origin', 'name')
                    ->multiple(),
                SelectFilter::make('book')
                    ->label('Source Book')
                    ->relationship('book', 'name')
            ]);
    }
}
