<?php

declare(strict_types=1);

namespace Database\Seeders\Core\SocialPosition;

use Aquelarre\Core\Framework\Infrastructure\Seed\Loaders\SocialPosition\SocialPositionLoader;
use Aquelarre\Core\Framework\Infrastructure\Seed\Seeder;

class TitleSeeder extends Seeder
{
    protected string $table = 'titles';

    public function run(): bool
    {
        $this->db->table(table: $this->table)->insert(values: $this->getData());
        return true;
    }

    /** @SuppressWarnings(PHPMD.ExcessiveMethodLength) */
    // phpcs:disable
    public function getData(): array
    {
        /** @var SocialPositionLoader $socialPositions */
        $socialPositions = tap(
            value: $this->getLoader(SocialPositionLoader::class),
            callback: fn(SocialPositionLoader $loader) => $loader->load(),
        );

        return [
            [
                'social_position_id' => $socialPositions->christian()->highNoble(),
                'name' => 'Duque',
                'description' => 'Título nobiliario más alto que existe, sólo superado por la familia real. Recibe el tratamiento de Excelencia',
            ],
            [
                'social_position_id' => $socialPositions->christian()->highNoble(),
                'name' => 'Marqués',
                'description' => 'Propietario de grandes zonas territoriales o marcas. Recibe el tratamiento de Ilustrísimo.',
            ],
            [
                'social_position_id' => $socialPositions->christian()->highNoble(),
                'name' => 'Conde',
                'description' => 'Propietario de condados fronterizos. Recibe el tratamiento de Ilustrísimo.',
            ],
            [
                'social_position_id' => $socialPositions->christian()->highNoble(),
                'name' => 'Vizconde',
                'description' => 'Ejerce de sustituto del conde cuando éste no puede ocupar su cargo. Recibe el tratamiento de Ilustrísimo.',
            ],
            [
                'social_position_id' => $socialPositions->christian()->highNoble(),
                'name' => 'Barón',
                'description' => 'Propietario de pequeñas baronías, especialmente frecuentes en la corona de Aragón. Recibe el tratamiento de Ilustrísimo.',
            ],
            [
                'social_position_id' => $socialPositions->christian()->lowNoble(),
                'name' => 'Señor',
                'description' => 'Dueño de un feudo que depende de una baronía o condado mayor.',
            ],
            [
                'social_position_id' => $socialPositions->christian()->lowNoble(),
                'name' => 'Caballero',
                'description' => 'Noble que sirve a la casa real o a un noble poderoso —ya sea como guerrero o, en el caso de las mujeres, en el cuidado de los hijos y esposas— a cambio de una parcela de tierra, manutención o incluso dinero.',
            ],
            [
                'social_position_id' => $socialPositions->christian()->lowNoble(),
                'name' => 'Hidalgo',
                'description' => 'Miembro inferior de la nobleza, sin apenas bienes, pero que está exento del pago de impuestos.',
            ],
            [
                'social_position_id' => $socialPositions->christian()->fieldsman(),
                'name' => 'Colono (cristiano)',
                'description' => 'Es el campesino dueño de la tierra que trabaja.',
            ],
            [
                'social_position_id' => $socialPositions->christian()->fieldsman(),
                'name' => 'Vasallo (cristiano)',
                'description' => 'Se trata del campesino que trabaja la tierra del señor feudal, quien le ofrece a cambio protección y una parte del producto obtenido.',
            ],
            [
                'social_position_id' => $socialPositions->christian()->fieldsman(),
                'name' => 'Siervo de la Gleba',
                'description' => 'Es el campesino ligado de por vida a la tierra a la que trabaja. No puede abandonar el territorio sin el permiso expreso de su señor y es comprado y vendido con ella.',
            ],
            [
                'social_position_id' => $socialPositions->muslim()->highNoble(),
                'name' => 'Sharif (Jerife)',
                'description' => 'Se trata de los descendientes directos de Mahoma o miembros de alguna de las familias más poderosas del reino nazarí.',
            ],
            [
                'social_position_id' => $socialPositions->muslim()->highNoble(),
                'name' => 'Shayj (Jeque)',
                'description' => 'Son los descendientes de los caudillos de las antiguas tribus árabes o respetados maestros en leyes y religión.',
            ],
            [
                'social_position_id' => $socialPositions->muslim()->highNoble(),
                'name' => 'Emir',
                'description' => 'Título nobiliario que designa al gobernador de una provincia o de parte del ejército.',
            ],
            [
                'social_position_id' => $socialPositions->muslim()->highNoble(),
                'name' => 'Qadi (Cadí)',
                'description' => 'Juez de la ley islámica (la Sharia) que también puede ejercer de gobernador de un distrito.',
            ],
            [
                'social_position_id' => $socialPositions->muslim()->lowNoble(),
                'name' => 'Sa´id (Señor)',
                'description' => 'Se trata de un descendiente de la vieja aristocracia tribal que suele poseer poco más que su título.',
            ],
            [
                'social_position_id' => $socialPositions->muslim()->lowNoble(),
                'name' => 'Al-Barraz',
                'description' => 'Es una especie de caballero islámico que lucha al servicio de su señor, especialmente en duelos en los que el honor del señor está en entredicho o antes de una batalla contra un campeón del bando contrario.',
            ],
            [
                'social_position_id' => $socialPositions->muslim()->fieldsman(),
                'name' => 'Colono (musulmán)',
                'description' => 'Es el campesino dueño de la tierra que trabaja.',
            ],
            [
                'social_position_id' => $socialPositions->muslim()->fieldsman(),
                'name' => 'Vasallo (musulmán)',
                'description' => 'Se trata del campesino que trabaja la tierra del señor feudal, quien le ofrece a cambio protección y una parte del producto obtenido.',
            ],
        ];
    }
}
