<?php

declare(strict_types=1);

namespace Aquelarre\Spell\Application\Responses;

use Aquelarre\Spell\Domain\SearchResults\IndexResult;
use Illuminate\Contracts\Support\Responsable;
use Illuminate\View\Factory as View;

readonly class IndexResponse implements Responsable
{
    public function __construct(
        private IndexResult $result,
        private View $view
    ) {
    }

    /**
     * @inheritDoc
     */
    public function toResponse($request)
    {
        return $this->view->make('spell::index', [
            'result' => $this->result,
        ]);
    }
}
