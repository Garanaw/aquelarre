<?php

declare(strict_types=1);

namespace Database\Seeders\Core\Society;

use Aquelarre\Core\Framework\Infrastructure\Seed\Loaders\Book\BookLoader;
use Aquelarre\Core\Framework\Infrastructure\Seed\Loaders\Society\TheologyLoader;
use Aquelarre\Core\Framework\Infrastructure\Seed\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Collection;

class SocietiesSeeder extends Seeder
{
    protected string $table = 'societies';

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
        /** @var TheologyLoader $theologies */
        $theologies = tap(
            value: $this->getLoader(TheologyLoader::class),
            callback: fn (TheologyLoader $loader): Collection => $loader->load()
        );
        $now = Carbon::now()->toDateTimeString();

        return [
            [
                'name' => 'Cristiana',
                'description' => '',
                'theology_id' => $theologies->cristianism(),
                'book_id' => $books->aq3Ed(),
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'name' => 'Judía',
                'description' => 'El pueblo judío —o sefardita, si queremos ser más precisos— se encuentra extendido por toda la Península Ibérica y podemos encontrar juderías —o calls, como se las denomina en la corona de Aragón— en la mayor parte de las ciudades de los cinco reinos. En su interior los judíos asisten a las sinagogas y continúan practicando sus ritos y costumbres, pero la protección que se les otorgó durante los siglos anteriores va desapareciendo progresivamente a lo largo de los siglos XIV y XV, sucediéndose cada vez con mayor frecuencia las matanzas en las juderías, las conversiones forzosas y, finalmente, la orden de expulsión de los reinos de Castilla y Aragón en 1492',
                'theology_id' => $theologies->judaism(),
                'book_id' => $books->aq3Ed(),
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'name' => 'Islámica',
                'description' => 'Hemos denominado, por comodidad, árabes a los habitantes musulmanes del reino de Granada, aunque la población se componía de una mayoría nashrí —o sea, árabes andalusíes descendientes del antiguo al-Ándalus— junto a bereberes del Magreb, ghulams turcos, africanos de los reinos de Ghana, Malí y Songhay y árabes verdaderos, procedentes de la península arábiga. Pertenecer a un grupo u otro de árabes no influye para nada en el ámbito de las reglas, así que el jugador es libre de escoger una etnia u otra',
                'theology_id' => $theologies->islam(),
                'book_id' => $books->aq3Ed(),
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'name' => 'Pagana',
                'description' => 'Antes de la llegada de las religiones monoteístas existían otras religiones paganas que se practicaban en la Península. Solían ser religiones que adoraban a dioses relacionados con la naturaleza. Toda esta plétora de religiones tienen algunas características comunes: tienen un fuerte componente natural y suelen tener un origen panteísta (que más tarde degeneraría en politeísmo)',
                'theology_id' => $theologies->paganism(),
                'book_id' => $books->arsMalefica(),
                'created_at' => $now,
                'updated_at' => $now,
            ],
        ];
    }
}
