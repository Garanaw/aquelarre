<?php

declare(strict_types=1);

namespace Database\Seeders\Core\People;

use Aquelarre\Core\Framework\Infrastructure\Seed\Loaders\People\PeopleLoader;
use Aquelarre\Core\Framework\Infrastructure\Seed\Loaders\SocialPosition\SocialPositionLoader;
use Aquelarre\Core\Framework\Infrastructure\Seed\Seeder;

class PeopleSocialPositionSeeder extends Seeder
{
    protected string $table = 'people_social_position';

    public function run(): bool
    {
        $this->db->table(table: $this->table)->insert(values: $this->getData());
        return true;
    }

    protected function getData(): array
    {
        /** @var PeopleLoader $people */
        $people = $this->getLoadedLoader(PeopleLoader::class);
        /** @var SocialPositionLoader $socialPositions */
        $socialPositions = $this->getLoadedLoader(SocialPositionLoader::class);

        return [
            [
                'people_id' => $people->castilian(),
                'social_position_id' => $socialPositions->christian()->highNoble(),
            ],
            [
                'people_id' => $people->castilian(),
                'social_position_id' => $socialPositions->christian()->lowNoble(),
            ],
            [
                'people_id' => $people->castilian(),
                'social_position_id' => $socialPositions->christian()->bourgeois(),
            ],
            [
                'people_id' => $people->castilian(),
                'social_position_id' => $socialPositions->christian()->villain(),
            ],
            [
                'people_id' => $people->castilian(),
                'social_position_id' => $socialPositions->christian()->fieldsman(),
            ],
            [
                'people_id' => $people->galician(),
                'social_position_id' => $socialPositions->christian()->highNoble(),
            ],
            [
                'people_id' => $people->galician(),
                'social_position_id' => $socialPositions->christian()->lowNoble(),
            ],
            [
                'people_id' => $people->galician(),
                'social_position_id' => $socialPositions->christian()->bourgeois(),
            ],
            [
                'people_id' => $people->galician(),
                'social_position_id' => $socialPositions->christian()->villain(),
            ],
            [
                'people_id' => $people->galician(),
                'social_position_id' => $socialPositions->christian()->fieldsman(),
            ],
            [
                'people_id' => $people->vasque(),
                'social_position_id' => $socialPositions->christian()->villain(),
            ],
            [
                'people_id' => $people->vasque(),
                'social_position_id' => $socialPositions->christian()->fieldsman(),
            ],
            [
                'people_id' => $people->asturian(),
                'social_position_id' => $socialPositions->christian()->highNoble(),
            ],
            [
                'people_id' => $people->asturian(),
                'social_position_id' => $socialPositions->christian()->lowNoble(),
            ],
            [
                'people_id' => $people->asturian(),
                'social_position_id' => $socialPositions->christian()->bourgeois(),
            ],
            [
                'people_id' => $people->asturian(),
                'social_position_id' => $socialPositions->christian()->villain(),
            ],
            [
                'people_id' => $people->asturian(),
                'social_position_id' => $socialPositions->christian()->fieldsman(),
            ],
            [
                'people_id' => $people->mudejar(),
                'social_position_id' => $socialPositions->christian()->bourgeois(),
            ],
            [
                'people_id' => $people->mudejar(),
                'social_position_id' => $socialPositions->christian()->villain(),
            ],
            [
                'people_id' => $people->mudejar(),
                'social_position_id' => $socialPositions->christian()->fieldsman(),
            ],
            [
                'people_id' => $people->mudejar(),
                'social_position_id' => $socialPositions->christian()->slave(),
            ],
            [
                'people_id' => $people->jewish(),
                'social_position_id' => $socialPositions->judaic()->bourgeois(),
            ],
            [
                'people_id' => $people->jewish(),
                'social_position_id' => $socialPositions->judaic()->villain(),
            ],
            [
                'people_id' => $people->aragon(),
                'social_position_id' => $socialPositions->christian()->highNoble(),
            ],
            [
                'people_id' => $people->aragon(),
                'social_position_id' => $socialPositions->christian()->lowNoble(),
            ],
            [
                'people_id' => $people->aragon(),
                'social_position_id' => $socialPositions->christian()->bourgeois(),
            ],
            [
                'people_id' => $people->aragon(),
                'social_position_id' => $socialPositions->christian()->villain(),
            ],
            [
                'people_id' => $people->aragon(),
                'social_position_id' => $socialPositions->christian()->fieldsman(),
            ],
            [
                'people_id' => $people->catalan(),
                'social_position_id' => $socialPositions->christian()->highNoble(),
            ],
            [
                'people_id' => $people->catalan(),
                'social_position_id' => $socialPositions->christian()->lowNoble(),
            ],
            [
                'people_id' => $people->catalan(),
                'social_position_id' => $socialPositions->christian()->bourgeois(),
            ],
            [
                'people_id' => $people->catalan(),
                'social_position_id' => $socialPositions->christian()->villain(),
            ],
            [
                'people_id' => $people->catalan(),
                'social_position_id' => $socialPositions->christian()->fieldsman(),
            ],
            [
                'people_id' => $people->arabic(),
                'social_position_id' => $socialPositions->muslim()->highNoble(),
            ],
            [
                'people_id' => $people->arabic(),
                'social_position_id' => $socialPositions->muslim()->lowNoble(),
            ],
            [
                'people_id' => $people->arabic(),
                'social_position_id' => $socialPositions->muslim()->merchant(),
            ],
            [
                'people_id' => $people->arabic(),
                'social_position_id' => $socialPositions->muslim()->citizen(),
            ],
            [
                'people_id' => $people->arabic(),
                'social_position_id' => $socialPositions->muslim()->fieldsman(),
            ],
            [
                'people_id' => $people->arabic(),
                'social_position_id' => $socialPositions->muslim()->slave(),
            ],
            [
                'people_id' => $people->mozarabic(),
                'social_position_id' => $socialPositions->muslim()->merchant(),
            ],
            [
                'people_id' => $people->mozarabic(),
                'social_position_id' => $socialPositions->muslim()->citizen(),
            ],
            [
                'people_id' => $people->mozarabic(),
                'social_position_id' => $socialPositions->muslim()->fieldsman(),
            ],
            [
                'people_id' => $people->mozarabic(),
                'social_position_id' => $socialPositions->muslim()->slave(),
            ],
            [
                'people_id' => $people->navarro(),
                'social_position_id' => $socialPositions->christian()->highNoble(),
            ],
            [
                'people_id' => $people->navarro(),
                'social_position_id' => $socialPositions->christian()->lowNoble(),
            ],
            [
                'people_id' => $people->navarro(),
                'social_position_id' => $socialPositions->christian()->bourgeois(),
            ],
            [
                'people_id' => $people->navarro(),
                'social_position_id' => $socialPositions->christian()->villain(),
            ],
            [
                'people_id' => $people->navarro(),
                'social_position_id' => $socialPositions->christian()->fieldsman(),
            ],
            [
                'people_id' => $people->portuguese(),
                'social_position_id' => $socialPositions->christian()->highNoble(),
            ],
            [
                'people_id' => $people->portuguese(),
                'social_position_id' => $socialPositions->christian()->lowNoble(),
            ],
            [
                'people_id' => $people->portuguese(),
                'social_position_id' => $socialPositions->christian()->bourgeois(),
            ],
            [
                'people_id' => $people->portuguese(),
                'social_position_id' => $socialPositions->christian()->villain(),
            ],
            [
                'people_id' => $people->portuguese(),
                'social_position_id' => $socialPositions->christian()->fieldsman(),
            ],
        ];
    }
}
