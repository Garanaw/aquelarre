<?php

declare(strict_types=1);

namespace Database\Seeders\Core\Professions\DataProviders\Wages;

use Aquelarre\Core\Framework\Domain\Enum\Multiplier;
use Aquelarre\Core\Framework\Infrastructure\Seed\Loaders\Competence\CompetencesLoader;
use Aquelarre\Core\Framework\Infrastructure\Seed\Loaders\Profession\ProfessionLoader;
use Aquelarre\Core\Framework\Infrastructure\Seed\Loaders\SocialPosition\ChristianSocialPositions;
use Aquelarre\Core\Framework\Infrastructure\Seed\Loaders\SocialPosition\JudaicSocialPositions;
use Aquelarre\Core\Framework\Infrastructure\Seed\Loaders\SocialPosition\MuslimSocialPositions;
use Aquelarre\Core\Framework\Infrastructure\Seed\Loaders\SocialPosition\SocialPositionLoader;
use Aquelarre\Core\Profession\Domain\Dto\WageFluent;
use Database\Seeders\Contracts\DataProvider;

class Daemonolatreia extends DataProvider
{
    public function getData(): array
    {
        /** @var ProfessionLoader $profession */
        $profession = $this->getLoadedLoader(ProfessionLoader::class);
        /** @var CompetencesLoader $competences */
        $competences = $this->getLoadedLoader(CompetencesLoader::class);
        /**
         * @var ChristianSocialPositions $christian
         * @var JudaicSocialPositions $judaic
         * @var MuslimSocialPositions $muslim
         */
        [$christian, $judaic, $muslim] = $this->getSocialPositions();

        return collect([
            WageFluent::from($profession->get('demonologo hechicero'))->socialPosition($christian->highNoble())->firstCompetence($competences->get('demonologia'))->multiplier(Multiplier::TEN),
            WageFluent::from($profession->get('demonologo hechicero'))->socialPosition($christian->lowNoble())->firstCompetence($competences->get('demonologia'))->multiplier(Multiplier::TEN),
            WageFluent::from($profession->get('demonologo hechicero'))->socialPosition($christian->bourgeois())->firstCompetence($competences->get('demonologia'))->multiplier(Multiplier::TEN),
            WageFluent::from($profession->get('demonologo hechicero'))->socialPosition($christian->villain())->firstCompetence($competences->get('demonologia'))->multiplier(Multiplier::TEN),
            WageFluent::from($profession->get('demonologo hechicero'))->socialPosition($christian->fieldsman())->firstCompetence($competences->get('demonologia'))->multiplier(Multiplier::TEN),

            WageFluent::from($profession->get('demonologo hechicero'))->socialPosition($judaic->bourgeois())->firstCompetence($competences->get('demonologia'))->multiplier(Multiplier::TEN),
            WageFluent::from($profession->get('demonologo hechicero'))->socialPosition($judaic->villain())->firstCompetence($competences->get('demonologia'))->multiplier(Multiplier::TEN),

            WageFluent::from($profession->get('demonologo hechicero'))->socialPosition($muslim->highNoble())->firstCompetence($competences->get('demonologia'))->multiplier(Multiplier::TEN),
            WageFluent::from($profession->get('demonologo hechicero'))->socialPosition($muslim->lowNoble())->firstCompetence($competences->get('demonologia'))->multiplier(Multiplier::TEN),
            WageFluent::from($profession->get('demonologo hechicero'))->socialPosition($muslim->merchant())->firstCompetence($competences->get('demonologia'))->multiplier(Multiplier::TEN),
            WageFluent::from($profession->get('demonologo hechicero'))->socialPosition($muslim->citizen())->firstCompetence($competences->get('demonologia'))->multiplier(Multiplier::TEN),
            WageFluent::from($profession->get('demonologo hechicero'))->socialPosition($muslim->fieldsman())->firstCompetence($competences->get('demonologia'))->multiplier(Multiplier::TEN),
        ])->toArray();
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
