<?php

declare(strict_types=1);

namespace Aquelarre\Spell\Application\Actions;

use Aquelarre\Spell\Infrastructure\Models\Spell;
use Illuminate\Contracts\View\View;
use Illuminate\View\Factory;

class Show
{
    public function __invoke(Spell $spell, Factory $view): View
    {
        return $view->make('spell::show', [
            'spell' => $spell->load([
                'form',
                'nature',
                'origin',
            ]),
        ]);
    }
}
