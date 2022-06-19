<?php

declare(strict_types=1);

namespace Aquelarre\Core\Shared\Presentation\Components;

use Illuminate\View\Component;
use Illuminate\View\View;

class PageHeader extends Component
{
    public function render(): View
    {
        return view('shared::layouts.page-header');
    }
}
