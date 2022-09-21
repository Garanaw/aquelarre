<?php

declare(strict_types=1);

namespace Aquelarre\Core\Kingdom\Application\Transformers;

use Aquelarre\Core\Framework\Domain\Concerns\EncodesIds;
use Aquelarre\Core\Kingdom\Infrastructure\Models\Kingdom;
use League\Fractal\TransformerAbstract;

class KingdomTransformer extends TransformerAbstract
{
    use EncodesIds;

    public function transform(Kingdom $kingdom): array
    {
        return [
            'id' => $this->encode($kingdom->id),
            'name' => $kingdom->name,
            'description' => $kingdom->description,
            'peninsular' => $kingdom->peninsular,
        ];
    }
}
