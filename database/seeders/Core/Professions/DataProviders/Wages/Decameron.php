<?php

declare(strict_types=1);

namespace Database\Seeders\Core\Professions\DataProviders\Wages;

use Aquelarre\Core\Framework\Domain\Enum\Multiplier;
use Aquelarre\Core\Framework\Domain\Enum\Operation;
use Aquelarre\Core\Framework\Infrastructure\Seed\Loaders\Competence\CompetencesLoader;
use Aquelarre\Core\Framework\Infrastructure\Seed\Loaders\Profession\ProfessionLoader;
use Aquelarre\Core\Framework\Infrastructure\Seed\Loaders\SocialPosition\ChristianSocialPositions;
use Aquelarre\Core\Framework\Infrastructure\Seed\Loaders\SocialPosition\JudaicSocialPositions;
use Aquelarre\Core\Framework\Infrastructure\Seed\Loaders\SocialPosition\MuslimSocialPositions;
use Aquelarre\Core\Framework\Infrastructure\Seed\Loaders\SocialPosition\SocialPositionLoader;
use Aquelarre\Core\Profession\Domain\Dto\WageFluent;
use Database\Seeders\Contracts\DataProvider;

class Decameron extends DataProvider
{
    public function getData(): array
    {
        /** @var ProfessionLoader $profession */
        $profession = $this->getLoadedLoader(ProfessionLoader::class);
        /**
         * @var ChristianSocialPositions $christian
         * @var JudaicSocialPositions $judaic
         * @var MuslimSocialPositions $muslim
         */
        [$christian, $judaic, $muslim] = $this->getSocialPositions();
        /** @var CompetencesLoader $competences */
        $competences = $this->getLoadedLoader(CompetencesLoader::class);

        return collect([
            WageFluent::from($profession->get('alfaqueque'))->socialPosition($christian->bourgeois())->firstCompetence($competences->get('comerciar'))->multiplier(Multiplier::TEN),
            WageFluent::from($profession->get('alfaqueque'))->socialPosition($christian->villain())->firstCompetence($competences->get('comerciar'))->multiplier(Multiplier::TEN),
            WageFluent::from($profession->get('alfaqueque'))->socialPosition($muslim->merchant())->firstCompetence($competences->get('comerciar'))->multiplier(Multiplier::TEN),
            WageFluent::from($profession->get('alfaqueque'))->socialPosition($muslim->citizen())->firstCompetence($competences->get('comerciar'))->multiplier(Multiplier::TEN),

            WageFluent::from($profession->get('cabalista'))->socialPosition($judaic->bourgeois())->firstCompetence($competences->get('teologia'))->multiplier(Multiplier::SEVEN),

            WageFluent::from($profession->get('cantero'))->socialPosition($christian->villain())->firstCompetence($competences->get('artesania')),
            WageFluent::from($profession->get('cantero'))->socialPosition($judaic->villain())->firstCompetence($competences->get('artesania')),
            WageFluent::from($profession->get('cantero'))->socialPosition($muslim->citizen())->firstCompetence($competences->get('artesania')),

            WageFluent::from($profession->get('cetrero'))->socialPosition($christian->villain())->firstCompetence($competences->get('conocimiento animal')),
            WageFluent::from($profession->get('cetrero'))->socialPosition($christian->fieldsman())->firstCompetence($competences->get('conocimiento animal')),
            WageFluent::from($profession->get('cetrero'))->socialPosition($muslim->citizen())->firstCompetence($competences->get('conocimiento animal')),
            WageFluent::from($profession->get('cetrero'))->socialPosition($muslim->fieldsman())->firstCompetence($competences->get('conocimiento animal')),

            WageFluent::from($profession->get('frontero'))->socialPosition($christian->highNoble())->operation(Operation::GREATER_WEAPON)->multiplier(Multiplier::TEN),
            WageFluent::from($profession->get('frontero'))->socialPosition($christian->lowNoble())->operation(Operation::GREATER_WEAPON)->multiplier(Multiplier::TEN),
            WageFluent::from($profession->get('frontero'))->socialPosition($christian->bourgeois())->operation(Operation::GREATER_WEAPON)->multiplier(Multiplier::FIVE),
            WageFluent::from($profession->get('frontero'))->socialPosition($christian->villain())->operation(Operation::GREATER_WEAPON),
            WageFluent::from($profession->get('frontero'))->socialPosition($christian->fieldsman())->operation(Operation::GREATER_WEAPON),
            WageFluent::from($profession->get('frontero'))->socialPosition($muslim->highNoble())->operation(Operation::GREATER_WEAPON)->multiplier(Multiplier::TEN),
            WageFluent::from($profession->get('frontero'))->socialPosition($muslim->lowNoble())->operation(Operation::GREATER_WEAPON)->multiplier(Multiplier::TEN),
            WageFluent::from($profession->get('frontero'))->socialPosition($muslim->merchant())->operation(Operation::GREATER_WEAPON)->multiplier(Multiplier::FIVE),
            WageFluent::from($profession->get('frontero'))->socialPosition($muslim->citizen())->operation(Operation::GREATER_WEAPON),
            WageFluent::from($profession->get('frontero'))->socialPosition($muslim->fieldsman())->operation(Operation::GREATER_WEAPON),

            WageFluent::from($profession->get('rastrero'))->socialPosition($christian->bourgeois())->firstCompetence($competences->get('rastrear')),
            WageFluent::from($profession->get('rastrero'))->socialPosition($christian->villain())->firstCompetence($competences->get('rastrear')),
            WageFluent::from($profession->get('rastrero'))->socialPosition($christian->fieldsman())->firstCompetence($competences->get('rastrear')),
            WageFluent::from($profession->get('rastrero'))->socialPosition($muslim->merchant())->firstCompetence($competences->get('rastrear')),
            WageFluent::from($profession->get('rastrero'))->socialPosition($muslim->citizen())->firstCompetence($competences->get('rastrear')),
            WageFluent::from($profession->get('rastrero'))->socialPosition($muslim->fieldsman())->firstCompetence($competences->get('rastrear')),

            WageFluent::from($profession->get('tornadizo'))->socialPosition($christian->bourgeois())->operation(Operation::CURRENT_LANGUAGE),
            WageFluent::from($profession->get('tornadizo'))->socialPosition($christian->villain())->operation(Operation::CURRENT_LANGUAGE),
            WageFluent::from($profession->get('tornadizo'))->socialPosition($christian->fieldsman())->operation(Operation::CURRENT_LANGUAGE),
            WageFluent::from($profession->get('tornadizo'))->socialPosition($christian->slave())->operation(Operation::CURRENT_LANGUAGE),
            WageFluent::from($profession->get('tornadizo'))->socialPosition($muslim->merchant())->operation(Operation::CURRENT_LANGUAGE),
            WageFluent::from($profession->get('tornadizo'))->socialPosition($muslim->citizen())->operation(Operation::CURRENT_LANGUAGE),
            WageFluent::from($profession->get('tornadizo'))->socialPosition($muslim->fieldsman())->operation(Operation::CURRENT_LANGUAGE),
            WageFluent::from($profession->get('tornadizo'))->socialPosition($muslim->slave())->operation(Operation::CURRENT_LANGUAGE),
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
