<?php

declare(strict_types=1);

namespace Aquelarre\Spell\Application\Request;

use Aquelarre\Core\Framework\Application\Request\Searchable;
use Aquelarre\Core\Framework\Domain\Search\Searcher;
use Aquelarre\Spell\Domain\Searchers\IndexSearch;
use Illuminate\Foundation\Http\FormRequest;

class IndexRequest extends FormRequest implements Searchable
{
    /** @return mixed[] */
    public function rules(): array
    {
        return [
            'name' => [
                'nullable',
                'string',
            ],
            'vis' => [
                'nullable',
                'integer',
            ],
            'form' => [
                'nullable',
                'integer',
            ],
            'origin' => [
                'nullable',
                'integer',
            ],
            'nature' => [
                'nullable',
                'integer',
            ],
            'book' => [
                'nullable',
                'integer',
            ],
        ];
    }

    public function getSearcher(): Searcher
    {
        return new IndexSearch(
            ...$this->validated(),
            user: $this->user()
        );
    }
}
