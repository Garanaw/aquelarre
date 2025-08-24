<?php

declare(strict_types=1);

namespace App\Books\Application\Tables;

use App\Books\Infrastructure\Enum\Edition;
use App\Books\Infrastructure\Models\Book;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class BookTable
{
    public static function configure(Table $table): Table
    {
        return $table->columns([
            TextColumn::make('name')
                ->label('Name')
                ->searchable()
                ->sortable(),
            TextColumn::make('edition')
                ->label('Edition')
                ->searchable()
                ->sortable()
                ->badge()
                ->color(fn (Book $record) => match ($record->edition) {
                    Edition::FIRST => 'danger',
                    Edition::SECOND => 'warning',
                    Edition::THIRD => 'success',
                    default => 'primary',
                }),
            TextColumn::make('editorial')
                ->label('Editorial')
                ->searchable()
                ->sortable(),
            TextColumn::make('published_at')
                ->label('Published At')
                ->date('d/m/Y')
                ->sortable(),
        ])->recordActions([
            ViewAction::make(),
        ]);
    }
}
