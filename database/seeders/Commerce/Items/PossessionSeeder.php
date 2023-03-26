<?php

declare(strict_types=1);

namespace Database\Seeders\Commerce\Items;

use Aquelarre\Commerce\Domain\Dto\DBSeed\Items\Item;
use Database\Seeders\Contracts\DataProvider;

class PossessionSeeder extends DataProvider
{
    public function getData(): array
    {
        return collect([
            Item::possession('Cabaña')->house()->description('Fabricada en madera o adobe con techo de paja embreada'),
            Item::possession('Granja')->house()->description('Fabricada en madera o adobe, con techo de madera y tejas, todo ello sobre zócalo de piedra'),
            Item::possession('Casa Sencila')->house()->description('Casa pequeña (dos o tres habitaciones), fabricada en madera'),
            Item::possession('Casa Normal')->house()->description('Casa mediana (hasta seis habitaciones, en dos plantas), fabricada en madera'),
            Item::possession('Casa Lujosa')->house()->description('Casa grande (más de seis habitaciones, en dos plantas y patio), fabricada en madera y piedra'),
            Item::possession('Torre Fortificada')->tower()->description('Torreón en piedra. Requiere permiso del señor de las tierras'),
            Item::possession('Castillo Pequeño')->castle()->description('Castillo en piedra. Requiere permiso del señor de las tierras'),
            Item::possession('Castillo Grande')->castle()->description('Castillo en piedra con muralla doble de piedra. Requiere permiso del señor de las tierras'),
            Item::possession('Noria de Sangre')->other()->noContainer()->description('Noria para sacar agua o moler grano. Requiere de un animal de tiro'),
            Item::possession('Puente de Madera')->other()->noContainer()->description('Puente en madera para cruzar arroyos o ríos pequeños (máximo de 10 varas de longitud)'),
            Item::possession('Puente de Piedra')->other()->noContainer()->description('Puente en madera para cruzar arroyos o ríos pequeños (máximo de 10 varas de longitud)'),
            Item::possession('Tierras de Pastos')->other()->noContainer()->description('Es el precio por fanega de tierra, que produce 3 maravedíes de ganancia al año'),
            Item::possession('Tierras de Cultivo')->other()->noContainer()->description('Es el precio por fanega de tierra, que produce 6 maravedíes de ganancia al año'),
            Item::possession('Huertos')->other()->noContainer()->description('Es el precio por fanega de tierra, que produce 15 maravedíes de ganancia al año'),
            Item::possession('Viñedos')->other()->noContainer()->description('Es el precio por fanega de tierra, que produce 36 maravedíes de ganancia al año'),
        ])->toArray();
    }
}
