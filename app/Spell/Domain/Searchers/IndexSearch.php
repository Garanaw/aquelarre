<?php

declare(strict_types=1);

namespace Aquelarre\Spell\Domain\Searchers;

use Aquelarre\Core\Framework\Domain\Search\Searcher;
use Aquelarre\Core\User\Infrastructure\Models\User;
use Spatie\DataTransferObject\DataTransferObject;

/**
 * @property User $user
 * @property ?int $book
 * @property ?int $form
 * @property ?int $origin
 * @property ?int $nature
 * @property ?string $name
 */
class IndexSearch extends DataTransferObject implements Searcher
{
    public readonly User $user;
    public readonly ?string $name;
    public readonly ?int $book;
    public readonly ?int $form;
    public readonly ?int $origin;
    public readonly ?int $nature;
    public readonly ?int $vis;
}
