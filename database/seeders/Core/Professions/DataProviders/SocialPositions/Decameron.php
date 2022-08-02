<?php

declare(strict_types=1);

namespace Database\Seeders\Core\Professions\DataProviders\SocialPositions;

use Aquelarre\Core\Framework\Infrastructure\Seed\Loaders\Profession\ProfessionLoader;
use Aquelarre\Core\Framework\Infrastructure\Seed\Loaders\SocialPosition\SocialPositionLoader;
use Aquelarre\Core\Framework\Infrastructure\Seed\Loaders\Society\SocietyLoader;
use Aquelarre\Core\Profession\Domain\Dto\SocialPositionFluent as SocialPosition;
use Database\Seeders\Contracts\DataProvider;

class Decameron extends DataProvider
{
    public function getData(): array
    {
        /** @var ProfessionLoader $profession */
        $profession = $this->getLoadedLoader(ProfessionLoader::class);
        /** @var SocialPositionLoader $socialPosition */
        $socialPosition = $this->getLoadedLoader(SocialPositionLoader::class);
        /** @var SocietyLoader $society */
        $society = $this->getLoadedLoader(SocietyLoader::class);

        return collect([
            SocialPosition::profession($profession->profession('alfaqueque'))->society($society->christian())->socialPosition($socialPosition->christian()->bourgeois()),
            SocialPosition::profession($profession->profession('alfaqueque'))->society($society->christian())->socialPosition($socialPosition->christian()->villain()),

            SocialPosition::profession($profession->profession('alfaqueque'))->society($society->muslim())->socialPosition($socialPosition->muslim()->merchant()),
            SocialPosition::profession($profession->profession('alfaqueque'))->society($society->muslim())->socialPosition($socialPosition->muslim()->citizen()),

            SocialPosition::profession($profession->profession('cabalista'))->society($society->judaic())->socialPosition($socialPosition->judaic()->bourgeois()),

            SocialPosition::profession($profession->profession('cantero'))->society($society->christian())->socialPosition($socialPosition->christian()->villain()),
            SocialPosition::profession($profession->profession('cantero'))->society($society->judaic())->socialPosition($socialPosition->judaic()->villain()),
            SocialPosition::profession($profession->profession('cantero'))->society($society->muslim())->socialPosition($socialPosition->muslim()->citizen()),

            SocialPosition::profession($profession->profession('cetrero'))->society($society->christian())->socialPosition($socialPosition->christian()->villain()),
            SocialPosition::profession($profession->profession('cetrero'))->society($society->christian())->socialPosition($socialPosition->christian()->fieldsman()),
            SocialPosition::profession($profession->profession('cetrero'))->society($society->muslim())->socialPosition($socialPosition->muslim()->citizen()),
            SocialPosition::profession($profession->profession('cetrero'))->society($society->muslim())->socialPosition($socialPosition->muslim()->fieldsman()),

            SocialPosition::profession($profession->profession('frontero'))->society($society->christian())->socialPosition($socialPosition->christian()->highNoble()),
            SocialPosition::profession($profession->profession('frontero'))->society($society->christian())->socialPosition($socialPosition->christian()->lowNoble()),
            SocialPosition::profession($profession->profession('frontero'))->society($society->christian())->socialPosition($socialPosition->christian()->bourgeois()),
            SocialPosition::profession($profession->profession('frontero'))->society($society->christian())->socialPosition($socialPosition->christian()->villain()),
            SocialPosition::profession($profession->profession('frontero'))->society($society->christian())->socialPosition($socialPosition->christian()->fieldsman()),
            SocialPosition::profession($profession->profession('frontero'))->society($society->muslim())->socialPosition($socialPosition->muslim()->highNoble()),
            SocialPosition::profession($profession->profession('frontero'))->society($society->muslim())->socialPosition($socialPosition->muslim()->lowNoble()),
            SocialPosition::profession($profession->profession('frontero'))->society($society->muslim())->socialPosition($socialPosition->muslim()->merchant()),
            SocialPosition::profession($profession->profession('frontero'))->society($society->muslim())->socialPosition($socialPosition->muslim()->citizen()),
            SocialPosition::profession($profession->profession('frontero'))->society($society->muslim())->socialPosition($socialPosition->muslim()->fieldsman()),

            SocialPosition::profession($profession->profession('rastrero'))->society($society->christian())->socialPosition($socialPosition->christian()->bourgeois()),
            SocialPosition::profession($profession->profession('rastrero'))->society($society->christian())->socialPosition($socialPosition->christian()->villain()),
            SocialPosition::profession($profession->profession('rastrero'))->society($society->christian())->socialPosition($socialPosition->christian()->fieldsman()),
            SocialPosition::profession($profession->profession('rastrero'))->society($society->muslim())->socialPosition($socialPosition->muslim()->merchant()),
            SocialPosition::profession($profession->profession('rastrero'))->society($society->muslim())->socialPosition($socialPosition->muslim()->citizen()),
            SocialPosition::profession($profession->profession('rastrero'))->society($society->muslim())->socialPosition($socialPosition->muslim()->fieldsman()),

            SocialPosition::profession($profession->profession('tornadizo'))->society($society->christian())->socialPosition($socialPosition->christian()->bourgeois()),
            SocialPosition::profession($profession->profession('tornadizo'))->society($society->christian())->socialPosition($socialPosition->christian()->villain()),
            SocialPosition::profession($profession->profession('tornadizo'))->society($society->christian())->socialPosition($socialPosition->christian()->fieldsman()),
            SocialPosition::profession($profession->profession('tornadizo'))->society($society->christian())->socialPosition($socialPosition->christian()->slave()),
            SocialPosition::profession($profession->profession('tornadizo'))->society($society->muslim())->socialPosition($socialPosition->muslim()->merchant()),
            SocialPosition::profession($profession->profession('tornadizo'))->society($society->muslim())->socialPosition($socialPosition->muslim()->citizen()),
            SocialPosition::profession($profession->profession('tornadizo'))->society($society->muslim())->socialPosition($socialPosition->muslim()->fieldsman()),
            SocialPosition::profession($profession->profession('tornadizo'))->society($society->muslim())->socialPosition($socialPosition->muslim()->slave()),
        ])->toArray();
    }
}
