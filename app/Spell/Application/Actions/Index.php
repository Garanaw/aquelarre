<?php

declare(strict_types=1);

namespace Aquelarre\Spell\Application\Actions;

use Aquelarre\Core\Books\Domain\Services\Reader as BookFinder;
use Aquelarre\Spell\Application\Request\IndexRequest as Request;
use Aquelarre\Spell\Application\Responses\IndexResponse;
use Aquelarre\Spell\Domain\SearchResults\IndexResult;
use Aquelarre\Spell\Domain\Services\SpellFinder;
use Illuminate\View\Factory;

class Index
{
    public function __invoke(
        Request $request,
        SpellFinder $spellFinder,
        BookFinder $bookFinder,
        Factory $view
    ): IndexResponse {
        $result = tap(
            $spellFinder->paginate($request->getSearcher()),
            fn (IndexResult $result) => $result->setBooks($bookFinder->allForUser($request->user()))
        );

        return new IndexResponse(
            $result,
            $view
        );
    }
}
