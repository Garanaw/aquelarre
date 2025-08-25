<?php

declare(strict_types=1);

namespace App\Game\Core\Features\Kingdom\Application\Tables;

use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class KingdomTable
{
    public static function admin(Table $table): Table
    {
        return $table->columns([
            TextColumn::make('name')
                ->label('Name')
                ->searchable()
                ->sortable(),
            TextColumn::make('peninsular')
                ->label('Peninsular')
                ->badge()
                ->searchable()
                ->sortable(),
            TextColumn::make('book.name')
                ->label('Book')
                ->searchable()
                ->sortable(),
            TextColumn::make('description')
                ->label('Description')
                ->limit(50)
                ->wrap()
                ->placeholder('No description provided.'),
        ]);
    }
}
