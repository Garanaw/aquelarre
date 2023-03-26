<?php

declare(strict_types=1);

namespace Database\Seeders\Commerce\Items;

use Aquelarre\Commerce\Domain\Dto\DBSeed\Items\Item;
use Database\Seeders\Contracts\DataProvider;
class ClothingSeeder extends DataProvider
{
    public function getData(): array
    {
        return collect([
            Item::cloth('Ropa Humilde de Hombre')->description('Telas de tonos oscuros y pardos'),
            Item::cloth('Ropa Humilde de Mujer')->description('Telas más largas con los mismos tonos, aunque pueden llevar pañuelos o tocas de color blanco'),
            Item::cloth('Ropa Humilde de Niño')->description('Telas suelas de tonos oscuros'),
            Item::cloth('Ropa Elegante de Hombre')->description('Ropa con mejores telas, aunque son predominantes los tonos pardos y apagados'),
            Item::cloth('Ropa Elegante de Mujer')->description('Ropajes más largos y, aunque se siguen usando los tonos oscuros, aparecen más colores'),
            Item::cloth('Ropa Elegante de Niño')->description('Ropajes sueltos con tonos oscuros'),
            Item::cloth('Ropa Lujosa de Hombre')->description('Paños de calidad con colores y tintes caros'),
            Item::cloth('Ropa Lujosa de Mujer')->description('Paños de calidad, colores luminosos, brocados, encajes, etc'),
            Item::cloth('Ropa Lujosa de Niño')->description('Ropas sueltas, pero con paños de calidad'),
            Item::cloth('Sotana / Hábito Humildes')->description('Sotana o hábito de lana gruesa'),
            Item::cloth('Sotana / Hábito Elegantes')->description('Sotana o hábito de tela de lino'),
            Item::cloth('Sotana / Hábito Lujosos')->description('Sotana o hábito de calidad, con sedas, brocados y armiños'),
            Item::cloth('Chilaba hebrea humilde')->jew()->description('Chilaba con capucha de telas gruesas y oscuras. Es obligatoria para judíos'),
            Item::cloth('Chilaba hebrea elegante')->jew()->description('Chilaba con capucha de tela de calidad. Es obligatoria para judíos'),
            Item::cloth('Caftán humilde')->muslim()->description('Albornoz musulmán de lana barata'),
            Item::cloth('Caftán elegante')->muslim()->description('Albornoz musulmán de lana de gran calidad en colores claros'),
            Item::cloth('Caftán lujoso (Tiraz)')->muslim()->description('Albornoz musulmán con paños de calidad, habitualmente seda'),
            Item::cloth('Alfombra de Oración')->single()->muslim()->description('Alfombra portátil que utilizan los musulmanes para realizar sus oraciones diarias'),
            Item::cloth('Aljuba')->single()->muslim()->description('Traje que se viste sobre la saya. Es utilizado por ambos sexos'),
            Item::cloth('Alpargatas')->single()->description('Calzado de luna con suela de cáñamo. Indicado para andar en silencio'),
            Item::cloth('Balandrán')->single()->description('Traje largo de llevar encima, muy holgado y con mangas y abierto por delante de arriba abajo. De uso muy común entre nobles, caballeros, doctores y letrados'),
            Item::cloth('Bolsillo')->single()->description('Bolsa pequeña de cuero que se lleva colgada al cinto, indicada para guardar monedas'),
            Item::cloth('Borceguíes con banda')->single()->description('Calzado de piel que llega más arriba del tobillo, abierto por delante y que se puede sujetar con correas'),
            Item::cloth('Botas de Camino')->single()->description('Calzado de cuero con suela reforzada'),
            Item::cloth('Calzas')->single()->description('Prenda que los hombres llevan ceñida a las piernas y el cuerpo hasta la cintura. Sujeto al jubón con agujetas'),
            Item::cloth('Capa de Paño Pardo')->single()->description('Capa de abrigo que se puede llevar sobre la ropa'),
            Item::cloth('Capirote de vestir')->single()->description('Especie de capuchón rematado en punta que puede llevar una cola llamada manga'),
            Item::cloth('Chapines')->single()->description('Especie de chancla femenina realizada en corcho con alta suela de piel. Son de colores y con adornos'),
            Item::cloth('Guantes de Carnero')->single()->description('Guantes de piel de carnero que a veces se perfuman'),
            Item::cloth('Guantes de Cetrería')->single()->description('Guantes de cuero reforzado utilizados en cetrería para posar al animal'),
            Item::cloth('Jubón')->single()->description('De fustán (tela gruesa de algodón con pelo por una sola de sus caras)'),
            Item::cloth('Morral')->single()->container()->description('Talega que se ajusta a la espalda a la manera de una mochila'),
            Item::cloth('Saya')->single()->description('Traje ceñido que tanto hombres como mujeres visten sobre la ropa interior. De paño fino doblado'),
            Item::cloth('Sobreveste')->single()->description('Túnica ligera que se coloca sobre la armadura adornada con emblemas y figuras alusivas al portador'),
            Item::cloth('Talit')->single()->jew()->description('Chal con flecos utilizado en los servicios religiosos judíos, normalmente cubriendo la cabeza'),
            Item::cloth('Zapatos Doblados')->single()->description('Calzado hecho a medida por un zapatero en cuero trabajado'),
            Item::cloth('Zurrón')->single()->container()->description('Fabricado con lana y cuero'),
        ])->toArray();
    }
}
