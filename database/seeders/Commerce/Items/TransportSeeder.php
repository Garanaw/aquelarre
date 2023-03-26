<?php

declare(strict_types=1);

namespace Database\Seeders\Commerce\Items;

use Aquelarre\Commerce\Domain\Dto\DBSeed\Items\Item;
use Database\Seeders\Contracts\DataProvider;

class TransportSeeder extends DataProvider
{
    public function getData(): array
    {
        return collect([
            Item::transport('Asno')->mount()->description('Usado para transporte, como montura o como animal de tiro. Es mucho más terco que una mula'),
            Item::transport('Caballo de Tiro')->mount()->description('Caballo grande y fuerte, que se utiliza para labores agrícolas o para jalar carretas'),
            Item::transport('Caballo de Monta')->mount()->description('Caballo ligero que se utiliza exclusivamente para ser montado'),
            Item::transport('Corcel')->mount()->description('Caballo de guerra, ligero y entrenado para mantenerse tranquilo durante batallas y justas'),
            Item::transport('Jamelgo')->mount()->description('Caballo viejo y flaco, utilizado en sus últimos años para montar y recorrer pequeñas distancias'),
            Item::transport('Mula')->mount()->description('Usada para transporte, como montura o para labores agrícolas'),
            Item::transport('Potro')->mount()->description('Potrillo con cuatro años o menos'),
            Item::transport('Carro Normal')->car()->description('Necesita uno o dos caballos de tiro para jalarlo'),
            Item::transport('Carruaje Pequeño')->car()->description('Usado para transporte de personas (entre 2 y 4). Necesita uno o dos caballos de tiro para jalarlo'),
            Item::transport('Carruaje Grande')->car()->description('Usado para transporte de personas (entre 6 y 8). Necesita cuatro caballos de tiro para jalarlo'),
            Item::transport('Barca')->boat()->description('Pequeña barca de remos utilizada para la pesca costera'),
            Item::transport('Carraca')->boat()->description('Barco similar a la coca, pero de mayor tamaño'),
            Item::transport('Coca')->boat()->description('Embarcación comercial para el Atlántico y el Mediterráneo'),
            Item::transport('Fusta')->boat()->description('Embarcación de borda baja, usada por corsarios, en especial turcos y berberiscos'),
            Item::transport('Galeaza')->boat()->description('Similar a la galera, pero de mayores dimensiones, con una buena capacidad de carga'),
            Item::transport('Galeota')->boat()->description('Similar a la fusta, pero de mayor tamaño, usada también por piratas o como escolta'),
            Item::transport('Galera')->boat()->description('Embarcación para acciones militares o para patrullar las costas'),
            Item::transport('Saeta')->boat()->description('Embarcación usada para el corso o para el transporte de mercancías'),
        ])->toArray();
    }
}
