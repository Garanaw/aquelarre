<?php

declare(strict_types=1);

namespace Aquelarre\Spell\Application\Request;

use Aquelarre\Core\Framework\Application\Request\Searchable;
use Aquelarre\Core\Framework\Domain\Concerns\EncodesIds;
use Aquelarre\Core\Framework\Domain\Contracts\HasDecodableValues;
use Aquelarre\Core\Framework\Domain\Search\Searcher;
use Aquelarre\Spell\Domain\Searchers\IndexSearch;
use Illuminate\Foundation\Http\FormRequest;

class IndexRequest extends FormRequest implements Searchable, HasDecodableValues
{
    use EncodesIds;

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

    public function getDecodableKeys(): array
    {
        return [
            'form',
            'origin',
            'nature',
            'book',
        ];
    }

    public function decodeValues(array $values): array
    {
        return collect($this->validated())
            ->map(
                fn (mixed $value, string $key): mixed => $value && in_array($key, $this->getDecodableKeys())
                    ? $this->decode((int)$value)
                    : $value
            )->toArray();
    }

    public function getSearcher(): Searcher
    {
        return new IndexSearch(
            ...$this->validated(),
            user: $this->user()
        );
    }
}
