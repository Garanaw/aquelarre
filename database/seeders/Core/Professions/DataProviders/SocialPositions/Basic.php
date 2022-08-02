<?php

declare(strict_types=1);

namespace Database\Seeders\Core\Professions\DataProviders\SocialPositions;

use Aquelarre\Core\Framework\Infrastructure\Seed\Loaders\Profession\ProfessionLoader;
use Aquelarre\Core\Framework\Infrastructure\Seed\Loaders\SocialPosition\SocialPositionLoader;
use Aquelarre\Core\Framework\Infrastructure\Seed\Loaders\Society\SocietyLoader;
use Aquelarre\Core\Profession\Domain\Dto\SocialPositionFluent as SocialPosition;
use Database\Seeders\Contracts\DataProvider;

class Basic extends DataProvider
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
            SocialPosition::profession($profession->profession('alquimista'))->society($society->christian())->socialPosition($socialPosition->christian()->highNoble()),
            SocialPosition::profession($profession->profession('caballero_de_orden_militar_hombre'))->society($society->christian())->socialPosition($socialPosition->christian()->highNoble()),
            SocialPosition::profession($profession->profession('caballero_de_orden_militar_mujer'))->society($society->christian())->socialPosition($socialPosition->christian()->highNoble()),
            SocialPosition::profession($profession->profession('clerigo'))->society($society->christian())->socialPosition($socialPosition->christian()->highNoble()),
            SocialPosition::profession($profession->profession('cortesano'))->society($society->christian())->socialPosition($socialPosition->christian()->highNoble()),
            SocialPosition::profession($profession->profession('infanzon'))->society($society->christian())->socialPosition($socialPosition->christian()->highNoble()),
            SocialPosition::profession($profession->profession('monje'))->society($society->christian())->socialPosition($socialPosition->christian()->highNoble()),
            SocialPosition::profession($profession->profession('trovador'))->society($society->christian())->socialPosition($socialPosition->christian()->highNoble()),

            SocialPosition::profession($profession->profession('alquimista'))->society($society->christian())->socialPosition($socialPosition->christian()->lowNoble()),
            SocialPosition::profession($profession->profession('ama'))->society($society->christian())->socialPosition($socialPosition->christian()->lowNoble()),
            SocialPosition::profession($profession->profession('caballero_de_orden_militar_hombre'))->society($society->christian())->socialPosition($socialPosition->christian()->lowNoble()),
            SocialPosition::profession($profession->profession('caballero_de_orden_militar_mujer'))->society($society->christian())->socialPosition($socialPosition->christian()->lowNoble()),
            SocialPosition::profession($profession->profession('clerigo'))->society($society->christian())->socialPosition($socialPosition->christian()->lowNoble()),
            SocialPosition::profession($profession->profession('cortesano'))->society($society->christian())->socialPosition($socialPosition->christian()->lowNoble()),
            SocialPosition::profession($profession->profession('infanzon'))->society($society->christian())->socialPosition($socialPosition->christian()->lowNoble()),
            SocialPosition::profession($profession->profession('monje'))->society($society->christian())->socialPosition($socialPosition->christian()->lowNoble()),
            SocialPosition::profession($profession->profession('trovador'))->society($society->christian())->socialPosition($socialPosition->christian()->lowNoble()),

            SocialPosition::profession($profession->profession('alguacil'))->society($society->christian())->socialPosition($socialPosition->christian()->bourgeois()),
            SocialPosition::profession($profession->profession('alquimista'))->society($society->christian())->socialPosition($socialPosition->christian()->bourgeois()),
            SocialPosition::profession($profession->profession('barbero_cirujano'))->society($society->christian())->socialPosition($socialPosition->christian()->bourgeois()),
            SocialPosition::profession($profession->profession('cambista'))->society($society->christian())->socialPosition($socialPosition->christian()->bourgeois()),
            SocialPosition::profession($profession->profession('comerciante'))->society($society->christian())->socialPosition($socialPosition->christian()->bourgeois()),
            SocialPosition::profession($profession->profession('escriba'))->society($society->christian())->socialPosition($socialPosition->christian()->bourgeois()),
            SocialPosition::profession($profession->profession('marino'))->society($society->christian())->socialPosition($socialPosition->christian()->bourgeois()),
            SocialPosition::profession($profession->profession('medico'))->society($society->christian())->socialPosition($socialPosition->christian()->bourgeois()),
            SocialPosition::profession($profession->profession('monje'))->society($society->christian())->socialPosition($socialPosition->christian()->bourgeois()),
            SocialPosition::profession($profession->profession('pardo'))->society($society->christian())->socialPosition($socialPosition->christian()->bourgeois()),
            SocialPosition::profession($profession->profession('pirata'))->society($society->christian())->socialPosition($socialPosition->christian()->bourgeois()),
            SocialPosition::profession($profession->profession('sacerdote'))->society($society->christian())->socialPosition($socialPosition->christian()->bourgeois()),
            SocialPosition::profession($profession->profession('soldado'))->society($society->christian())->socialPosition($socialPosition->christian()->bourgeois()),

            SocialPosition::profession($profession->profession('alguacil'))->society($society->christian())->socialPosition($socialPosition->christian()->villain()),
            SocialPosition::profession($profession->profession('artesano'))->society($society->christian())->socialPosition($socialPosition->christian()->villain()),
            SocialPosition::profession($profession->profession('barbero_cirujano'))->society($society->christian())->socialPosition($socialPosition->christian()->villain()),
            SocialPosition::profession($profession->profession('bufon'))->society($society->christian())->socialPosition($socialPosition->christian()->villain()),
            SocialPosition::profession($profession->profession('comico'))->society($society->christian())->socialPosition($socialPosition->christian()->villain()),
            SocialPosition::profession($profession->profession('embaucador'))->society($society->christian())->socialPosition($socialPosition->christian()->villain()),
            SocialPosition::profession($profession->profession('goliardo'))->society($society->christian())->socialPosition($socialPosition->christian()->villain()),
            SocialPosition::profession($profession->profession('juglar'))->society($society->christian())->socialPosition($socialPosition->christian()->villain()),
            SocialPosition::profession($profession->profession('ladron'))->society($society->christian())->socialPosition($socialPosition->christian()->villain()),
            SocialPosition::profession($profession->profession('marino'))->society($society->christian())->socialPosition($socialPosition->christian()->villain()),
            SocialPosition::profession($profession->profession('mendigo'))->society($society->christian())->socialPosition($socialPosition->christian()->villain()),
            SocialPosition::profession($profession->profession('monje'))->society($society->christian())->socialPosition($socialPosition->christian()->villain()),
            SocialPosition::profession($profession->profession('pardo'))->society($society->christian())->socialPosition($socialPosition->christian()->villain()),
            SocialPosition::profession($profession->profession('pirata'))->society($society->christian())->socialPosition($socialPosition->christian()->villain()),
            SocialPosition::profession($profession->profession('ramera'))->society($society->christian())->socialPosition($socialPosition->christian()->villain()),
            SocialPosition::profession($profession->profession('sacerdote'))->society($society->christian())->socialPosition($socialPosition->christian()->villain()),
            SocialPosition::profession($profession->profession('siervo_de_corte'))->society($society->christian())->socialPosition($socialPosition->christian()->villain()),
            SocialPosition::profession($profession->profession('soldado'))->society($society->christian())->socialPosition($socialPosition->christian()->villain()),

            SocialPosition::profession($profession->profession('almogavar'))->society($society->christian())->socialPosition($socialPosition->christian()->fieldsman()),
            SocialPosition::profession($profession->profession('bandido'))->society($society->christian())->socialPosition($socialPosition->christian()->fieldsman()),
            SocialPosition::profession($profession->profession('brujo'))->society($society->christian())->socialPosition($socialPosition->christian()->fieldsman()),
            SocialPosition::profession($profession->profession('cazador'))->society($society->christian())->socialPosition($socialPosition->christian()->fieldsman()),
            SocialPosition::profession($profession->profession('curandero'))->society($society->christian())->socialPosition($socialPosition->christian()->fieldsman()),
            SocialPosition::profession($profession->profession('mendigo'))->society($society->christian())->socialPosition($socialPosition->christian()->fieldsman()),
            SocialPosition::profession($profession->profession('monje'))->society($society->christian())->socialPosition($socialPosition->christian()->fieldsman()),
            SocialPosition::profession($profession->profession('pardo'))->society($society->christian())->socialPosition($socialPosition->christian()->fieldsman()),
            SocialPosition::profession($profession->profession('pastor'))->society($society->christian())->socialPosition($socialPosition->christian()->fieldsman()),
            SocialPosition::profession($profession->profession('ramera'))->society($society->christian())->socialPosition($socialPosition->christian()->fieldsman()),
            SocialPosition::profession($profession->profession('sacerdote'))->society($society->christian())->socialPosition($socialPosition->christian()->fieldsman()),
            SocialPosition::profession($profession->profession('siervo_de_corte'))->society($society->christian())->socialPosition($socialPosition->christian()->fieldsman()),
            SocialPosition::profession($profession->profession('soldado'))->society($society->christian())->socialPosition($socialPosition->christian()->fieldsman()),

            SocialPosition::profession($profession->profession('bufon'))->society($society->christian())->socialPosition($socialPosition->christian()->slave()),
            SocialPosition::profession($profession->profession('curandero'))->society($society->christian())->socialPosition($socialPosition->christian()->slave()),
            SocialPosition::profession($profession->profession('escriba'))->society($society->christian())->socialPosition($socialPosition->christian()->slave()),
            SocialPosition::profession($profession->profession('juglar'))->society($society->christian())->socialPosition($socialPosition->christian()->slave()),
            SocialPosition::profession($profession->profession('mendigo'))->society($society->christian())->socialPosition($socialPosition->christian()->slave()),
            SocialPosition::profession($profession->profession('pastor'))->society($society->christian())->socialPosition($socialPosition->christian()->slave()),
            SocialPosition::profession($profession->profession('ramera'))->society($society->christian())->socialPosition($socialPosition->christian()->slave()),
            SocialPosition::profession($profession->profession('siervo_de_corte'))->society($society->christian())->socialPosition($socialPosition->christian()->slave()),
            SocialPosition::profession($profession->profession('soldado'))->society($society->christian())->socialPosition($socialPosition->christian()->slave()),

            SocialPosition::profession($profession->profession('alquimista'))->society($society->judaic())->socialPosition($socialPosition->judaic()->bourgeois()),
            SocialPosition::profession($profession->profession('barbero_cirujano'))->society($society->judaic())->socialPosition($socialPosition->judaic()->bourgeois()),
            SocialPosition::profession($profession->profession('cambista'))->society($society->judaic())->socialPosition($socialPosition->judaic()->bourgeois()),
            SocialPosition::profession($profession->profession('comerciante'))->society($society->judaic())->socialPosition($socialPosition->judaic()->bourgeois()),
            SocialPosition::profession($profession->profession('escriba'))->society($society->judaic())->socialPosition($socialPosition->judaic()->bourgeois()),
            SocialPosition::profession($profession->profession('marino'))->society($society->judaic())->socialPosition($socialPosition->judaic()->bourgeois()),
            SocialPosition::profession($profession->profession('medico'))->society($society->judaic())->socialPosition($socialPosition->judaic()->bourgeois()),
            SocialPosition::profession($profession->profession('mediero'))->society($society->judaic())->socialPosition($socialPosition->judaic()->bourgeois()),
            SocialPosition::profession($profession->profession('pirata'))->society($society->judaic())->socialPosition($socialPosition->judaic()->bourgeois()),
            SocialPosition::profession($profession->profession('rabino'))->society($society->judaic())->socialPosition($socialPosition->judaic()->bourgeois()),

            SocialPosition::profession($profession->profession('artesano'))->society($society->judaic())->socialPosition($socialPosition->judaic()->villain()),
            SocialPosition::profession($profession->profession('barbero_cirujano'))->society($society->judaic())->socialPosition($socialPosition->judaic()->villain()),
            SocialPosition::profession($profession->profession('bufon'))->society($society->judaic())->socialPosition($socialPosition->judaic()->villain()),
            SocialPosition::profession($profession->profession('comico'))->society($society->judaic())->socialPosition($socialPosition->judaic()->villain()),
            SocialPosition::profession($profession->profession('embaucador'))->society($society->judaic())->socialPosition($socialPosition->judaic()->villain()),
            SocialPosition::profession($profession->profession('juglar'))->society($society->judaic())->socialPosition($socialPosition->judaic()->villain()),
            SocialPosition::profession($profession->profession('ladron'))->society($society->judaic())->socialPosition($socialPosition->judaic()->villain()),
            SocialPosition::profession($profession->profession('malsin'))->society($society->judaic())->socialPosition($socialPosition->judaic()->villain()),
            SocialPosition::profession($profession->profession('marino'))->society($society->judaic())->socialPosition($socialPosition->judaic()->villain()),
            SocialPosition::profession($profession->profession('mendigo'))->society($society->judaic())->socialPosition($socialPosition->judaic()->villain()),
            SocialPosition::profession($profession->profession('muccadim'))->society($society->judaic())->socialPosition($socialPosition->judaic()->villain()),
            SocialPosition::profession($profession->profession('pirata'))->society($society->judaic())->socialPosition($socialPosition->judaic()->villain()),
            SocialPosition::profession($profession->profession('ramera'))->society($society->judaic())->socialPosition($socialPosition->judaic()->villain()),
            SocialPosition::profession($profession->profession('siervo_de_corte'))->society($society->judaic())->socialPosition($socialPosition->judaic()->villain()),

            SocialPosition::profession($profession->profession('alquimista'))->society($society->muslim())->socialPosition($socialPosition->muslim()->highNoble()),
            SocialPosition::profession($profession->profession('cortesano'))->society($society->muslim())->socialPosition($socialPosition->muslim()->highNoble()),
            SocialPosition::profession($profession->profession('ghazi'))->society($society->muslim())->socialPosition($socialPosition->muslim()->highNoble()),
            SocialPosition::profession($profession->profession('infanzon'))->society($society->muslim())->socialPosition($socialPosition->muslim()->highNoble()),
            SocialPosition::profession($profession->profession('mago'))->society($society->muslim())->socialPosition($socialPosition->muslim()->highNoble()),
            SocialPosition::profession($profession->profession('trovador'))->society($society->muslim())->socialPosition($socialPosition->muslim()->highNoble()),
            SocialPosition::profession($profession->profession('ulema'))->society($society->muslim())->socialPosition($socialPosition->muslim()->highNoble()),

            SocialPosition::profession($profession->profession('alquimista'))->society($society->muslim())->socialPosition($socialPosition->muslim()->lowNoble()),
            SocialPosition::profession($profession->profession('cortesano'))->society($society->muslim())->socialPosition($socialPosition->muslim()->lowNoble()),
            SocialPosition::profession($profession->profession('derviche'))->society($society->muslim())->socialPosition($socialPosition->muslim()->lowNoble()),
            SocialPosition::profession($profession->profession('ghazi'))->society($society->muslim())->socialPosition($socialPosition->muslim()->lowNoble()),
            SocialPosition::profession($profession->profession('infanzon'))->society($society->muslim())->socialPosition($socialPosition->muslim()->lowNoble()),
            SocialPosition::profession($profession->profession('mago'))->society($society->muslim())->socialPosition($socialPosition->muslim()->lowNoble()),
            SocialPosition::profession($profession->profession('trovador'))->society($society->muslim())->socialPosition($socialPosition->muslim()->lowNoble()),

            SocialPosition::profession($profession->profession('alguacil'))->society($society->muslim())->socialPosition($socialPosition->muslim()->merchant()),
            SocialPosition::profession($profession->profession('alquimista'))->society($society->muslim())->socialPosition($socialPosition->muslim()->merchant()),
            SocialPosition::profession($profession->profession('barbero_cirujano'))->society($society->muslim())->socialPosition($socialPosition->muslim()->merchant()),
            SocialPosition::profession($profession->profession('cambista'))->society($society->muslim())->socialPosition($socialPosition->muslim()->merchant()),
            SocialPosition::profession($profession->profession('comerciante'))->society($society->muslim())->socialPosition($socialPosition->muslim()->merchant()),
            SocialPosition::profession($profession->profession('derviche'))->society($society->muslim())->socialPosition($socialPosition->muslim()->merchant()),
            SocialPosition::profession($profession->profession('escriba'))->society($society->muslim())->socialPosition($socialPosition->muslim()->merchant()),
            SocialPosition::profession($profession->profession('ghazi'))->society($society->muslim())->socialPosition($socialPosition->muslim()->merchant()),
            SocialPosition::profession($profession->profession('mago'))->society($society->muslim())->socialPosition($socialPosition->muslim()->merchant()),
            SocialPosition::profession($profession->profession('marino'))->society($society->muslim())->socialPosition($socialPosition->muslim()->merchant()),
            SocialPosition::profession($profession->profession('medico'))->society($society->muslim())->socialPosition($socialPosition->muslim()->merchant()),
            SocialPosition::profession($profession->profession('pardo'))->society($society->muslim())->socialPosition($socialPosition->muslim()->merchant()),
            SocialPosition::profession($profession->profession('pirata'))->society($society->muslim())->socialPosition($socialPosition->muslim()->merchant()),
            SocialPosition::profession($profession->profession('soldado'))->society($society->muslim())->socialPosition($socialPosition->muslim()->merchant()),

            SocialPosition::profession($profession->profession('alguacil'))->society($society->muslim())->socialPosition($socialPosition->muslim()->citizen()),
            SocialPosition::profession($profession->profession('artesano'))->society($society->muslim())->socialPosition($socialPosition->muslim()->citizen()),
            SocialPosition::profession($profession->profession('barbero_cirujano'))->society($society->muslim())->socialPosition($socialPosition->muslim()->citizen()),
            SocialPosition::profession($profession->profession('bufon'))->society($society->muslim())->socialPosition($socialPosition->muslim()->citizen()),
            SocialPosition::profession($profession->profession('comico'))->society($society->muslim())->socialPosition($socialPosition->muslim()->citizen()),
            SocialPosition::profession($profession->profession('derviche'))->society($society->muslim())->socialPosition($socialPosition->muslim()->citizen()),
            SocialPosition::profession($profession->profession('embaucador'))->society($society->muslim())->socialPosition($socialPosition->muslim()->citizen()),
            SocialPosition::profession($profession->profession('ghazi'))->society($society->muslim())->socialPosition($socialPosition->muslim()->citizen()),
            SocialPosition::profession($profession->profession('juglar'))->society($society->muslim())->socialPosition($socialPosition->muslim()->citizen()),
            SocialPosition::profession($profession->profession('ladron'))->society($society->muslim())->socialPosition($socialPosition->muslim()->citizen()),
            SocialPosition::profession($profession->profession('marino'))->society($society->muslim())->socialPosition($socialPosition->muslim()->citizen()),
            SocialPosition::profession($profession->profession('mendigo'))->society($society->muslim())->socialPosition($socialPosition->muslim()->citizen()),
            SocialPosition::profession($profession->profession('pardo'))->society($society->muslim())->socialPosition($socialPosition->muslim()->citizen()),
            SocialPosition::profession($profession->profession('pirata'))->society($society->muslim())->socialPosition($socialPosition->muslim()->citizen()),
            SocialPosition::profession($profession->profession('qaina'))->society($society->muslim())->socialPosition($socialPosition->muslim()->citizen()),
            SocialPosition::profession($profession->profession('ramera'))->society($society->muslim())->socialPosition($socialPosition->muslim()->citizen()),
            SocialPosition::profession($profession->profession('siervo_de_corte'))->society($society->muslim())->socialPosition($socialPosition->muslim()->citizen()),
            SocialPosition::profession($profession->profession('soldado'))->society($society->muslim())->socialPosition($socialPosition->muslim()->citizen()),

            SocialPosition::profession($profession->profession('bandido'))->society($society->muslim())->socialPosition($socialPosition->muslim()->fieldsman()),
            SocialPosition::profession($profession->profession('brujo'))->society($society->muslim())->socialPosition($socialPosition->muslim()->fieldsman()),
            SocialPosition::profession($profession->profession('cazador'))->society($society->muslim())->socialPosition($socialPosition->muslim()->fieldsman()),
            SocialPosition::profession($profession->profession('curandero'))->society($society->muslim())->socialPosition($socialPosition->muslim()->fieldsman()),
            SocialPosition::profession($profession->profession('ghazi'))->society($society->muslim())->socialPosition($socialPosition->muslim()->fieldsman()),
            SocialPosition::profession($profession->profession('mendigo'))->society($society->muslim())->socialPosition($socialPosition->muslim()->fieldsman()),
            SocialPosition::profession($profession->profession('pardo'))->society($society->muslim())->socialPosition($socialPosition->muslim()->fieldsman()),
            SocialPosition::profession($profession->profession('pastor'))->society($society->muslim())->socialPosition($socialPosition->muslim()->fieldsman()),
            SocialPosition::profession($profession->profession('ramera'))->society($society->muslim())->socialPosition($socialPosition->muslim()->fieldsman()),
            SocialPosition::profession($profession->profession('siervo_de_corte'))->society($society->muslim())->socialPosition($socialPosition->muslim()->fieldsman()),
            SocialPosition::profession($profession->profession('soldado'))->society($society->muslim())->socialPosition($socialPosition->muslim()->fieldsman()),

            SocialPosition::profession($profession->profession('bufon'))->society($society->muslim())->socialPosition($socialPosition->muslim()->slave()),
            SocialPosition::profession($profession->profession('curandero'))->society($society->muslim())->socialPosition($socialPosition->muslim()->slave()),
            SocialPosition::profession($profession->profession('escriba'))->society($society->muslim())->socialPosition($socialPosition->muslim()->slave()),
            SocialPosition::profession($profession->profession('juglar'))->society($society->muslim())->socialPosition($socialPosition->muslim()->slave()),
            SocialPosition::profession($profession->profession('mendigo'))->society($society->muslim())->socialPosition($socialPosition->muslim()->slave()),
            SocialPosition::profession($profession->profession('pastor'))->society($society->muslim())->socialPosition($socialPosition->muslim()->slave()),
            SocialPosition::profession($profession->profession('qaina'))->society($society->muslim())->socialPosition($socialPosition->muslim()->slave()),
            SocialPosition::profession($profession->profession('ramera'))->society($society->muslim())->socialPosition($socialPosition->muslim()->slave()),
            SocialPosition::profession($profession->profession('siervo_de_corte'))->society($society->muslim())->socialPosition($socialPosition->muslim()->slave()),
            SocialPosition::profession($profession->profession('soldado'))->society($society->muslim())->socialPosition($socialPosition->muslim()->slave()),
        ])->toArray();
    }
}
