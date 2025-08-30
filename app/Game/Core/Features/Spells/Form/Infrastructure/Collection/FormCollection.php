<?php

declare(strict_types=1);

namespace App\Game\Core\Features\Spells\Form\Infrastructure\Collection;

use App\Game\Core\Features\Spells\Form\Infrastructure\Enum\Form;
use App\Game\Core\Features\Spells\Form\Infrastructure\Models\SpellForm;
use Illuminate\Database\Eloquent\Collection;

class FormCollection extends Collection
{
    public function hex(): SpellForm
    {
        return $this->firstWhere('name', '=', Form::HEX->value);
    }

    public function ointment(): SpellForm
    {
        return $this->firstWhere('name', '=', Form::OINTMENT->value);
    }

    public function potion(): SpellForm
    {
        return $this->firstWhere('name', '=', Form::POTION->value);
    }

    public function summon(): SpellForm
    {
        return $this->firstWhere('name', '=', Form::SUMMON->value);
    }

    public function talisman(): SpellForm
    {
        return $this->firstWhere('name', '=', Form::TALISMAN->value);
    }
}
