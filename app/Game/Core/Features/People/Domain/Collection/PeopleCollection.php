<?php

declare(strict_types=1);

namespace App\Game\Core\Features\People\Domain\Collection;

use App\Game\Core\Features\People\Infrastructure\Models\People;
use Illuminate\Database\Eloquent\Collection;

class PeopleCollection extends Collection
{
    public function byName(string $name): People
    {
        return $this->first(
            static fn (People $people) => $people->name->ascii()->studly()->is(str($name)->ascii()->studly())
        );
    }

    public function castellano(): People
    {
        return $this->byName('Castellano');
    }

    public function castillian(): People
    {
        return $this->castellano();
    }

    public function gallego(): People
    {
        return $this->byName('Gallego');
    }

    public function galician(): People
    {
        return $this->gallego();
    }

    public function vasco(): People
    {
        return $this->byName('Vasco');
    }

    public function basque(): People
    {
        return $this->vasco();
    }

    public function asturleones(): People
    {
        return $this->byName('Asturleones');
    }

    public function catalan(): People
    {
        return $this->byName('Catalan');
    }

    public function mudejar(): People
    {
        return $this->byName('Mudejar');
    }

    public function judio(): People
    {
        return $this->byName('Judio');
    }

    public function jewish(): People
    {
        return $this->judio();
    }

    public function aragones(): People
    {
        return $this->byName('Aragones');
    }

    public function arabe(): People
    {
        return $this->byName('Arabe');
    }

    public function arabic(): People
    {
        return $this->arabe();
    }

    public function mozarabe(): People
    {
        return $this->byName('Mozarabe');
    }

    public function navarro(): People
    {
        return $this->byName('Navarro');
    }

    public function portugues(): People
    {
        return $this->byName('Portugues');
    }
}
