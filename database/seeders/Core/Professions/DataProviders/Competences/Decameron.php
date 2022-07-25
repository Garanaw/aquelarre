<?php

declare(strict_types=1);

namespace Database\Seeders\Core\Professions\DataProviders\Competences;

use Aquelarre\Core\Framework\Infrastructure\Seed\Loaders\Competence\CompetencesLoader;
use Aquelarre\Core\Framework\Infrastructure\Seed\Loaders\Profession\ProfessionLoader;
use Aquelarre\Core\Profession\Domain\Dto\CompetenceFluent;
use Database\Seeders\Contracts\DataProvider;

class Decameron extends DataProvider
{
    public function getData(): array
    {
        /** @var ProfessionLoader $professions */
        $professions = $this->getLoadedLoader(ProfessionLoader::class);
        /** @var CompetencesLoader $competences */
        $competences = $this->getLoadedLoader(CompetencesLoader::class);

        return [
            CompetenceFluent::profession($professions->profession('alfaqueque'))
                ->competence($competences->get('comerciar'))->primary()
                ->quantity(1),
            CompetenceFluent::profession($professions->profession('alfaqueque'))
                ->competence($competences->get('elocuencia'))->primary()
                ->quantity(1),
            CompetenceFluent::profession($professions->profession('alfaqueque'))
                ->competence($competences->get('empatia'))->primary()
                ->quantity(1),
            // un idioma a elegir entre andalusí y castellano
            CompetenceFluent::profession($professions->profession('alfaqueque'))
                ->competence($competences->get('cabalgar'))
                ->quantity(1),
            CompetenceFluent::profession($professions->profession('alfaqueque'))
                ->competence($competences->get('conducir carro'))
                ->quantity(1),
            CompetenceFluent::profession($professions->profession('alfaqueque'))
                ->competence($competences->get('conocimiento de area'))
                ->quantity(1),
            CompetenceFluent::profession($professions->profession('alfaqueque'))
                ->competence($competences->get('descubrir'))
                ->quantity(1),
            CompetenceFluent::profession($professions->profession('alfaqueque'))
                ->competence($competences->get('escuchar'))
                ->quantity(1),
            CompetenceFluent::profession($professions->profession('alfaqueque'))
                ->competence($competences->get('mando'))
                ->quantity(1),
            CompetenceFluent::profession($professions->profession('alfaqueque'))
                ->competence($competences->get('sigilo'))
                ->quantity(1),

            CompetenceFluent::profession($professions->profession('cabalista'))
                ->competence($competences->get('conocimiento magico'))->primary()
                ->quantity(1),
            CompetenceFluent::profession($professions->profession('cabalista'))
                ->competence($competences->get('hebreo'))->primary()
                ->quantity(1),
            CompetenceFluent::profession($professions->profession('cabalista'))
                ->competence($competences->get('leer y escribir'))->primary()
                ->quantity(1),
            CompetenceFluent::profession($professions->profession('cabalista'))
                ->competence($competences->get('teologia'))->primary()
                ->quantity(1),
            CompetenceFluent::profession($professions->profession('cabalista'))
                ->competence($competences->get('alquimia'))
                ->quantity(1),
            CompetenceFluent::profession($professions->profession('cabalista'))
                ->competence($competences->get('astrologia'))
                ->quantity(1),
            CompetenceFluent::profession($professions->profession('cabalista'))
                ->competence($competences->get('descubrir'))
                ->quantity(1),
            CompetenceFluent::profession($professions->profession('cabalista'))
                ->competence($competences->get('elocuencia'))
                ->quantity(1),
            CompetenceFluent::profession($professions->profession('cabalista'))
                ->competence($competences->get('empatia'))
                ->quantity(1),
            CompetenceFluent::profession($professions->profession('cabalista'))
                ->competence($competences->get('enseñar'))
                ->quantity(1),
            // un idioma culto a elegir entre griego, árabe o latín
            CompetenceFluent::profession($professions->profession('cabalista'))
                ->competence($competences->get('memoria'))
                ->quantity(1),

            CompetenceFluent::profession($professions->profession('cantero'))
                ->competence($competences->get('artesanía'))->primary()->quantity(1),
            CompetenceFluent::profession($professions->profession('cantero'))
                ->competence($competences->get('conocimiento mineral'))->primary()->quantity(1),
            CompetenceFluent::profession($professions->profession('cantero'))
                ->competence($competences->get('descubrir'))->primary()->quantity(1),
            CompetenceFluent::profession($professions->profession('cantero'))
                ->competence($competences->get('mando'))->primary()->quantity(1),
            CompetenceFluent::profession($professions->profession('cantero'))
                ->competence($competences->get('comerciar'))->quantity(1),
            CompetenceFluent::profession($professions->profession('cantero'))
                ->competence($competences->get('conducir carro'))->quantity(1),
            CompetenceFluent::profession($professions->profession('cantero'))
                ->competence($competences->get('cuchillo'))->quantity(1),
            CompetenceFluent::profession($professions->profession('cantero'))
                ->competence($competences->get('enseñar'))->quantity(1),
            CompetenceFluent::profession($professions->profession('cantero'))
                ->competence($competences->get('forzar mecanismos'))->quantity(1),
            CompetenceFluent::profession($professions->profession('cantero'))
                ->competence($competences->get('lanzar'))->quantity(1),
            CompetenceFluent::profession($professions->profession('cantero'))
                ->competence($competences->get('saltar'))->quantity(1),
            CompetenceFluent::profession($professions->profession('cantero'))
                ->competence($competences->get('trepar'))->quantity(1),

            CompetenceFluent::profession($professions->profession('cetrero'))
                ->competence($competences->get('conocimiento animal'))->quantity(1)->primary(),
            CompetenceFluent::profession($professions->profession('cetrero'))
                ->competence($competences->get('empatia'))->quantity(1)->primary(),
            CompetenceFluent::profession($professions->profession('cetrero'))
                ->competence($competences->get('enseñar'))->quantity(1)->primary(),
            CompetenceFluent::profession($professions->profession('cetrero'))
                ->competence($competences->get('mando'))->quantity(1)->primary(),
            CompetenceFluent::profession($professions->profession('cetrero'))
                ->competence($competences->get('corte'))->quantity(1),
            CompetenceFluent::profession($professions->profession('cetrero'))
                ->competence($competences->get('descubrir'))->quantity(1),
            CompetenceFluent::profession($professions->profession('cetrero'))
                ->competence($competences->get('esquivar'))->quantity(1),
            CompetenceFluent::profession($professions->profession('cetrero'))
                ->competence($competences->get('lanzar'))->quantity(1),
            CompetenceFluent::profession($professions->profession('cetrero'))
                ->competence($competences->get('rastrear'))->quantity(1),
            CompetenceFluent::profession($professions->profession('cetrero'))
                ->competence($competences->get('sanar'))->quantity(1),
            CompetenceFluent::profession($professions->profession('cetrero'))
                ->competence($competences->get('sigilo'))->quantity(1),
            CompetenceFluent::profession($professions->profession('cetrero'))
                ->competence($competences->get('trepar'))->quantity(1),


            CompetenceFluent::profession($professions->profession('frontero'))
                ->competence($competences->get('cabalgar'))->quantity(1)->primary(),
            CompetenceFluent::profession($professions->profession('frontero'))
                ->competence($competences->get('descubrir'))->quantity(1)->primary(),
            CompetenceFluent::profession($professions->profession('frontero'))
                ->competence($competences->get('ballesta'))->quantity(1)->primary(),
            // una competencia primaria de armas a elegir
            CompetenceFluent::profession($professions->profession('frontero'))
                ->competence($competences->get('comerciar'))->quantity(1),
            CompetenceFluent::profession($professions->profession('frontero'))
                ->competence($competences->get('conocimiento de area'))->quantity(1),
            CompetenceFluent::profession($professions->profession('frontero'))
                ->competence($competences->get('correr'))->quantity(1),
            CompetenceFluent::profession($professions->profession('frontero'))
                ->competence($competences->get('andalusi'))->quantity(1),
            CompetenceFluent::profession($professions->profession('frontero'))
                ->competence($competences->get('mando'))->quantity(1),
            CompetenceFluent::profession($professions->profession('frontero'))
                ->competence($competences->get('rastrear'))->quantity(1),
            CompetenceFluent::profession($professions->profession('frontero'))
                ->competence($competences->get('sigilo'))->quantity(1),
            // una competencia secundaria de armas a elegir

            CompetenceFluent::profession($professions->profession('rastrero'))
                ->competence($competences->get('descubrir'))->quantity(1)->primary(),
            CompetenceFluent::profession($professions->profession('rastrero'))
                ->competence($competences->get('rastrear'))->quantity(1)->primary(),
            CompetenceFluent::profession($professions->profession('rastrero'))
                ->competence($competences->get('sigilo'))->quantity(1)->primary(),
            // una competencia primaria de armas a elegir
            CompetenceFluent::profession($professions->profession('rastrero'))
                ->competence($competences->get('cabalgar'))->quantity(1),
            CompetenceFluent::profession($professions->profession('rastrero'))
                ->competence($competences->get('conocimiento de area'))->quantity(1),
            CompetenceFluent::profession($professions->profession('rastrero'))
                ->competence($competences->get('correr'))->quantity(1),
            CompetenceFluent::profession($professions->profession('rastrero'))
                ->competence($competences->get('elocuencia'))->quantity(1),
            CompetenceFluent::profession($professions->profession('rastrero'))
                ->competence($competences->get('empatia'))->quantity(1),
            CompetenceFluent::profession($professions->profession('rastrero'))
                ->competence($competences->get('escuchar'))->quantity(1),
            CompetenceFluent::profession($professions->profession('rastrero'))
                ->competence($competences->get('andalusi'))->quantity(1),
            // una competencia secundaria de armas a elegir

            CompetenceFluent::profession($professions->profession('tornadizo'))
                ->competence($competences->get('elocuencia'))->quantity(1)->primary(),
            CompetenceFluent::profession($professions->profession('tornadizo'))
                ->competence($competences->get('empatia'))->quantity(1)->primary(),
            CompetenceFluent::profession($professions->profession('tornadizo'))
                ->competence($competences->get('escuchar'))->quantity(1)->primary(),
            CompetenceFluent::profession($professions->profession('tornadizo'))
                ->competence($competences->get('idioma'))->quantity(1)->primary(),
            CompetenceFluent::profession($professions->profession('tornadizo'))
                ->competence($competences->get('cabalgar'))->quantity(1),
            CompetenceFluent::profession($professions->profession('tornadizo'))
                ->competence($competences->get('conocimiento de area'))->quantity(1),
            CompetenceFluent::profession($professions->profession('tornadizo'))
                ->competence($competences->get('descubrir'))->quantity(1),
            CompetenceFluent::profession($professions->profession('tornadizo'))
                ->competence($competences->get('enseñar'))->quantity(1),
            CompetenceFluent::profession($professions->profession('tornadizo'))
                ->competence($competences->get('leer y escribir'))->quantity(1),
            CompetenceFluent::profession($professions->profession('tornadizo'))
                ->competence($competences->get('memoria'))->quantity(1),
            CompetenceFluent::profession($professions->profession('tornadizo'))
                ->competence($competences->get('sigilo'))->quantity(1),
            // una competencia secundaria de armas a elegir
        ];
    }
}
