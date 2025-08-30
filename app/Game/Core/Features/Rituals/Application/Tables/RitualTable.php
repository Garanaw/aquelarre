<?php

declare(strict_types=1);

namespace App\Game\Core\Features\Rituals\Application\Tables;

use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class RitualTable
{
    public static function admin(Table $table): Table
    {
        return $table->columns([
            TextColumn::make('name')
                ->label('Name')
                ->searchable()
                ->sortable(),
            TextColumn::make('latin')
                ->label('Latin')
                ->searchable()
                ->sortable(),
            TextColumn::make('duration')
                ->label('Duration')
                ->searchable()
                ->sortable(),
            TextColumn::make('ordo')
                ->label('Ordo')
                ->badge()
                ->color(fn ($state) => match ($state) {
                    1, 2 => 'success',
                    3, 4 => 'warning',
                    5, 6, 7 => 'danger',
                    default => 'primary',
                })
                ->searchable()
                ->sortable(),
            TextColumn::make('book.name')
                ->label('Book')
                ->searchable()
                ->sortable(),
        ]);
    }
}
