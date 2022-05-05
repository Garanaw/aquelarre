<?php

declare(strict_types=1);

namespace Presentation\Shared\Components;

use Illuminate\View\Component;

class AppLayout extends Component
{
    public function render()
    {
        return view('shared::.layouts.app');
    }
}
