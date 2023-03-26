<?php

declare(strict_types=1);

namespace Database\Seeders\Commerce\Items;

use Aquelarre\Commerce\Domain\Dto\DBSeed\Items\Item;
use Database\Seeders\Contracts\DataProvider;

class ShieldSeeder extends DataProvider
{
    public function getData(): array
    {
        return collect([
            Item::shield('Adarga')->muslim()->leather()->description('Escudo ligero de cuero de origen islámico —su nombre real es addarqa— que suele tener forma ovalada o de corazón. Al tratarse de un escudo fabricado con un material tan ligero sólo es capaz de absorber los primeros 3 PD de los ataques que consiga detener: el resto de los PD pasan directamente al brazo que porte el escudo. Contra ataques a distancia, la adarga sólo protege el brazo'),
            Item::shield('Broquel')->wood()->description('Fabricado en madera recubierta de cuero, el broquel es un escudo pequeño, utilizado casi exclusivamente por tropas de milicia, debido a su bajo coste. En caso de recibir un ataque a distancia sólo puede cubrir el brazo que porta el escudo'),
            Item::shield('Escudo de Madera')->wood()->description('Es una variante del escudo de metal pero fabricado en madera, lo que lo hace más barato y más ligero, pero menos resistente. En caso de recibir un ataque a distancia, el escudo de madera cubre el brazo del escudo, el pecho y otra localización adyacente, ya fuera la cabeza o el abdomen'),
            Item::shield('Escudo de Metal')->metal()->description('Era el escudo más común en los reinos cristianos, fabricado en madera y reforzado con metal, de forma rectangular con la parte inferior puntiaguda. Si se utiliza para defenderse de ataques a distancia, puede proteger el brazo del escudo, el pecho y otra localización adyacente, ya sea la cabeza o el abdomen'),
            Item::shield('Pavés')->metal()->description('Escudo metálico de forma oblonga y mayor tamaño que el escudo de metal, capaz de proteger casi todo el cuerpo del portador de los ataques a distancia, a excepción de las piernas. Aunque al tratarse de un escudo pesado, limita las posibilidades de movimiento de la persona que lo lleva'),
            Item::shield('Rodela')->metal()->description('Se trata de un escudo pequeño y metálico de forma redonda con una única asa, que utilizan sobre todo soldados a pie. En caso de recibir un ataque a distancia, puede cubrir el brazo que lo porta y el pecho'),
            Item::shield('Tarja')->wood()->description('El escudo medieval de mayor tamaño y peso, capaz de cubrir todo el cuerpo del portador de las flechas y otros ataques a distancia, aunque limita especialmente su movilidad, por lo que suele ser usado por los soldados de vanguardia del ejército y así proteger a los compañeros que van tras ellos. Es imposible usarlo montado a caballo'),
        ])->toArray();
    }
}
