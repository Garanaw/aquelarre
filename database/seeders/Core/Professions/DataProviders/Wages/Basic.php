<?php

declare(strict_types=1);

namespace Database\Seeders\Core\Professions\DataProviders\Wages;

use Aquelarre\Core\Framework\Domain\Enum\Multiplier;
use Aquelarre\Core\Framework\Domain\Enum\Operation;
use Aquelarre\Core\Framework\Infrastructure\Seed\Loaders\Characteristic\CharacteristicsLoader;
use Aquelarre\Core\Framework\Infrastructure\Seed\Loaders\Competence\CompetencesLoader;
use Aquelarre\Core\Framework\Infrastructure\Seed\Loaders\Profession\ProfessionLoader;
use Aquelarre\Core\Framework\Infrastructure\Seed\Loaders\SocialPosition\ChristianSocialPositions;
use Aquelarre\Core\Framework\Infrastructure\Seed\Loaders\SocialPosition\JudaicSocialPositions;
use Aquelarre\Core\Framework\Infrastructure\Seed\Loaders\SocialPosition\MuslimSocialPositions;
use Aquelarre\Core\Framework\Infrastructure\Seed\Loaders\SocialPosition\SocialPositionLoader;
use Aquelarre\Core\Framework\Infrastructure\Seed\Loaders\SocialPosition\TitlesLoader;
use Aquelarre\Core\Profession\Domain\Dto\WageFluent;
use Database\Seeders\Contracts\DataProvider;

class Basic extends DataProvider
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
        /** @var CharacteristicsLoader $characteristics */
        $characteristics = $this->getLoadedLoader(CharacteristicsLoader::class);
        /** @var CompetencesLoader $competences */
        $competences = $this->getLoadedLoader(CompetencesLoader::class);
        /** @var TitlesLoader $title */
        $title = $this->getLoadedLoader(TitlesLoader::class);

        return collect([
            WageFluent::from($profession->get('alguacil'))->socialPosition($christian->bourgeois())->maravedies(750),
            WageFluent::from($profession->get('alguacil'))->socialPosition($christian->villain())->maravedies(80),
            WageFluent::from($profession->get('alguacil'))->socialPosition($muslim->merchant())->maravedies(750),
            WageFluent::from($profession->get('alguacil'))->socialPosition($muslim->citizen())->maravedies(80),

            WageFluent::from($profession->get('almogavar'))->socialPosition($christian->fieldsman())->characteristic($characteristics->luck())->multiplier(Multiplier::TWO),

            WageFluent::from($profession->get('alquimista'))->socialPosition($christian->highNoble())->firstCompetence($competences->get('alquimia'))->multiplier(Multiplier::TWENTY),
            WageFluent::from($profession->get('alquimista'))->socialPosition($christian->lowNoble())->firstCompetence($competences->get('alquimia'))->multiplier(Multiplier::TEN),
            WageFluent::from($profession->get('alquimista'))->socialPosition($christian->bourgeois())->firstCompetence($competences->get('alquimia'))->multiplier(Multiplier::FIVE),
            WageFluent::from($profession->get('alquimista'))->socialPosition($judaic->bourgeois())->firstCompetence($competences->get('alquimia'))->multiplier(Multiplier::FIVE),
            WageFluent::from($profession->get('alquimista'))->socialPosition($muslim->highNoble())->firstCompetence($competences->get('alquimia'))->multiplier(Multiplier::TWENTY),
            WageFluent::from($profession->get('alquimista'))->socialPosition($muslim->lowNoble())->firstCompetence($competences->get('alquimia'))->multiplier(Multiplier::TEN),
            WageFluent::from($profession->get('alquimista'))->socialPosition($muslim->merchant())->firstCompetence($competences->get('alquimia'))->multiplier(Multiplier::FIVE),

            WageFluent::from($profession->get('ama'))->socialPosition($christian->lowNoble())->maravedies(350),

            WageFluent::from($profession->get('artesano'))->socialPosition($christian->villain())->firstCompetence($competences->get('artesania')),
            WageFluent::from($profession->get('artesano'))->socialPosition($judaic->villain())->firstCompetence($competences->get('artesania')),
            WageFluent::from($profession->get('artesano'))->socialPosition($muslim->citizen())->firstCompetence($competences->get('artesania')),

            WageFluent::from($profession->get('bandido'))->socialPosition($christian->fieldsman())->characteristic($characteristics->luck())->multiplier(Multiplier::TWO),
            WageFluent::from($profession->get('bandido'))->socialPosition($muslim->fieldsman())->characteristic($characteristics->luck())->multiplier(Multiplier::TWO),

            WageFluent::from($profession->get('barbero_cirujano'))->socialPosition($christian->bourgeois())->firstCompetence($competences->get('sanar'))->multiplier(Multiplier::FIVE),
            WageFluent::from($profession->get('barbero_cirujano'))->socialPosition($christian->villain())->firstCompetence($competences->get('sanar'))->multiplier(Multiplier::TWO),
            WageFluent::from($profession->get('barbero_cirujano'))->socialPosition($judaic->bourgeois())->firstCompetence($competences->get('sanar'))->multiplier(Multiplier::FIVE),
            WageFluent::from($profession->get('barbero_cirujano'))->socialPosition($judaic->villain())->firstCompetence($competences->get('sanar'))->multiplier(Multiplier::TWO),
            WageFluent::from($profession->get('barbero_cirujano'))->socialPosition($muslim->merchant())->firstCompetence($competences->get('sanar'))->multiplier(Multiplier::FIVE),
            WageFluent::from($profession->get('barbero_cirujano'))->socialPosition($muslim->citizen())->firstCompetence($competences->get('sanar'))->multiplier(Multiplier::TWO),

            WageFluent::from($profession->get('brujo'))->socialPosition($christian->fieldsman())->characteristic($characteristics->luck())->multiplier(Multiplier::TWO),
            WageFluent::from($profession->get('brujo'))->socialPosition($muslim->fieldsman())->characteristic($characteristics->luck())->multiplier(Multiplier::TWO),

            WageFluent::from($profession->get('bufon'))->socialPosition($christian->villain())->firstCompetence($competences->get('elocuencia'))->secondCompetence($competences->get('saltar'))->operation(Operation::GREATER_THAN),
            WageFluent::from($profession->get('bufon'))->socialPosition($christian->slave())->maravedies(0),
            WageFluent::from($profession->get('bufon'))->socialPosition($judaic->villain())->firstCompetence($competences->get('elocuencia'))->secondCompetence($competences->get('saltar'))->operation(Operation::GREATER_THAN),
            WageFluent::from($profession->get('bufon'))->socialPosition($muslim->citizen())->firstCompetence($competences->get('elocuencia'))->secondCompetence($competences->get('saltar'))->operation(Operation::GREATER_THAN),
            WageFluent::from($profession->get('bufon'))->socialPosition($muslim->slave())->maravedies(0),

            WageFluent::from($profession->get('caballero_de_orden_militar_hombre'))->socialPosition($christian->highNoble())->maravedies(1800),
            WageFluent::from($profession->get('caballero_de_orden_militar_hombre'))->socialPosition($christian->lowNoble())->maravedies(500),
            WageFluent::from($profession->get('caballero_de_orden_militar_mujer'))->socialPosition($christian->highNoble())->maravedies(1800),
            WageFluent::from($profession->get('caballero_de_orden_militar_mujer'))->socialPosition($christian->lowNoble())->maravedies(500),

            WageFluent::from($profession->get('cambista'))->socialPosition($christian->bourgeois())->firstCompetence($competences->get('comerciar'))->multiplier(Multiplier::TEN),
            WageFluent::from($profession->get('cambista'))->socialPosition($judaic->bourgeois())->firstCompetence($competences->get('comerciar'))->multiplier(Multiplier::TEN),
            WageFluent::from($profession->get('cambista'))->socialPosition($muslim->merchant())->firstCompetence($competences->get('comerciar'))->multiplier(Multiplier::TEN),

            WageFluent::from($profession->get('cazador'))->socialPosition($christian->fieldsman())->firstCompetence($competences->get('rastrear')),
            WageFluent::from($profession->get('cazador'))->socialPosition($muslim->fieldsman())->firstCompetence($competences->get('rastrear')),

            WageFluent::from($profession->get('clerigo'))->socialPosition($christian->highNoble())->title($title->get('duque'))->maravedies(2450),
            WageFluent::from($profession->get('clerigo'))->socialPosition($christian->highNoble())->title($title->get('marques'))->maravedies(2100),
            WageFluent::from($profession->get('clerigo'))->socialPosition($christian->highNoble())->title($title->get('conde'))->maravedies(1750),
            WageFluent::from($profession->get('clerigo'))->socialPosition($christian->highNoble())->title($title->get('vizconde'))->maravedies(1400),
            WageFluent::from($profession->get('clerigo'))->socialPosition($christian->highNoble())->title($title->get('baron'))->maravedies(1050),
            WageFluent::from($profession->get('clerigo'))->socialPosition($christian->lowNoble())->title($title->get('senor'))->maravedies(700),
            WageFluent::from($profession->get('clerigo'))->socialPosition($christian->lowNoble())->title($title->get('caballero'))->maravedies(350),
            WageFluent::from($profession->get('clerigo'))->socialPosition($christian->lowNoble())->title($title->get('hidalgo'))->maravedies(350),

            WageFluent::from($profession->get('comerciante'))->socialPosition($christian->bourgeois())->firstCompetence($competences->get('comerciar'))->multiplier(Multiplier::TEN),
            WageFluent::from($profession->get('comerciante'))->socialPosition($muslim->merchant())->firstCompetence($competences->get('comerciar'))->multiplier(Multiplier::TEN),

            WageFluent::from($profession->get('comico'))->socialPosition($christian->villain())->characteristic($characteristics->luck())->multiplier(Multiplier::TWO),
            WageFluent::from($profession->get('comico'))->socialPosition($judaic->villain())->characteristic($characteristics->luck())->multiplier(Multiplier::TWO),
            WageFluent::from($profession->get('comico'))->socialPosition($muslim->citizen())->characteristic($characteristics->luck())->multiplier(Multiplier::TWO),

            WageFluent::from($profession->get('cortesano'))->socialPosition($christian->highNoble())->maravedies(1800),
            WageFluent::from($profession->get('cortesano'))->socialPosition($christian->lowNoble())->maravedies(500),
            WageFluent::from($profession->get('cortesano'))->socialPosition($muslim->highNoble())->maravedies(1800),
            WageFluent::from($profession->get('cortesano'))->socialPosition($muslim->lowNoble())->maravedies(500),

            WageFluent::from($profession->get('curandero'))->socialPosition($christian->fieldsman())->firstCompetence($competences->get('sanar')),
            WageFluent::from($profession->get('curandero'))->socialPosition($christian->slave())->maravedies(0),
            WageFluent::from($profession->get('curandero'))->socialPosition($muslim->fieldsman())->firstCompetence($competences->get('sanar')),
            WageFluent::from($profession->get('curandero'))->socialPosition($muslim->slave())->maravedies(0),

            WageFluent::from($profession->get('derviche'))->socialPosition($muslim->lowNoble())->maravedies(0),
            WageFluent::from($profession->get('derviche'))->socialPosition($muslim->merchant())->maravedies(0),
            WageFluent::from($profession->get('derviche'))->socialPosition($muslim->citizen())->maravedies(0),

            WageFluent::from($profession->get('embaucador'))->socialPosition($christian->villain())->firstCompetence($competences->get('elocuencia')),
            WageFluent::from($profession->get('embaucador'))->socialPosition($judaic->villain())->firstCompetence($competences->get('elocuencia')),
            WageFluent::from($profession->get('embaucador'))->socialPosition($muslim->citizen())->firstCompetence($competences->get('elocuencia')),

            WageFluent::from($profession->get('escriba'))->socialPosition($christian->bourgeois())->firstCompetence($competences->get('leer_y_escribir'))->multiplier(Multiplier::TEN),
            WageFluent::from($profession->get('escriba'))->socialPosition($christian->slave())->maravedies(0),
            WageFluent::from($profession->get('escriba'))->socialPosition($judaic->bourgeois())->firstCompetence($competences->get('leer_y_escribir'))->multiplier(Multiplier::TEN),
            WageFluent::from($profession->get('escriba'))->socialPosition($muslim->merchant())->firstCompetence($competences->get('leer_y_escribir'))->multiplier(Multiplier::TEN),
            WageFluent::from($profession->get('escriba'))->socialPosition($muslim->slave())->maravedies(0),

            WageFluent::from($profession->get('ghazi'))->socialPosition($muslim->highNoble())->maravedies(500),
            WageFluent::from($profession->get('ghazi'))->socialPosition($muslim->lowNoble())->maravedies(500),
            WageFluent::from($profession->get('ghazi'))->socialPosition($muslim->merchant())->maravedies(500),
            WageFluent::from($profession->get('ghazi'))->socialPosition($muslim->citizen())->maravedies(80),
            WageFluent::from($profession->get('ghazi'))->socialPosition($muslim->fieldsman())->maravedies(80),

            WageFluent::from($profession->get('goliardo'))->socialPosition($christian->villain())->firstCompetence($competences->get('leer_y_escribir')),

            WageFluent::from($profession->get('infanzon'))->socialPosition($christian->highNoble())->maravedies(1800),
            WageFluent::from($profession->get('infanzon'))->socialPosition($christian->lowNoble())->maravedies(500),
            WageFluent::from($profession->get('infanzon'))->socialPosition($muslim->highNoble())->maravedies(1800),
            WageFluent::from($profession->get('infanzon'))->socialPosition($muslim->lowNoble())->maravedies(500),

            WageFluent::from($profession->get('juglar'))->socialPosition($christian->villain())->firstCompetence($competences->get('cantar'))->secondCompetence($competences->get('elocuencia'))->thirdCompetence($competences->get('musica'))->operation(Operation::GREATER_THAN),
            WageFluent::from($profession->get('juglar'))->socialPosition($christian->slave())->maravedies(0),
            WageFluent::from($profession->get('juglar'))->socialPosition($judaic->villain())->firstCompetence($competences->get('cantar'))->secondCompetence($competences->get('elocuencia'))->thirdCompetence($competences->get('musica'))->operation(Operation::GREATER_THAN),
            WageFluent::from($profession->get('juglar'))->socialPosition($muslim->citizen())->firstCompetence($competences->get('cantar'))->secondCompetence($competences->get('elocuencia'))->thirdCompetence($competences->get('musica'))->operation(Operation::GREATER_THAN),
            WageFluent::from($profession->get('juglar'))->socialPosition($muslim->slave())->maravedies(0),

            WageFluent::from($profession->get('ladron'))->socialPosition($christian->villain())->characteristic($characteristics->luck())->multiplier(Multiplier::TWO),
            WageFluent::from($profession->get('ladron'))->socialPosition($judaic->villain())->characteristic($characteristics->luck())->multiplier(Multiplier::TWO),
            WageFluent::from($profession->get('ladron'))->socialPosition($muslim->citizen())->characteristic($characteristics->luck())->multiplier(Multiplier::TWO),

            WageFluent::from($profession->get('mago'))->socialPosition($muslim->highNoble())->firstCompetence($competences->get('conocimiento_magico'))->multiplier(Multiplier::TWENTY),
            WageFluent::from($profession->get('mago'))->socialPosition($muslim->lowNoble())->firstCompetence($competences->get('conocimiento_magico'))->multiplier(Multiplier::TEN),
            WageFluent::from($profession->get('mago'))->socialPosition($muslim->merchant())->firstCompetence($competences->get('conocimiento_magico'))->multiplier(Multiplier::FIVE),

            WageFluent::from($profession->get('malsin'))->socialPosition($judaic->villain())->characteristic($characteristics->luck())->multiplier(Multiplier::TWO),

            WageFluent::from($profession->get('marino'))->socialPosition($christian->bourgeois())->firstCompetence($competences->get('navegar'))->multiplier(Multiplier::FIVE),
            WageFluent::from($profession->get('marino'))->socialPosition($christian->villain())->firstCompetence($competences->get('navegar'))->multiplier(Multiplier::FIVE),
            WageFluent::from($profession->get('marino'))->socialPosition($judaic->bourgeois())->firstCompetence($competences->get('navegar'))->multiplier(Multiplier::FIVE),
            WageFluent::from($profession->get('marino'))->socialPosition($judaic->villain())->firstCompetence($competences->get('navegar'))->multiplier(Multiplier::FIVE),
            WageFluent::from($profession->get('marino'))->socialPosition($muslim->merchant())->firstCompetence($competences->get('navegar'))->multiplier(Multiplier::FIVE),
            WageFluent::from($profession->get('marino'))->socialPosition($muslim->citizen())->firstCompetence($competences->get('navegar'))->multiplier(Multiplier::FIVE),

            WageFluent::from($profession->get('medico'))->socialPosition($christian->bourgeois())->firstCompetence($competences->get('medicina'))->multiplier(Multiplier::TEN),
            WageFluent::from($profession->get('medico'))->socialPosition($judaic->bourgeois())->firstCompetence($competences->get('medicina'))->multiplier(Multiplier::TEN),
            WageFluent::from($profession->get('medico'))->socialPosition($muslim->merchant())->firstCompetence($competences->get('medicina'))->multiplier(Multiplier::TEN),

            WageFluent::from($profession->get('mediero'))->socialPosition($judaic->bourgeois())->firstCompetence($competences->get('comerciar'))->multiplier(Multiplier::TEN),

            WageFluent::from($profession->get('mendigo'))->socialPosition($christian->villain())->firstCompetence($competences->get('elocuencia'))->operation(Operation::DIVIDE)->multiplier(Multiplier::TEN),
            WageFluent::from($profession->get('mendigo'))->socialPosition($christian->fieldsman())->firstCompetence($competences->get('elocuencia'))->operation(Operation::DIVIDE)->multiplier(Multiplier::TEN),
            WageFluent::from($profession->get('mendigo'))->socialPosition($christian->slave())->firstCompetence($competences->get('elocuencia'))->operation(Operation::DIVIDE)->multiplier(Multiplier::TEN),
            WageFluent::from($profession->get('mendigo'))->socialPosition($judaic->villain())->firstCompetence($competences->get('elocuencia'))->operation(Operation::DIVIDE)->multiplier(Multiplier::TEN),
            WageFluent::from($profession->get('mendigo'))->socialPosition($muslim->citizen())->firstCompetence($competences->get('elocuencia'))->operation(Operation::DIVIDE)->multiplier(Multiplier::TEN),
            WageFluent::from($profession->get('mendigo'))->socialPosition($muslim->fieldsman())->firstCompetence($competences->get('elocuencia'))->operation(Operation::DIVIDE)->multiplier(Multiplier::TEN),
            WageFluent::from($profession->get('mendigo'))->socialPosition($muslim->slave())->firstCompetence($competences->get('elocuencia'))->operation(Operation::DIVIDE)->multiplier(Multiplier::TEN),

            WageFluent::from($profession->get('monje'))->socialPosition($christian->highNoble())->maravedies(1800),
            WageFluent::from($profession->get('monje'))->socialPosition($christian->lowNoble())->maravedies(500),
            WageFluent::from($profession->get('monje'))->socialPosition($christian->bourgeois())->maravedies(500),
            WageFluent::from($profession->get('monje'))->socialPosition($christian->villain())->maravedies(80),
            WageFluent::from($profession->get('monje'))->socialPosition($christian->fieldsman())->maravedies(40),

            WageFluent::from($profession->get('muccadim'))->socialPosition($judaic->villain())->maravedies(80),

            WageFluent::from($profession->get('pardo'))->socialPosition($christian->bourgeois())->characteristic($characteristics->luck())->multiplier(Multiplier::TEN),
            WageFluent::from($profession->get('pardo'))->socialPosition($christian->villain())->characteristic($characteristics->luck())->multiplier(Multiplier::TEN),
            WageFluent::from($profession->get('pardo'))->socialPosition($christian->fieldsman())->characteristic($characteristics->luck())->multiplier(Multiplier::TEN),
            WageFluent::from($profession->get('pardo'))->socialPosition($muslim->merchant())->characteristic($characteristics->luck())->multiplier(Multiplier::TEN),
            WageFluent::from($profession->get('pardo'))->socialPosition($muslim->citizen())->characteristic($characteristics->luck())->multiplier(Multiplier::TEN),
            WageFluent::from($profession->get('pardo'))->socialPosition($muslim->fieldsman())->characteristic($characteristics->luck())->multiplier(Multiplier::TEN),

            WageFluent::from($profession->get('pastor'))->socialPosition($christian->fieldsman())->firstCompetence($competences->get('conocimiento_animal'))->operation(Operation::DIVIDE)->multiplier(Multiplier::TWO),
            WageFluent::from($profession->get('pastor'))->socialPosition($christian->slave())->maravedies(0),
            WageFluent::from($profession->get('pastor'))->socialPosition($muslim->fieldsman())->firstCompetence($competences->get('conocimiento_animal'))->operation(Operation::DIVIDE)->multiplier(Multiplier::TWO),
            WageFluent::from($profession->get('pastor'))->socialPosition($muslim->slave())->maravedies(0),

            WageFluent::from($profession->get('pirata'))->socialPosition($christian->bourgeois())->characteristic($characteristics->luck())->multiplier(Multiplier::FIFTEEN),
            WageFluent::from($profession->get('pirata'))->socialPosition($christian->villain())->characteristic($characteristics->luck())->multiplier(Multiplier::FIVE),
            WageFluent::from($profession->get('pirata'))->socialPosition($judaic->bourgeois())->characteristic($characteristics->luck())->multiplier(Multiplier::FIFTEEN),
            WageFluent::from($profession->get('pirata'))->socialPosition($judaic->villain())->characteristic($characteristics->luck())->multiplier(Multiplier::FIVE),
            WageFluent::from($profession->get('pirata'))->socialPosition($muslim->merchant())->characteristic($characteristics->luck())->multiplier(Multiplier::FIFTEEN),
            WageFluent::from($profession->get('pirata'))->socialPosition($muslim->citizen())->characteristic($characteristics->luck())->multiplier(Multiplier::FIVE),

            WageFluent::from($profession->get('qaina'))->socialPosition($muslim->citizen())->firstCompetence($competences->get('cantar'))->secondCompetence($competences->get('musica'))->thirdCompetence($competences->get('seduccion'))->operation(Operation::GREATER_THAN)->multiplier(Multiplier::TWO),
            WageFluent::from($profession->get('qaina'))->socialPosition($muslim->slave())->maravedies(0),

            WageFluent::from($profession->get('rabino'))->socialPosition($judaic->bourgeois())->firstCompetence($competences->get('teologia'))->multiplier(Multiplier::TEN),

            WageFluent::from($profession->get('ramera'))->socialPosition($christian->villain())->firstCompetence($competences->get('seduccion')),
            WageFluent::from($profession->get('ramera'))->socialPosition($christian->fieldsman())->firstCompetence($competences->get('seduccion')),
            WageFluent::from($profession->get('ramera'))->socialPosition($christian->slave())->maravedies(0),
            WageFluent::from($profession->get('ramera'))->socialPosition($judaic->villain())->firstCompetence($competences->get('seduccion')),
            WageFluent::from($profession->get('ramera'))->socialPosition($muslim->citizen())->firstCompetence($competences->get('seduccion')),
            WageFluent::from($profession->get('ramera'))->socialPosition($muslim->fieldsman())->firstCompetence($competences->get('seduccion')),
            WageFluent::from($profession->get('ramera'))->socialPosition($muslim->slave())->maravedies(0),

            WageFluent::from($profession->get('sacerdote'))->socialPosition($christian->bourgeois())->maravedies(750),
            WageFluent::from($profession->get('sacerdote'))->socialPosition($christian->villain())->maravedies(80),
            WageFluent::from($profession->get('sacerdote'))->socialPosition($christian->fieldsman())->maravedies(80),

            WageFluent::from($profession->get('siervo_de_corte'))->socialPosition($christian->villain())->maravedies(40),
            WageFluent::from($profession->get('siervo_de_corte'))->socialPosition($christian->fieldsman())->maravedies(40),
            WageFluent::from($profession->get('siervo_de_corte'))->socialPosition($christian->slave())->maravedies(0),
            WageFluent::from($profession->get('siervo_de_corte'))->socialPosition($judaic->villain())->maravedies(40),
            WageFluent::from($profession->get('siervo_de_corte'))->socialPosition($muslim->citizen())->maravedies(40),
            WageFluent::from($profession->get('siervo_de_corte'))->socialPosition($muslim->fieldsman())->maravedies(40),
            WageFluent::from($profession->get('siervo_de_corte'))->socialPosition($muslim->slave())->maravedies(0),

            WageFluent::from($profession->get('soldado'))->socialPosition($christian->bourgeois())->operation(Operation::GREATER_WEAPON)->multiplier(Multiplier::FIVE),
            WageFluent::from($profession->get('soldado'))->socialPosition($christian->villain())->operation(Operation::GREATER_WEAPON),
            WageFluent::from($profession->get('soldado'))->socialPosition($christian->fieldsman())->operation(Operation::GREATER_WEAPON),
            WageFluent::from($profession->get('soldado'))->socialPosition($christian->slave())->maravedies(0),
            WageFluent::from($profession->get('soldado'))->socialPosition($muslim->merchant())->operation(Operation::GREATER_WEAPON)->multiplier(Multiplier::FIVE),
            WageFluent::from($profession->get('soldado'))->socialPosition($muslim->citizen())->operation(Operation::GREATER_WEAPON),
            WageFluent::from($profession->get('soldado'))->socialPosition($muslim->fieldsman())->operation(Operation::GREATER_WEAPON),
            WageFluent::from($profession->get('soldado'))->socialPosition($muslim->slave())->maravedies(0),

            WageFluent::from($profession->get('trovador'))->socialPosition($christian->highNoble())->maravedies(1800),
            WageFluent::from($profession->get('trovador'))->socialPosition($christian->lowNoble())->maravedies(500),
            WageFluent::from($profession->get('trovador'))->socialPosition($muslim->highNoble())->maravedies(1800),
            WageFluent::from($profession->get('trovador'))->socialPosition($muslim->lowNoble())->maravedies(500),

            WageFluent::from($profession->get('ulema'))->socialPosition($muslim->highNoble())->maravedies(500),
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
