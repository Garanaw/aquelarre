<?php

declare(strict_types=1);

namespace Database\Seeders\Core\Professions\DataProviders\Competences;

use Aquelarre\Core\Framework\Infrastructure\Seed\Loaders\Competence\CompetencesLoader;
use Aquelarre\Core\Framework\Infrastructure\Seed\Loaders\Profession\ProfessionLoader;
use Aquelarre\Core\Profession\Domain\Dto\CompetenceFluent;
use Database\Seeders\Contracts\DataProvider;

class Daemonolatreia extends DataProvider
{
    public function getData(): array
    {
        /** @var ProfessionLoader $professions */
        $professions = $this->getLoadedLoader(ProfessionLoader::class);
        /** @var CompetencesLoader $competences */
        $competences = $this->getLoadedLoader(CompetencesLoader::class);

        return [
            CompetenceFluent::profession($professions->profession('demonologo_religioso'))
                ->competence($competences->get('teologia'))->primary()
                ->quantity(1),
            CompetenceFluent::profession($professions->profession('demonologo_religioso'))
                ->competence($competences->get('demonologia'))->primary()
                ->quantity(1),
            CompetenceFluent::profession($professions->profession('demonologo_religioso'))
                ->competence($competences->get('leer_y_escribir'))->primary()
                ->quantity(1),
            CompetenceFluent::profession($professions->profession('demonologo_religioso'))
                ->competence($competences->get('latin'))->primary()
                ->quantity(1),
            CompetenceFluent::profession($professions->profession('demonologo_religioso'))
                ->competence($competences->get('conocimiento_magico'))
                ->quantity(1),
            CompetenceFluent::profession($professions->profession('demonologo_religioso'))
                ->competence($competences->get('criptografia'))
                ->quantity(1),
            CompetenceFluent::profession($professions->profession('demonologo_religioso'))
                ->competence($competences->get('descubrir'))
                ->quantity(1),
            CompetenceFluent::profession($professions->profession('demonologo_religioso'))
                ->competence($competences->get('elocuencia'))
                ->quantity(1),
            CompetenceFluent::profession($professions->profession('demonologo_religioso'))
                ->competence($competences->get('leyendas'))
                ->quantity(1),
            CompetenceFluent::profession($professions->profession('demonologo_religioso'))
                ->competence($competences->get('memoria'))
                ->quantity(1),
            CompetenceFluent::profession($professions->profession('demonologo_religioso'))
                ->competence($competences->get('empatia'))
                ->quantity(1),
            CompetenceFluent::profession($professions->profession('demonologo_religioso'))
                ->competence($competences->get('idioma'))
                ->quantity(1),
            CompetenceFluent::profession($professions->profession('demonologo_hechicero'))
                ->competence($competences->get('demonologia'))->primary()
                ->quantity(1),
            CompetenceFluent::profession($professions->profession('demonologo_hechicero'))
                ->competence($competences->get('elocuencia'))->primary()
                ->quantity(1),
            CompetenceFluent::profession($professions->profession('demonologo_hechicero'))
                ->competence($competences->get('teologia'))->primary()
                ->quantity(1),
            CompetenceFluent::profession($professions->profession('demonologo_hechicero'))
                ->competence($competences->get('empatia'))->primary()
                ->quantity(1),
            CompetenceFluent::profession($professions->profession('demonologo_hechicero'))
                ->competence($competences->get('astrologia'))
                ->quantity(1),
            CompetenceFluent::profession($professions->profession('demonologo_hechicero'))
                ->competence($competences->get('alquimia'))
                ->quantity(1),
            CompetenceFluent::profession($professions->profession('demonologo_hechicero'))
                ->competence($competences->get('criptografia'))
                ->quantity(1),
            CompetenceFluent::profession($professions->profession('demonologo_hechicero'))
                ->competence($competences->get('conocimiento_magico'))
                ->quantity(1),
            CompetenceFluent::profession($professions->profession('demonologo_hechicero'))
                ->competence($competences->get('descubrir'))
                ->quantity(1),
            CompetenceFluent::profession($professions->profession('demonologo_hechicero'))
                ->competence($competences->get('latin'))
                ->quantity(1),
            CompetenceFluent::profession($professions->profession('demonologo_hechicero'))
                ->competence($competences->get('leer_y_escribir'))
                ->quantity(1),
            CompetenceFluent::profession($professions->profession('demonologo_hechicero'))
                ->competence($competences->get('leyendas'))
                ->quantity(1),
        ];
    }
}
