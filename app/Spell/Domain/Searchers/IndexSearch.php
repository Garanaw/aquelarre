<?php

declare(strict_types=1);

namespace Aquelarre\Spell\Domain\Searchers;

use Aquelarre\Core\Framework\Domain\Search\Searcher;
use Aquelarre\Core\User\Infrastructure\Models\User;
use Illuminate\Support\Fluent;

/**
 * @property User $user
 * @property ?int $book
 * @property ?int $form
 * @property ?int $origin
 * @property ?int $nature
 * @property ?string $name
 * @property ?int $vis
 */
class IndexSearch extends Fluent implements Searcher
{
}
