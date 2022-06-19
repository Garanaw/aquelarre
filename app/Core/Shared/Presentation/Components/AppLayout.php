<?php

declare(strict_types=1);

namespace Aquelarre\Core\Shared\Presentation\Components;

use Illuminate\View\Component;

class AppLayout extends Component
{
    public function render()
    {
        return view('shared::layouts.app');
    }
}
