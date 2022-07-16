<?php

declare(strict_types=1);

namespace Database\Seeders\Core\Society;

use Aquelarre\Core\Framework\Infrastructure\Seed\Loaders\Book\BookLoader;
use Aquelarre\Core\Framework\Infrastructure\Seed\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Collection;

class TheologiesSeeder extends Seeder
{
    protected string $table = 'theologies';

    public function run(): void
    {
        $this->db->table($this->table)->insert($this->getData());
    }

    protected function getData(): array
    {
        /** @var BookLoader $booksLoader */
        $books = tap(
            value: $this->getLoader(BookLoader::class),
            callback: fn (BookLoader $loader): Collection => $loader->load()
        );
        $now = Carbon::now()->toDateTimeString();

        return [
            [
                'name' => 'Cristianismo',
                'description' => null,
                'book_id' => $books->aq3ed(),
                'created_at' => $now,
                'updated_At' => $now,
            ],
            [
                'name' => 'Judaísmo',
                'description' => null,
                'book_id' => $books->aq3ed(),
                'created_at' => $now,
                'updated_At' => $now,
            ],
            [
                'name' => 'Islamismo',
                'description' => null,
                'book_id' => $books->aq3ed(),
                'created_at' => $now,
                'updated_At' => $now,
            ],
            [
                'name' => 'Paganismo',
                'description' => null,
                'book_id' => $books->arsMalefica(),
                'created_at' => $now,
                'updated_At' => $now,
            ],
        ];
    }
}
