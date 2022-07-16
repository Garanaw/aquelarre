<?php

declare(strict_types=1);

namespace Database\Seeders\Core\People;

use Aquelarre\Core\Framework\Infrastructure\Seed\Loaders\Book\BookLoader;
use Aquelarre\Core\Framework\Infrastructure\Seed\Seeder;
use Illuminate\Support\Collection;

class PeopleSeeder extends Seeder
{
    protected string $table = 'people';

    public function run(): void
    {
        $this->db->table(table: $this->table)->insert(values: $this->getData());
    }

    protected function getData(): array
    {
        /** @var BookLoader $booksLoader */
        $books = tap(
            value: $this->getLoader(class: BookLoader::class),
            callback: fn (BookLoader $loader): Collection => $loader->load()
        );

        return [
            [
                'name' => 'Castellano',
                'book_id' => $books->aq3ed(),
                'description' => 'Se trata de los habitantes cristianos del reino de Castilla, que pueblan todo el territorio de la Meseta, el valle del Guadalquivir y el antiguo reino de Murcia. Gracias a las continuas políticas repobladoras de los reyes castellanos, son el pueblo más numeroso de la Península Ibérica, lo que ha llevado a imponer el castellano como lengua común en todos los reinos peninsulares de la Baja Edad Media.',
            ],
            [
                'name' => 'Gallego',
                'book_id' => $books->aq3ed(),
                'description' => 'Son los habitantes del antiguo reino de Galicia, comprendido actualmente dentro de la corona de Castilla, descendientes de las tribus celtas que habitaban los castros cuyas ruinas aún pueden visitarse en su territorio, y poseedores de una lengua propia procedente del latín.',
            ],
            [
                'name' => 'Vasco',
                'book_id' => $books->aq3ed(),
                'description' => 'Habitantes de las zonas rurales al norte de la corona de Castilla —el señorío de Guipúzcoa— y del reino de Navarra, famosos por su ferocidad y su valor en el combate. Además de una lengua exclusiva, el euskera, los vascos poseen una cultura propia basada en viejos mitos prerromanos y ritos paganos casi olvidados, una cultura que la Iglesia intenta maquillar con símbolos y ceremoniales cristianos.',
            ],
            [
                'name' => 'Asturleonés',
                'book_id' => $books->aq3ed(),
                'description' => 'Son los habitantes de los territorios pertenecientes al antiguo reino de León, incluyendo Asturias y parte de la zona cántabra. Los asturleoneses descienden en su mayor parte de antiguas familias visigodas y no se diferencian demasiado del pueblo castellano, excepto en el uso de un idioma romance propio, el bable.',
            ],
            [
                'name' => 'Mudéjar',
                'book_id' => $books->aq3ed(),
                'description' => 'Los musulmanes que viven en los reinos cristianos durante la Edad Media reciben el nombre de mudéjares —del árabe mudaggan, que quiere decir “domesticado”, lo que demuestra la estima en que los tienen los habitantes del reino nazarí—. Existen comunidades mudéjares en la corona de Castilla —asentadas en los valles del Guadiana y del Guadalquivir—, en Aragón —especialmente en la zona del reino de Valencia— y en el reino de Portugal —numerosas en la zona meridional del reino y el Algarve—, y viven en barrios concretos de las ciudades denominados aljamas o morerías, donde tienen libertad para continuar practicando su religión, su lengua y sus costumbres, al menos hasta que la intransigencia y el fanatismo de los siglos XIV y XV termina obligándoles a bautizarse a finales del siglo XV, cuando pasan a ser llamados “moriscos”.',
            ],
            [
                'name' => 'Judío',
                'book_id' => $books->aq3ed(),
                'description' => 'El pueblo judío —o sefardita, si queremos ser más precisos— se encuentra extendido por toda la Península Ibérica y podemos encontrar juderías —o calls, como se las denomina en la corona de Aragón— en la mayor parte de las ciudades de los cinco reinos. En su interior los judíos asisten a las sinagogas y continúan practicando sus ritos y costumbres, pero la protección que se les otorgó durante los siglos anteriores va desapareciendo progresivamente a lo largo de los siglos XIV y XV, sucediéndose cada vez con mayor frecuencia las matanzas en las juderías, las conversiones forzosas y, finalmente, la orden de expulsión de los reinos de Castilla y Aragón en 1492.',
            ],
            [
                'name' => 'Aragonés',
                'book_id' => $books->aq3ed(),
                'description' => 'Se trata de los habitantes cristianos del antiguo reino de Aragón, integrado ahora dentro de la corona de Aragón, descendientes de aquellos pueblos pirenaicos que repoblaron las tierras que se les arrebató a los musulmanes durante el primer periodo de la Reconquista. Poseen una lengua propia, el aragonés, procedente también del latín, que fue perdiéndose progresivamente tras la llegada al trono aragonés de una dinastía castellana en 1412.',
            ],
            [
                'name' => 'Catalán',
                'book_id' => $books->aq3ed(),
                'description' => 'Son los habitantes cristianos del principado de Cataluña, del reino de Valencia y del reino de Mallorca, integrados ahora en la corona de Aragón. Todos ellos comparten una lengua romance común, el catalán, aunque en Valencia y en Mallorca se utilizan dialectos diferentes —el valenciano y el balear respectivamente—.',
            ],
            [
                'name' => 'Árabe',
                'book_id' => $books->aq3ed(),
                'description' => 'Hemos denominado, por comodidad, árabes a los habitantes musulmanes del reino de Granada, aunque la población se componía de una mayoría nashrí —o sea, árabes andalusíes descendientes del antiguo al-Ándalus— junto a bereberes del Magreb, ghulams turcos, africanos de los reinos de Ghana, Malí y Songhay y árabes verdaderos, procedentes de la península arábiga. Pertenecer a un grupo u otro de árabes no influye para nada en el ámbito de las reglas, así que el jugador es libre de escoger una etnia u otra.',
            ],
            [
                'name' => 'Mozárabe',
                'book_id' => $books->aq3ed(),
                'description' => 'Los cristianos que viven en el reino nazarí de Granada reciben el nombre de mozárabes —del árabe musta`rab, que quiere decir “arabizado”—, donde, a cambio del pago de varios impuestos y la aceptación de una clase social inferior, se les permite mantener sus costumbres y ritos, controlados, eso sí, por el sultán y con severas limitaciones. Utilizan una lengua propia, el mozárabe, construida sobre diferentes dialectos del romance y que, a diferencia de otros idiomas cristianos, no se escribe con caracteres latinos, sino arábigos.',
            ],
            [
                'name' => 'Navarro',
                'book_id' => $books->aq3ed(),
                'description' => 'Son los habitantes cristianos del reino de Navarra, especialmente aquéllos que viven en las ciudades y en la zona meridional del reino —el norte y la costa están poblados por vascos—. En su mayor parte son descendientes de aragoneses y castellanos, con quienes comparten la lengua y buena parte de su historia.',
            ],
            [
                'name' => 'Portugués',
                'book_id' => $books->aq3ed(),
                'description' => 'Denominamos así a los habitantes cristianos del reino de Portugal, descendientes de los pueblos gallegos y leoneses que repoblaron aquellas zonas de al-Ándalus que les fueron conquistadas a los musulmanes. Comparten con los gallegos la lengua, el gallego o galaicoportugués, y aunque en Portugal se utiliza con un dialecto diferente, hemos decidido unificarlo en una misma competencia de idioma.',
            ]
        ];
    }
}
