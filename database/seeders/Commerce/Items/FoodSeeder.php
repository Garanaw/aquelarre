<?php

declare(strict_types=1);

namespace Database\Seeders\Commerce\Items;

use Aquelarre\Commerce\Domain\Dto\DBSeed\Items\Item;
use Database\Seeders\Contracts\DataProvider;

class FoodSeeder extends DataProvider
{
    public function getData(): array
    {
        return collect([
            Item::food('Acemita')->muslim()->description('Una ración de sopa de trigo tostado a medio moler. Es comida musulmana'),
            Item::food('Al Cuzcuz')->muslim()->description('Una ración de sémola granulada con carne. Es comida musulmana'),
            Item::food('Asado de Carnero')->description('Una ración de carne asada directamente en leña de carnero'),
            Item::food('Ave de Caza en Espetón')->description('Una ración de carne de ave asada directamente en un espetón (y servida igualmente así)'),
            Item::food('Bocados de Manjar Blanco')->description('Una ración de pechuga de pollo mezclada con leche y harina, que se toma de postre'),
            Item::food('Bolsillos de Amán')->jew()->description('Una ración de pastelillos triangulares rellenos de dulces. Es postre judío'),
            Item::food('Carne Hojaldrada')->description('Una ración de hojaldre de pan relleno con carne picada'),
            Item::food('Cecina')->description('Una libra de carne salada y secada al sol o ahumada'),
            Item::food('Empanada de Menudillos')->description('Una ración de hojaldre relleno de asaduras de ave cocidas'),
            Item::food('Gachas')->description('Una ración de harina cocida con agua y sal'),
            Item::food('Haraveulas')->jew()->description('Una ración de hojaldre con carne de vaca y especias. Es comida judía'),
            Item::food('Harisa')->muslim()->description('Una ración de guiso de pan desmenuzado y carne picada con manteca. Es comida musulmana'),
            Item::food('Huevos Jaminados')->jew()->description('Una ración de huevos cocidos con aceite y cebolla. Es comida judía'),
            Item::food('Huevos Pasados por Agua')->description('Una ración de huevos escalfados con pan migado y vino'),
            Item::food('Idish')->jew()->description('Una ración de pescado relleno. Es comida judía'),
            Item::food('Lechón Asado')->description('Una ración de cerdo lechal asado directamente en leña'),
            Item::food('Manteca')->description('Una libra de manteca de leche de vaca'),
            Item::food('Migas')->description('Una ración de migas de pan sofritas con manteca de cerdo y ajo'),
            Item::food('Mondongos')->description('Una ración de salchichas hechas con carne picada o despojos'),
            Item::food('Pan')->description('Una hogaza abundante de pan blanco'),
            Item::food('Pan Trenzado')->jew()->description('Una hogaza de pan blanco horneado con aceite y semillas de amapola. Es comida judía'),
            Item::food('Pescado en Salazón')->description('Una libra de pescado conservado en sal'),
            Item::food('Potaje')->description('Una ración de guiso de legumbres y verduras'),
            Item::food('Queso de Cabra')->description('Una ración de queso curado de cabra'),
            Item::food('Sopa de Ajo y Pan')->description('Una ración de agua caliente con poco más que dientes de ajo hervidos y pan para darle sustancia'),
            Item::food('Torrenzo')->description('Una ración de tocino asado'),
            Item::food('Avena para Caballo')->animal()->description('Ración para un solo animal'),
            Item::food('Bizcocho de Viaje')->description('Hogaza de pan seco de larga duración. Dura 5 semanas. Permite comer durante 1 semana'),
            Item::food('Raciones de Viaje')->description('Incluye cecina, queso, pescado en salazón y pan de higo. Dura 1 semana y permite comer 1 semana'),
            Item::food('Jarra de Leche')->drink()->description('Un cuartillo de leche de cabra o vaca'),
            Item::food('Jarra de Agua de Ajenjos')->drink()->description('Un cuartillo de licor aromatizado con ajenjo y otras hierbas. Su abuso puede producir locura y muerte'),
            Item::food('Jarra de Aguapié')->drink()->description('Un cuartillo de orujo de vino con agua. Cuesta 8 dineros una botella con un azumbre de aguapié'),
            Item::food('Jarra de Rubb')->muslim()->drink()->description('Un cuartillo de mosto de fruta. Es bebida musulmana'),
            Item::food('Jarra de Vino')->drink()->description('Un cuartillo de vino. Cuesta 12 dineros si se pide una botella con un azumbre de vino'),
            Item::food('Jarra de Sidra')->drink()->description('Un cuartillo de sidra. Cuesta 12 dineros si se pide una botella con un azumbre de sidra'),
            Item::food('Jarra de Hipocrás')->drink()->description('Un cuartillo de vino hervido con miel y especias. Cuesta 16 dineros una botella de azumbre'),
            Item::food('Jarra de Aguardiente')->drink()->description('Un cuartillo con aguardiente de la tierra. Cuesta 24 dineros si se pide una botella con un azumbre'),
            Item::food('Jarra de Jamguri')->drink()->muslim()->description('Un cuartillo de rubb con canela, anís, mostaza y naranja. Es bebida musulmana'),
        ])->toArray();
    }
}
