<?php

declare(strict_types=1);

namespace App\Game\Core\Features\Kingdom\Application\Responses;

use App\Books\Infrastructure\Models\Book;
use App\Game\Core\Features\Kingdom\Infrastructure\Models\Kingdom;
use Illuminate\Contracts\Support\Responsable;

class KingdomResponse implements Responsable
{
    private readonly Kingdom $kingdom;

    public function make(Kingdom $kingdom): self
    {
        $this->kingdom = $kingdom;

        return $this;
    }

    public function toResponse($request)
    {
        return [
            'id' => $this->kingdom->encoded_id,
            'name' => $this->kingdom->name,
            'description' => $this->kingdom->description,
            'peninsular' => $this->kingdom->peninsular,
            'book_id' => Book::encodeId($this->kingdom->book_id),
        ];
    }
}
