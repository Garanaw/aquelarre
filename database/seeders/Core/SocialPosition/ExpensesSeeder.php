<?php

declare(strict_types=1);

namespace Database\Seeders\Core\SocialPosition;

use Aquelarre\Core\Framework\Infrastructure\Seed\Loaders\SocialPosition\ChristianSocialPositions;
use Aquelarre\Core\Framework\Infrastructure\Seed\Loaders\SocialPosition\JudaicSocialPositions;
use Aquelarre\Core\Framework\Infrastructure\Seed\Loaders\SocialPosition\MuslimSocialPositions;
use Aquelarre\Core\Framework\Infrastructure\Seed\Loaders\SocialPosition\SocialPositionLoader;
use Aquelarre\Core\Framework\Infrastructure\Seed\Seeder;

class ExpensesSeeder extends Seeder
{
    protected string $table = 'expenses';

    public function run(): bool
    {
        $this->db->table(table: $this->table)->insert(values: $this->getData());
        return true;
    }

    protected function getData(): array
    {
        /**
         * @var ChristianSocialPositions $christian
         * @var JudaicSocialPositions $judaic
         * @var MuslimSocialPositions $muslim
         */
        [$christian, $judaic, $muslim] = $this->getSocialPositions();

        return [
            [
                'social_position_id' => $christian->highNoble(),
                'week_spense' => 350,
                'spense_per_kid' => 80,
                'average_monthly_incoming' => 1800
            ],
            [
                'social_position_id' => $christian->lowNoble(),
                'week_spense' => 100,
                'spense_per_kid' => 65,
                'average_monthly_incoming' => 500
            ],
            [
                'social_position_id' => $christian->bourgeois(),
                'week_spense' => 150,
                'spense_per_kid' => 50,
                'average_monthly_incoming' => 750
            ],
            [
                'social_position_id' => $christian->villain(),
                'week_spense' => 20,
                'spense_per_kid' => 2,
                'average_monthly_incoming' => 80
            ],
            [
                'social_position_id' => $christian->fieldsman(),
                'week_spense' => 10,
                'spense_per_kid' => 1,
                'average_monthly_incoming' => 40
            ],
            [
                'social_position_id' => $christian->slave(),
                'week_spense' => 0,
                'spense_per_kid' => 0,
                'average_monthly_incoming' => 0
            ],
            [
                'social_position_id' => $judaic->bourgeois(),
                'week_spense' => 150,
                'spense_per_kid' => 50,
                'average_monthly_incoming' => 750
            ],
            [
                'social_position_id' => $judaic->villain(),
                'week_spense' => 20,
                'spense_per_kid' => 2,
                'average_monthly_incoming' => 80
            ],
            [
                'social_position_id' => $muslim->highNoble(),
                'week_spense' => 350,
                'spense_per_kid' => 80,
                'average_monthly_incoming' => 1800
            ],
            [
                'social_position_id' => $muslim->lowNoble(),
                'week_spense' => 100,
                'spense_per_kid' => 65,
                'average_monthly_incoming' => 500
            ],
            [
                'social_position_id' => $muslim->merchant(),
                'week_spense' => 150,
                'spense_per_kid' => 50,
                'average_monthly_incoming' => 750
            ],
            [
                'social_position_id' => $muslim->citizen(),
                'week_spense' => 20,
                'spense_per_kid' => 2,
                'average_monthly_incoming' => 80
            ],
            [
                'social_position_id' => $muslim->fieldsman(),
                'week_spense' => 10,
                'spense_per_kid' => 1,
                'average_monthly_incoming' => 40
            ],
            [
                'social_position_id' => $muslim->slave(),
                'week_spense' => 0,
                'spense_per_kid' => 0,
                'average_monthly_incoming' => 0
            ]
        ];
    }

    private function getSocialPositions(): array
    {
        /** @var SocialPositionLoader $loader */
        $loader = $this->getLoadedLoader(SocialPositionLoader::class);

        return [
            $loader->christian(),
            $loader->judaic(),
            $loader->muslim(),
        ];
    }
}
