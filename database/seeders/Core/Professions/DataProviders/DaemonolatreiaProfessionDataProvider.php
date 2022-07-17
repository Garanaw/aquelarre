<?php

declare(strict_types=1);

namespace Database\Seeders\Core\Professions\DataProviders;

use Aquelarre\Core\Framework\Infrastructure\Seed\Loaders\Book\BookLoader;
use Aquelarre\Core\Profession\Domain\Dto\ProfessionFluent;
use Database\Seeders\Contracts\DataProvider;

class DaemonolatreiaProfessionDataProvider extends DataProvider
{
    public function getData(): array
    {
        /** @var BookLoader $books */
        $books = $this->getLoadedLoader(class: BookLoader::class);

        return collect([
            ProfessionFluent::make(name: 'Demonólogo Religioso')->isMan()->onlySecondary()->description('Un demonólogo es un individuo que ha hecho de su conocimiento sobre los demonios una forma de vida. Estos religiosos estudian al Maligno para poder enfrentarse a él de una forma más eficaz'),
            ProfessionFluent::make(name: 'Demonólogo Hechicero')->isBoth()->onlySecondary()->description('Un demonólogo es un individuo que ha hecho de su conocimiento sobre los demonios una forma de vida. Estos brujos estudian a los demonios para poder dominarlos y poder usar sus poderes en su propio beneficio. Ni decir tiene que este tipo debe mantener sus prácticas en absoluto secreto'),
        ])
            ->map(static fn (ProfessionFluent $profession): ProfessionFluent => $profession->book($books->daemonolatreia()))
            ->toArray();
    }
}
