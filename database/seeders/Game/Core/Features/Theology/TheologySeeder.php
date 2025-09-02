<?php

declare(strict_types=1);

namespace Database\Seeders\Game\Core\Features\Theology;

use App\Books\Domain\Reader\Reader;
use Garanaw\SeedableMigrations\Seeder;

class TheologySeeder extends Seeder
{
    public function run(): bool
    {
        return $this->db->table('theologies')->insert($this->getData());
    }

    protected function getData(): array
    {
        $books = resolve(Reader::class)->getCached();

        return [
            [
                'name' => 'Cristianismo',
                'description' => null,
                'book_id' => $books->aq3ed()->id,
            ],
            [
                'name' => 'Judaísmo',
                'description' => null,
                'book_id' => $books->aq3ed()->id,
            ],
            [
                'name' => 'Islamismo',
                'description' => null,
                'book_id' => $books->aq3ed()->id,
            ],
            [
                'name' => 'Paganismo',
                'description' => null,
                'book_id' => $books->arsMalefica()->id,
            ],
        ];
    }
}
