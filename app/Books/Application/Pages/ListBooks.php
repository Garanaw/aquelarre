<?php

declare(strict_types=1);

namespace App\Books\Application\Pages;

use App\Books\Application\BookResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Contracts\View\View;

class ListBooks extends ListRecords
{
    protected static string $resource = BookResource::class;

    public function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
