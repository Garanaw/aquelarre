<?php

declare(strict_types=1);

namespace App\Books\Application\Schemas;

use App\Books\Infrastructure\Enum\Edition;
use App\Books\Infrastructure\Models\Book;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class BookInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema->components([
            TextEntry::make('name')
                ->label('Book Name')
                ->placeholder('The title of the book.'),
            TextEntry::make('edition')
                ->label('Edition')
                ->badge()
                ->color(fn (Book $record) => match ($record->edition) {
                    Edition::FIRST => 'success',
                    Edition::SECOND => 'warning',
                    Edition::THIRD => 'danger',
                    default => 'primary',
                })
                ->placeholder('The edition of the book.'),
            TextEntry::make('editorial')
                ->label('Editorial')
                ->placeholder('The editorial of the book.'),
        ]);
    }
}
