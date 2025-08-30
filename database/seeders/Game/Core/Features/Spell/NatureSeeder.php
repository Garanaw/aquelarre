<?php

declare(strict_types=1);

namespace Database\Seeders\Game\Core\Features\Spell;

use App\Game\Core\Features\Spells\Nature\Domain\Readers\Reader;
use App\Game\Core\Features\Spells\Nature\Infrastructure\Collection\NatureCollection;
use App\Game\Core\Features\Spells\Nature\Infrastructure\Models\SpellNature;
use Database\Seeders\Game\Core\Features\Spell\Helper\Nature;
use Garanaw\SeedableMigrations\Seeder;

class NatureSeeder extends Seeder
{
    public function run(): bool
    {
        $result = $this->db->table('spell_natures')->insert($this->getData());

        if (! $result) {
            $this->command->error('Error al insertar los datos en la tabla spell_natures');

            return false;
        }

        $this->putInCacheForNextMigrations();

        return true;
    }

    protected function getData(): array
    {
        return collect([
            Nature::white()->description('Se trata de hechizos benéficos o, a lo sumo, no perjudiciales —al menos en esencia, que otra cosa es lo que haga el mago con un hechizo en concreto—. Aunque el uso de estos hechizos está, como toda la magia, prohibido por las tres religiones monoteístas de la época, lo cierto es que su estudio y práctica no mancilla en forma alguna el alma espiritual del mago'),
            Nature::black()->description('Denominada también "goecia", se trata de un tipo de magia particularmente oscura y perjudicial, ya sea por sus efectos o por la procedencia de sus componentes. Aunque cualquier mago puede aprender estos hechizos, su simple utilización condena el alma del que los usa, quedando maldito a los ojos de la divinidad (hablaremos sobre los efectos de la fe en aquellos “malditos por Dios” en el siguiente capítulo, pág. 240)'),
        ])->toArray();
    }

    private function putInCacheForNextMigrations(): void
    {
        /** @var NatureCollection $all */
        $all = resolve(Reader::class)->all();

        cache()->remember(
            'migration.spell.nature.white',
            now()->addHour(),
            static fn () => $all->white(),
        );
        cache()->remember(
            'migration.spell.nature.black',
            now()->addHour(),
            static fn () => $all->black(),
        );
    }
}
