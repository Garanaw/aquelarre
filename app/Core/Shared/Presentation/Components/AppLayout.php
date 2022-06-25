<?php

declare(strict_types=1);

namespace Aquelarre\Core\Shared\Presentation\Components;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class AppLayout extends Component
{
    // phpcs:ignore SlevomatCodingStandard.TypeHints.ReturnTypeHint.MissingAnyTypeHint -- baseline
    public function render(): View
    {
        return view('shared::layouts.app');
    }
}
