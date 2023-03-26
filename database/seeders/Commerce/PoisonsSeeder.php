<?php

declare(strict_types=1);

namespace Database\Seeders\Commerce;

use Aquelarre\Commerce\Domain\Dto\DBSeed\Consumables\Poison;
use Aquelarre\Commerce\Infrastructure\Seed\Loader\ItemsLoader;
use Aquelarre\Core\Framework\Infrastructure\Seed\Seeder;

class PoisonsSeeder extends Seeder
{
    public function run() : bool
    {
        return $this->db->table('poisons')->insert(collect($this->getData())->toArray());
    }

    protected function getData() : array
    {
        $items = $this->getLoadedLoader(ItemsLoader::class);

        return [
            Poison::fromItemId($items->getIdByName('Acónito'))->resistanceRoll(2)->damage(5)->rollover(1, 'hour')->death(3, 'day')
                ->effects('Se debe hacer una tirada de Resistencia x2 y el daño que produce es de 5 PD. La tirada debe repetirse cada hora y si el enfermo llega a 0 PV, caerá en coma y morirá dos o tres días después'),
            Poison::fromItemId($items->getIdByName('Adormidera'))->resistanceRoll(3)->damage(1)->rollover(2, 'hour')->death(6, 'hour')
                ->effects('La tirada de Resistencia es la normal, x3, y produce 1 PD cada dos horas, por lo que es posible encontrar a tiempo un galeno que nos ayude a superar el envenenamiento'),
            Poison::fromItemId($items->getIdByName('Albayalde'))->resistanceRoll(3)->damage(2)->rollover(1, 'day')->death(1, 'week')
                ->effects('La tirada de Resistencia es la normal, x3, y produce 2 PD cada día'),
            Poison::fromItemId($items->getIdByName('Arsénico'))->resistanceRoll(1)->damage(0)->death(30, 'minute')
                ->effects('Media hora después de ingerirlo el personaje tendrá que hacer una tirada de Resistencia x1. Si falla, muere inmediatamente, y si saca la tirada perderá la mitad de sus PV, pero sobrevivirá a la experiencia'),
            Poison::fromItemId($items->getIdByName('Beleño'))->resistanceRoll(3)->damage(1)->rollover(1, 'day')->death(1, 'day')
                ->effects('La tirada de Resistencia se realiza, como es habitual, a x3, pero sólo provoca un daño de 1 PD cada día'),
            Poison::fromItemId($items->getIdByName('Cantáridas'))->resistanceRoll(3)->damage(1)->rollover(1, 'hour')->death(2, 'day')
                ->effects('La tirada de Resistencia se realiza a x3 y causa 1 PD cada hora'),
            Poison::fromItemId($items->getIdByName('Cicuta'))->resistanceRoll(1)->damage(8)->rollover(30, 'minute')->death(5, 'hour')
                ->effects('La tirada de Resistencia debe hacerse a x1 y causa la pérdida de 8 PD cada media hora'),
            Poison::fromItemId($items->getIdByName('Escorpión'))->resistanceRoll(3)->damage(1)
                ->effects('La tirada de Resistencia se realiza a x3 y el veneno sólo produce dolor (que puede provocar un penalizador de -15% a cualquier tirada de Habilidad, si la picadura tuvo lugar en un brazo, o a la competencia de Agilidad, si fue en un pie)'),
            Poison::fromItemId($items->getIdByName('Mandrágora'))->resistanceRoll(3)->damage(0)
                ->effects('La mandrágora no produce la muerte, pero todo aquél que coma de su raíz y falle una tirada de Resistencia x3 caerá en un profundo sueño que durará varias horas'),
            Poison::fromItemId($items->getIdByName('Sardonia'))->resistanceRoll(3)->damage(1)->rollover(3, 'hour')->death(1, 'day')
                ->effects('La tirada de Resistencia se realiza a x3 y provoca 1 PD cada tres horas'),
            Poison::fromItemId($items->getIdByName('Setas Venenosas'))->resistanceRoll(2)->damage(1)->rollover(4, 'hour')->death(5, 'day')
                ->effects('La tirada de Resistencia se realizará a x2 y provoca 1 PD cada cuatro horas'),
            Poison::fromItemId($items->getIdByName('Vívora'))->resistanceRoll(2)->damage(1)->rollover(1, 'hour')->death(1, 'day')
                ->effects('Para enfrentarse a los efectos del veneno de víbora debemos tirar Resistencia x2, provocando el veneno 1 PD cada hora'),
            Poison::fromItemId($items->getIdByName('Zaragatona'))->resistanceRoll(3)->damage(1)->rollover(2, 'hour')->death(1, 'week')
                ->effects('La tirada de Resistencia se realiza de la forma normal, a x3, provocando 1 PD cada dos horas'),
        ];
    }
}
