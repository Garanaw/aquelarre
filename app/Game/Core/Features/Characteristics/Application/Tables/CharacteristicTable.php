<?php

declare(strict_types=1);

namespace App\Game\Core\Features\Characteristics\Application\Tables;

use Filament\Actions\ViewAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class CharacteristicTable
{
    public static function admin(Table $table): Table
    {
        return $table->columns([
            TextColumn::make('name')
                ->label('Name')
                ->searchable()
                ->sortable(),
            TextColumn::make('prefix')
                ->label('Prefix')
                ->searchable()
                ->sortable(),
            TextColumn::make('latin')
                ->label('Latin'),
            IconColumn::make('primary')
                ->label('Primary')
                ->boolean(),
            TextColumn::make('description')
                ->label('Description')
                ->limit(50)
                ->wrap()
        ])->recordActions([
            ViewAction::make()
        ]);
    }
}
