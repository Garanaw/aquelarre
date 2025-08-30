<?php

declare(strict_types=1);

namespace App\Books\Application\Tables;

use App\Books\Infrastructure\Enum\Edition;
use App\Books\Infrastructure\Models\Book;
use App\Permission\Domain\Enum\Permission;
use App\User\Infrastructure\Models\User;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class BookTable
{
    public static function configure(Table $table, ?User $user): Table
    {
        if ($user === null) {
            return $table;
        }

        return $user->can(Permission::ADMIN_DASHBOARD_VIEW)
            ? self::admin($table)
            : self::user($table);
    }

    private static function admin(Table $table): Table
    {
        return $table->striped()->columns([
            self::name(),
            self::edition(),
            self::editorial(),
            self::publishedAt(),
        ])->recordActions([
            ViewAction::make(),
        ]);
    }

    private static function user(Table $table): Table
    {
        return $table->striped()->columns([
            self::name(),
            self::edition(),
            self::editorial(),
            self::publishedAt(),
        ])->recordActions([
            ViewAction::make(),
        ])->modifyQueryUsing(function ($query) {
            return $query;
        });
    }

    // Fields
    private static function name(): TextColumn
    {
        return TextColumn::make('name')
            ->label('Name')
            ->searchable()
            ->sortable();
    }

    private static function edition(): TextColumn
    {
        return TextColumn::make('edition')
            ->label('Edition')
            ->searchable()
            ->sortable()
            ->badge()
            ->color(fn (Book $record) => match ($record->edition) {
                Edition::FIRST => 'danger',
                Edition::SECOND => 'warning',
                Edition::THIRD => 'success',
                default => 'primary',
            });
    }

    private static function editorial(): TextColumn
    {
        return TextColumn::make('editorial')
            ->label('Editorial')
            ->searchable()
            ->sortable();
    }

    private static function publishedAt(): TextColumn
    {
        return TextColumn::make('published_at')
            ->label('Published At')
            ->date('d/m/Y')
            ->sortable();
    }
}
