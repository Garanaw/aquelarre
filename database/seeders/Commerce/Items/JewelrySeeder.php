<?php

declare(strict_types=1);

namespace Database\Seeders\Commerce\Items;

use Aquelarre\Commerce\Domain\Dto\DBSeed\Items\Item;use Aquelarre\Commerce\Domain\Dto\DBSeed\Items\Jewel;use Database\Seeders\Contracts\DataProvider;

class JewelrySeeder extends DataProvider
{
    private const JEWELS = [
        'anillo',
        'sortija',
        'sello',
        'alianza',
        'collar',
        'diadema',
        'brazalete',
        'pulsera',
    ];

    private const MATERIALS = [
        'oro con joyas',
        'oro',
        'plata',
        'bronce',
    ];

    private const DESCRIPTIONS = [
        'anillo' => 'Aro de %1$s de dimensiones reducidas que se luce, con fines estéticos o simbólicos, en un dedo de la mano',
        'sortija' => 'Anillo liso de %1$s',
        'sello' => 'Anillo de %1$s con un grabado o relieve para sellar documentos',
        'alianza' => 'Anillo de %1$s entregado en las pedidas de compromiso',
        'collar' => 'Complemento de %1$s en forma de cadena que rodea el cuello o parte superior del pecho como adorno',
        'diadema' => 'Adorno de %1$s para el pelo consistente en una pequeña corona',
        'brazalete'=> 'Aro de %1$s que se lleva en la muñeca o el antebrazo como adorno',
        'pulsera' => 'Adorno de %1$s que se lleva alrededor de la muñeca o del tobillo',
    ];

    private const RESTRICTIONS = [
        'sello' => [
            'oro con joyas',
        ],
        'alianza' => [
            'bronce',
        ],
        'diadema' => [
            'bronce',
        ]
    ];

    public function getData(): array
    {
        /** @var Jewel $jewels */
        $jewels = [];

        foreach (self::JEWELS as $itemType) {
            foreach (self::MATERIALS as $material) {
                if ($this->isRestricted($itemType, $material)) {
                    continue;
                }

                $item = Item::jewel(ucfirst($itemType));

                $item = match($material) {
                    'oro con joyas' => $item->jewelGold(),
                    'oro' => $item->gold(),
                    'plata' => $item->silver(),
                    'bronce' => $item->bronze(),
                };

                $jewels[] = $item->description(self::DESCRIPTIONS[strtolower($item->family)]);
            }
        }

        return collect($jewels)->toArray();
    }

    private function isRestricted(string $item, string $material): bool
    {
        return isset(self::RESTRICTIONS[$item]) && in_array($material, self::RESTRICTIONS[$item]);
    }
}
