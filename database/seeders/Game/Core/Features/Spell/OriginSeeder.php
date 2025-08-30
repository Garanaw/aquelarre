<?php

declare(strict_types=1);

namespace Database\Seeders\Game\Core\Features\Spell;

use App\Game\Core\Features\Spells\Origin\Domain\Readers\Reader;
use App\Game\Core\Features\Spells\Origin\Infrastructure\Models\SpellOrigin;
use Database\Seeders\Game\Core\Features\Spell\Helper\Origin;
use Garanaw\SeedableMigrations\Seeder;

class OriginSeeder extends Seeder
{
    public function run(): bool
    {
        $result = $this->db->table('spell_origins')->insert($this->getData());

        if (! $result) {
            $this->command->error('Error seeding spell origins');

            return false;
        }

        $this->putInCacheForNextMigrations();

        return true;
    }

    protected function getData(): array
    {
        return collect([
            Origin::popular()->description('Hechizos de origen tradicional basados en supersticiones de épocas pasadas y que son transmitidos de generación en generación de forma oral de maestro a discípulo. Suelen ser los hechizos más habituales que verás a lo largo del juego y suelen ser escogidos por las profesiones del tipo brujo o curandero'),
            Origin::alchemical()->description('Llamada también "magia roja", se trata de fórmulas mágicas de marcado carácter alquímico, sesudas investigaciones protocientíficas que requieren muchos más conocimientos teóricos y abstractos que la magia popular. Suelen ser los que más fácilmente encontramos en grimorios y libros, y se trata de hechizos particularmente apropiados para las profesiones de alquimista o mago'),
            Origin::pagan()->description('La magia pagana es herencia de los hechizos usados antaño por las viejas culturas paganas. Cualquiera que siga sus enseñanzas y realice sus ritos y ofrendas a los dioses puede hacer uso de ella, aun cuando la fe sea “fingida” (eso sí, que no espere ayuda divina de los dioses monoteístas). Esta magia es practicada tanto por los sacerdotes paganos como por las brujas y hechiceros de origen pagano. Todo aquel seguidor de la antigua religión que tenga al menos un 25% en Teología (Pagana) y 50% en Conocimiento Mágico puede aprender hechizos de magia pagana, hechizos relacionados con los viejos dioses del mundo antiguo'),
            Origin::infernal()->description('Aunque los orígenes popular o alquímico pueden pertenecer indistintamente a la naturaleza blanca o negra de la magia, los hechizos de magia infernal son todos de goecia. Son hechizos creados por demonios para ser utilizados por ellos mismos o por sus seguidores, que los aprenden directamente de sus labios o a través de algún grimorio maldito'),
            Origin::forbidden()->description('Por último tenemos que mencionar un tipo de magia extremadamente enigmática y tenebrosa, incluso más de lo que es normal en la magia. Se trata de la magia prohibida, hechizos que están vedados a la humanidad, ya que poseen un poder tal que ni siquiera los demonios desean enseñarlos, persiguiendo con la misma ferocidad que la Iglesia a cualquiera que conozca uno de ellos. Estos hechizos no pueden ser escogidos durante la creación del personaje y nadie que no tenga un libro que hable de ellos o que no posea un 101% o más en Conocimiento Mágico podrá ni tan siquiera haber oído hablar de ellos. Si algún personaje tiene la oportunidad de aprender alguno no podrá utilizar la Suerte ni para aprenderlo ni para lanzarlo, y es condición obligatoria —tanto para humanos como para criaturas irracionales— utilizar en su lanzamiento los correspondientes pases de manos, pronunciar las fórmulas apropiadas en voz alta y clara y disponer de todos los componentes necesarios. Además, los PC gastados en su lanzamiento se recuperarán a la tasa de 1 PC por cada semana en que no se use magia alguna, durante su utilización tendrán lugar manifestaciones físicas de diferente índole —tormentas, terremotos, tornados…—, y en caso de obtener una pifia durante el lanzamiento el mago morirá (y ya veremos si no se lleva con él a buena parte de los compañeros o del entorno que lo rodea)'),
        ])->toArray();
    }

    private function putInCacheForNextMigrations(): void
    {
        cache()->remember(
            'migration.spell.origin.all',
            now()->addHour(),
            fn () => resolve(Reader::class)->all(),
        );
    }
}
