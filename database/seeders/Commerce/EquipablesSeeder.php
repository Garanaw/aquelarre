<?php

declare(strict_types=1);

namespace Database\Seeders\Commerce;

use Aquelarre\Commerce\Domain\Dto\DBSeed\Equipables\Equipable;
use Aquelarre\Commerce\Infrastructure\Seed\Loader\ItemsLoader;
use Aquelarre\Core\Framework\Infrastructure\Seed\Loaders\Competence\WeaponTypes;
use Aquelarre\Core\Framework\Infrastructure\Seed\Seeder;

class EquipablesSeeder extends Seeder
{
    public function run(): bool
    {
        return collect($this->getData())
            ->reduce(
                callback: fn (bool $prev, array $data, string $key) => $this->db
                    ->table($key)
                    ->insert(collect($data)->toArray()) && $prev,
                initial: true
            );
    }

    protected function getData(): array
    {
        $items = $this->getLoadedLoader(ItemsLoader::class);
        return [
            'weapons' => $this->getWeapons($items),
            'armors' => $this->getArmors($items),
            'shields' => $this->getShields($items),
        ];
    }

    private function getWeapons(ItemsLoader $items): array
    {
        $loader = $this->getLoadedLoader(WeaponTypes::class);
        $sword = $loader->swordType();
        $greatSword = $loader->greatSwordType();
        $knife = $loader->knifeType();
        $crossbow = $loader->crossbowType();
        $bow = $loader->bowType();
        $axe = $loader->axeType();
        $club = $loader->clubType();
        $mace = $loader->maceType();
        $spear = $loader->spearType();
        $sling = $loader->slingType();

        return [
            Equipable::weapon($items->getIdByName('Alfanje'))->type($greatSword)->strength(10)->light()->damage('1d4')->bonus(2),
            Equipable::weapon($items->getIdByName('Almarada'))->type($knife)->strength(5)->light()->damage('1d10')->bonus(1),
            Equipable::weapon($items->getIdByName('Arbalesta'))->type($crossbow)->strength(12)->heavy()->damage('1d10')->bonus(2)->range('50/100/150')->reload(3),
            Equipable::weapon($items->getIdByName('Archa'))->type($axe)->strength(12)->heavy()->damage('1d10')->bonus(1),
            Equipable::weapon($items->getIdByName('Arco Corto'))->type($bow)->strength(10)->mid()->damage('1d6')->range('15/40/60')->reload(1),
            Equipable::weapon($items->getIdByName('Arco Largo'))->type($bow)->strength(12)->heavy()->damage('1d10')->range('20/50/100')->reload(1),
            Equipable::weapon($items->getIdByName('Arco (Re)curvado'))->type($bow)->strength(12)->mid()->damage('1d10')->range('25/55/110')->reload(1),
            Equipable::weapon($items->getIdByName('Ballesta'))->type($crossbow)->strength(10)->mid()->damage('1d10')->range('30/60/120')->reload(3),
            Equipable::weapon($items->getIdByName('Ballesta Ligera'))->type($crossbow)->strength(10)->mid()->damage('1d6')->range('15/30/60')->reload(2),
            Equipable::weapon($items->getIdByName('Bastón de Combate'))->type($club)->strength(5)->mid()->damage('1d4'),
            Equipable::weapon($items->getIdByName('Bordón'))->type($club)->strength(10)->mid()->damage('1d4')->bonus(2),
            Equipable::weapon($items->getIdByName('Bracamante'))->type($knife)->strength(8)->mid()->damage('1d6')->bonus(2),
            Equipable::weapon($items->getIdByName('Cayado'))->type($club)->strength(5)->mid()->damage('1d4')->bonus(1),
            Equipable::weapon($items->getIdByName('Clava'))->type($mace)->strength(10)->mid()->damage('1d6'),
            Equipable::weapon($items->getIdByName('Coltell'))->type($knife)->strength(10)->mid()->damage('1d6')->bonus(1),
            Equipable::weapon($items->getIdByName('Cuchillo'))->type($knife)->strength(5)->light()->damage('1d6')->range('FUE'),
            Equipable::weapon($items->getIdByName('Dabus'))->type($mace)->strength(10)->mid()->damage('1d6')->bonus(1),
            Equipable::weapon($items->getIdByName('Daga'))->type($knife)->strength(5)->light()->damage('2d3'),
            Equipable::weapon($items->getIdByName('Espada Corta'))->type($sword)->strength(8)->mid()->damage('1d6')->bonus(1),
            Equipable::weapon($items->getIdByName('Espada de Mano'))->type($sword)->strength(12)->mid()->damage('1d8')->bonus(1),
            Equipable::weapon($items->getIdByName('Espada Bastarda'))->type($greatSword)->strength(12)->mid()->damage('1d10'),
            Equipable::weapon($items->getIdByName('Estilete'))->type($knife)->strength(5)->light()->damage('1d3')->bonus(1),
            Equipable::weapon($items->getIdByName('Estoque'))->type($sword)->strength(10)->mid()->damage('1d8'),
            Equipable::weapon($items->getIdByName('Gumía'))->type($knife)->strength(5)->light()->damage('1d4')->bonus(2),
            Equipable::weapon($items->getIdByName('Hacha'))->type($axe)->strength(8)->mid()->damage('1d6')->range('FUE'),
            Equipable::weapon($items->getIdByName('Hacha de Armas'))->type($axe)->strength(12)->mid()->damage('1d8')->bonus(2),
            Equipable::weapon($items->getIdByName('Hacha de Combate'))->type($axe)->strength(15)->heavy()->damage('1d10 + 1d4'),
            Equipable::weapon($items->getIdByName('Hacha de Petos'))->type($axe)->strength(12)->heavy()->damage('1d10'),
            Equipable::weapon($items->getIdByName('Honda'))->type($sling)->strength(5)->light()->damage('1d3')->bonus(2)->range('15/25/50'),
            Equipable::weapon($items->getIdByName('Horquilla'))->type($spear)->strength(10)->mid()->damage('1d8'),
            Equipable::weapon($items->getIdByName('Jineta Nashrí'))->type($sword)->strength(8)->light()->damage('1d6')->bonus(2),
            Equipable::weapon($items->getIdByName('Lanza Corta'))->type($spear)->strength(8)->mid()->damage('1d6')->bonus(1)->range('FUE'),
            Equipable::weapon($items->getIdByName('Lanza de Caballería'))->type($spear)->strength(12)->heavy()->damage('2d6'),
            Equipable::weapon($items->getIdByName('Lanza Larga'))->type($spear)->strength(10)->heavy()->damage('1d8')->bonus(2),
            Equipable::weapon($items->getIdByName('Mangual'))->type($mace)->strength(12)->mid()->damage('1d8'),
            Equipable::weapon($items->getIdByName('Martillo de Guerra'))->type($mace)->strength(10)->mid()->damage('1d8')->bonus(1),
            Equipable::weapon($items->getIdByName('Mayal de Armas'))->type($mace)->strength(10)->heavy()->damage('1d10'),
            Equipable::weapon($items->getIdByName('Maza'))->type($mace)->strength(10)->mid()->damage('1d8'),
            Equipable::weapon($items->getIdByName('Maza de Armas'))->type($mace)->strength(12)->mid()->damage('1d8')->bonus(2),
            Equipable::weapon($items->getIdByName('Maza Pesada'))->type($mace)->strength(15)->heavy()->damage('2d6'),
            Equipable::weapon($items->getIdByName('Montante'))->type($greatSword)->strength(15)->heavy()->damage('1d10')->bonus(2),
            Equipable::weapon($items->getIdByName('Morosa'))->type($spear)->strength(15)->heavy()->damage('2d6'),
            Equipable::weapon($items->getIdByName('Nimcha'))->type($sword)->strength(10)->mid()->damage('1d6')->bonus(2),
            Equipable::weapon($items->getIdByName('Pico de Cuervo'))->type($axe)->strength(10)->mid()->damage('1d8')->bonus(1),
            Equipable::weapon($items->getIdByName('Saif'))->type($sword)->strength(10)->mid()->damage('1d6')->bonus(2),
            Equipable::weapon($items->getIdByName('Takuba'))->type($sword)->strength(10)->mid()->damage('1d8')->bonus(1),
            Equipable::weapon($items->getIdByName('Telek'))->type($knife)->strength(5)->light()->damage('1d3')->bonus(2),
            Equipable::weapon($items->getIdByName('Terciado'))->type($knife)->strength(9)->light()->damage('1d6')->bonus(1),
            Equipable::weapon($items->getIdByName('Tripa'))->type($mace)->strength(8)->light()->damage('2d4')->bonus(1),
        ];
    }

    private function getArmors(ItemsLoader $items): array
    {
        return [
            Equipable::armor($items->getIdByName('Pelliza de piel'))->soft()->protection(1)->resistance(15)->strength(0),
            Equipable::armor($items->getIdByName('Ropas gruesas'))->soft()->protection(1)->resistance(30)->strength(0),
            Equipable::armor($items->getIdByName('Brazales'))->light()->protection(2)->resistance(10)->strength(0),
            Equipable::armor($items->getIdByName('Gambesón'))->light()->protection(2)->resistance(50)->strength(0),
            Equipable::armor($items->getIdByName('Gambesón Reforzado'))->light()->protection(3)->resistance(75)->strength(8),
            Equipable::armor($items->getIdByName('Grebas de Cuero'))->light()->protection(2)->resistance(15)->strength(0),
            Equipable::armor($items->getIdByName('Velmez'))->light()->protection(2)->resistance(25)->strength(0),
            Equipable::armor($items->getIdByName('Coracina'))->metallic()->protection(5)->resistance(150)->strength(10),
            Equipable::armor($items->getIdByName('Coraza Corta'))->metallic()->protection(6)->resistance(125)->strength(12),
            Equipable::armor($items->getIdByName('Cota de Placas'))->metallic()->protection(6)->resistance(150)->strength(12),
            Equipable::armor($items->getIdByName('Grebas de Metal'))->metallic()->protection(4)->resistance(40)->strength(8),
            Equipable::armor($items->getIdByName('Loriga de Malla'))->metallic()->protection(6)->resistance(150)->strength(12),
            Equipable::armor($items->getIdByName('Arnés'))->full()->protection(8)->resistance(200)->strength(15),
            Equipable::armor($items->getIdByName('Bacinete'))->helmet()->protection(4)->resistance(40)->strength(0),
            Equipable::armor($items->getIdByName('Capacete'))->helmet()->protection(2)->resistance(20)->strength(0),
            Equipable::armor($items->getIdByName('Celada'))->helmet()->protection(6)->resistance(80)->strength(12),
            Equipable::armor($items->getIdByName('Gorro de Cuero'))->helmet()->protection(1)->resistance(20)->strength(0),
            Equipable::armor($items->getIdByName('Yelmo'))->helmet()->protection(8)->resistance(100)->strength(15),
        ];
    }

    private function getShields(ItemsLoader $items): array
    {
        return [
            Equipable::shield($items->getIdByName('Adarga'))->resistance(50)->strength(5)->damage('1d3'),
            Equipable::shield($items->getIdByName('Broquel'))->resistance(30)->strength(5),
            Equipable::shield($items->getIdByName('Escudo de Madera'))->resistance(100)->strength(8),
            Equipable::shield($items->getIdByName('Escudo de Metal'))->resistance(150)->strength(10),
            Equipable::shield($items->getIdByName('Pavés'))->resistance(175)->strength(12),
            Equipable::shield($items->getIdByName('Rodela'))->resistance(80)->strength(8),
            Equipable::shield($items->getIdByName('Tarja'))->resistance(200)->strength(15),
        ];
    }
}
