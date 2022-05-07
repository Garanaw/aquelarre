<?php

declare(strict_types=1);

namespace Presentation\Shared\Components;

use Illuminate\View\Component;
use Illuminate\View\View;

class PageLayout extends Component
{
    public function render(): View
    {
        return view('shared::layouts.page');
    }
}
