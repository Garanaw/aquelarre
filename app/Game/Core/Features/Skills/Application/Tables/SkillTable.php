<?php

declare(strict_types=1);

namespace App\Game\Core\Features\Skills\Application\Tables;

use Filament\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class SkillTable
{
    public static function admin(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->label('Name')
                    ->placeholder('The name of the skill.')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('latin')
                    ->label('Latin')
                    ->placeholder('The latin name of the skill.')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('characteristic.name')
                    ->label('Characteristic')
                    ->placeholder('The characteristic associated with the skill.')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('description')
                    ->label('Description')
                    ->placeholder('The description of the skill.')
                    ->searchable()
                    ->sortable()
                    ->limit(70),
            ])
            ->filters([

            ])->recordActions([
                ViewAction::make(),
            ]);
    }
}
