<?php

declare(strict_types=1);

namespace App\Game\Core\Features\Spells\Form\Infrastructure\Readers;

use App\Game\Core\Features\Spells\Form\Infrastructure\Collection\FormCollection;
use App\Game\Core\Features\Spells\Form\Infrastructure\Models\SpellForm;

class Reader
{
    public function __construct(
        private readonly SpellForm $form,
    ) {
    }

    public function all(): FormCollection
    {
        return $this->form->all();
    }
}
