<?php

declare(strict_types=1);

namespace App\Books\Application\Pages;

use App\Books\Application\BookResource;
use App\Books\Application\Schemas\BookInfolist;
use App\Books\Infrastructure\Models\Book;
use Filament\Resources\Pages\ViewRecord;
use Filament\Schemas\Schema;
use Illuminate\Contracts\Support\Htmlable;

class ViewBook extends ViewRecord
{
    protected static string $resource = BookResource::class;

    public function getTitle(): string|Htmlable
    {
        /** @var ?Book $book */
        $book = $this->getRecord();

        return $book?->name->toString() ?? parent::getTitle();
    }

    public function infolist(Schema $schema): Schema
    {
        return BookInfolist::configure($schema);
    }
}
