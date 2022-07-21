<?php

declare(strict_types=1);

namespace Database\Seeders\Core\People;

use Aquelarre\Core\Framework\Infrastructure\Seed\Loaders\Competence\LanguagesLoader;
use Aquelarre\Core\Framework\Infrastructure\Seed\Loaders\People\PeopleLoader;
use Aquelarre\Core\Framework\Infrastructure\Seed\Seeder;
use Aquelarre\Core\People\Domain\Dto\PeopleLanguageFluent;

class PeopleLanguagesSeeder extends Seeder
{
    protected string $table = 'language_people';

    public function run(): bool
    {
        return $this->db
            ->table($this->table)
            ->insert($this->getData());
    }

    protected function getData(): array
    {
        $people = $this->getPeopleLoader();
        $languages = $this->getLanguagesLoader();

        return collect([
            PeopleLanguageFluent::people($people->castilian())->language($languages->castilian())->points(100),
            PeopleLanguageFluent::people($people->galician())->language($languages->galician())->points(100),
            PeopleLanguageFluent::people($people->galician())->language($languages->castilian())->cul(4),
            PeopleLanguageFluent::people($people->vasque())->language($languages->euskera())->points(100),
            PeopleLanguageFluent::people($people->vasque())->language($languages->castilian())->cul(4),
            PeopleLanguageFluent::people($people->asturian())->language($languages->bable())->points(100),
            PeopleLanguageFluent::people($people->asturian())->language($languages->castilian())->cul(4),
            PeopleLanguageFluent::people($people->mudejar())->language($languages->andalusi())->points(100),
            PeopleLanguageFluent::people($people->mudejar())->language($languages->castilian())->cul(4),
            PeopleLanguageFluent::people($people->mudejar())->language($languages->aragones())->cul(4),
            PeopleLanguageFluent::people($people->jewish())->language($languages->ladino())->points(100),
            PeopleLanguageFluent::people($people->jewish())->language($languages->hebrew())->cul(2),
            PeopleLanguageFluent::people($people->jewish())->language($languages->castilian())->points(4),
            PeopleLanguageFluent::people($people->aragon())->language($languages->aragones())->points(100),
            PeopleLanguageFluent::people($people->aragon())->language($languages->castilian())->cul(4),
            PeopleLanguageFluent::people($people->catalan())->language($languages->catalan())->points(100),
            PeopleLanguageFluent::people($people->catalan())->language($languages->castilian())->cul(4),
            PeopleLanguageFluent::people($people->arabic())->language($languages->andalusi())->points(100),
            PeopleLanguageFluent::people($people->arabic())->language($languages->arabic())->cul(4),
            PeopleLanguageFluent::people($people->arabic())->language($languages->castilian())->cul(4),
            PeopleLanguageFluent::people($people->mozarabic())->language($languages->mozarabic())->points(100),
            PeopleLanguageFluent::people($people->mozarabic())->language($languages->andalusi())->cul(4),
            PeopleLanguageFluent::people($people->mozarabic())->language($languages->arabic())->cul(2),
            PeopleLanguageFluent::people($people->mozarabic())->language($languages->castilian())->cul(4),
            PeopleLanguageFluent::people($people->navarro())->language($languages->castilian())->points(100),
            PeopleLanguageFluent::people($people->navarro())->language($languages->aragones())->cul(4),
            PeopleLanguageFluent::people($people->portuguese())->language($languages->galician())->points(100),
            PeopleLanguageFluent::people($people->portuguese())->language($languages->castilian())->cul(4),
        ])->toArray();
    }

    private function getPeopleLoader(): PeopleLoader
    {
        return $this->getLoadedLoader(PeopleLoader::class);
    }

    private function getLanguagesLoader(): LanguagesLoader
    {
        return $this->getLoadedLoader(LanguagesLoader::class);
    }
}
