<?php

declare(strict_types=1);

namespace Database\Seeders\Game\Core\Features\Kingdom;

use App\Books\Domain\Reader\Reader;
use Garanaw\SeedableMigrations\Seeder;

class KingdomSeeder extends Seeder
{
    public function run(): bool
    {
        return $this->db->table(table: 'kingdoms')->insert($this->getData());
    }

    protected function getData(): array
    {
        $books = resolve(Reader::class)->getCached();

        return [
            [
                'name' => 'Corona de Castilla',
                'peninsular' => true,
                'description' => 'Durante los siglos XIV y XV, Castilla es el reino de mayor extensión de la Península Ibérica y el que cuenta con una mayor influencia política y cultural. En su interior se engloban reinos antaño independientes, como el de León, el de Galicia o los viejos señoríos de taifas de Toledo y Murcia, entre otros, vinculados ahora todos ellos a la corona de Castilla, que durante el siglo XIII consigue expandir su territorio por todo el valle del Guadalquivir. Durante este periodo de tiempo, Castilla mantendrá la mayor parte del tiempo buenas relaciones con sus vecinos de Portugal y Navarra, pero no ocurrirá lo mismo con Aragón —con quien mantendrá frecuentes enfrentamientos hasta la firma del Compromiso de Caspe, en 1412, cuando se instaura una dinastía castellana en Aragón, la de los Trastámara—, o con Granada, que, a pesar de ser vasalla de Castilla, terminará finalmente siendo conquistada por ésta en 1492.',
                'book_id' => $books->aq3Ed()->id,
            ],
            [
                'name' => 'Corona de Aragón',
                'peninsular' => true,
                'description' => 'Creada tras la unión en 1150 del reino de Aragón y el condado de Barcelona, la corona de Aragón de los siglos XIV y XV se había expandido ya por Valencia, Mallorca, Sicilia, Córcega, Cerdeña, Nápoles y, durante un breve periodo de tiempo, Atenas y Neopatria. Mucho más volcada al mar que su gran antagonista, Castilla —con quien mantendrá frecuentes disputas hasta la llegada al trono aragonés del rey castellano Fernando de Antequera en 1412—, la política de la corona de Aragón se centrará en el comercio marítimo y en la expansión del reino por el Mediterráneo. Con el matrimonio de los Reyes Católicos en 1469, Castilla y Aragón quedarán unidas, aunque hasta el reinado de Carlos I la unión no será completa y efectiva.',
                'book_id' => $books->aq3Ed()->id,
            ],
            [
                'name' => 'Reino de Granada',
                'peninsular' => true,
                'description' => 'En 1238 Ibn Al-Ahmar funda el reino nazarí de Granada, convertido hasta su desaparición en 1492 en el último baluarte islámico de la Península Ibérica, heredero de los grandes emiratos y califatos de al-Ándalus. Durante todo este tiempo, y a pesar de las frecuentes luchas dinásticas que lo sacuden, el reino se mantiene gracias a las numerosas parias que pagan a los reyes castellanos y a los pactos que se firman con los benimerines del Magreb. A pesar de todo, el reino de Granada va perdiendo cada vez más territorio hasta que los Reyes Católicos, tras una larga campaña de diez años, expulsan a los nazaríes de la Península.',
                'book_id' => $books->aq3Ed()->id,
            ],
            [
                'name' => 'Reino de Navarra',
                'peninsular' => true,
                'description' => 'Tras varios siglos de repartos territoriales con las coronas vecinas, el reino de Navarra es el más pequeño de todos los reinos peninsulares de la Baja Edad Media, y aunque durante este periodo de tiempo sea gobernada por dinastías de origen francés, mantendrá buenas relaciones con las coronas castellana y aragonesa, preocupadas cada una de que el reino no pase a formar parte de la corona enemiga. A mediados del XV, una cruenta guerra civil entre la facción de los beamonteses —apoyados por los castellanos— y la de los agramonteses —que reciben ayuda de los aragoneses— sacude todo el reino, conflicto que terminaría a comienzos del siglo XVI con la conquista por parte de Aragón del antiguo reino navarro.',
                'book_id' => $books->aq3Ed()->id,
            ],
            [
                'name' => 'Reino de Portugal',
                'peninsular' => true,
                'description' => 'El antiguo condado portucalense ,perteneciente al reino de León y transformado oficialmente en reino de Portugal en 1139 bajo los auspicios de la casa de Borgoña, se adentra en el siglo XIV convertido en aliado de Castilla. Durante los dos siglos posteriores, las principales tareas que acomete Portugal son fortalecer su territorio y reforzar el poder de la corona frente al de los nobles, lo que no impedirá la ocupación castellana de 1371 para acabar con las pretensiones dinásticas de Fernando I de Portugal sobre la corona de Castilla, invasión que provocará la llegada al trono portugués de la dinastía de Avis, una alianza con Inglaterra y la victoria sobre Castilla, que permitirá a Portugal fortalecer aún más su poder en la Península e iniciar un periodo de expansión en ultramar que les llevará primero a África y, ya en el siglo XVI, a América y Asia.',
                'book_id' => $books->aq3Ed()->id,
            ]
        ];
    }
}
