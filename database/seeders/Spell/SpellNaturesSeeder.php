<?php

declare(strict_types=1);

namespace Database\Seeders\Spell;

use Aquelarre\Core\Framework\Infrastructure\Seed\Seeder;
use Aquelarre\Spell\Infrastructure\DBFluent\Nature;

class SpellNaturesSeeder extends Seeder
{
    protected string $table = 'spell_natures';

    public function run(): bool
    {
        return $this->db->table($this->table)->insert($this->getData());
    }

    protected function getData(): array
    {
        return collect([
            Nature::white()->description('Se trata de hechizos benéficos o, a lo sumo, no perjudiciales —al menos en esencia, que otra cosa es lo que haga el mago con un hechizo en concreto—. Aunque el uso de estos hechizos está, como toda la magia, prohibido por las tres religiones monoteístas de la época, lo cierto es que su estudio y práctica no mancilla en forma alguna el alma espiritual del mago'),
            Nature::black()->description('Denominada también "goecia", se trata de un tipo de magia particularmente oscura y perjudicial, ya sea por sus efectos o por la procedencia de sus componentes. Aunque cualquier mago puede aprender estos hechizos, su simple utilización condena el alma del que los usa, quedando maldito a los ojos de la divinidad (hablaremos sobre los efectos de la fe en aquellos “malditos por Dios” en el siguiente capítulo, pág. 240)'),
        ])->toArray();
    }
}
