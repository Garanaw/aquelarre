<?php

declare(strict_types=1);

namespace App\Books\Application;

use App\Books\Application\Pages\ListBooks;
use App\Books\Application\Pages\ViewBook;
use App\Books\Application\Schemas\BookInfolist;
use App\Books\Application\Tables\BookTable;
use App\Books\Infrastructure\Models\Book;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class BookResource extends Resource
{
    protected static ?string $model = Book::class;

    protected static string | BackedEnum | null $navigationIcon = Heroicon::BookOpen;

    public static function table(Table $table): Table
    {
        return BookTable::configure($table);
    }

    public static function infolist(Schema $schema): Schema
    {
        return BookInfolist::configure($schema);
    }

    public static function getPages(): array
    {
        return [
            'index' => ListBooks::route('/'),
            'view' => ViewBook::route('/{record}')
        ];
    }
}
