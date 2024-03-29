<?php

declare(strict_types=1);

namespace Aquelarre\Core\Kingdom\Application\Responses;

use Aquelarre\Core\Kingdom\Application\Transformers\KingdomTransformer;
use Aquelarre\Core\Kingdom\Infrastructure\Models\Kingdom;
use Illuminate\Contracts\Support\Responsable;
use Symfony\Component\HttpFoundation\Response;

class ItemResponse implements Responsable
{
    public function __construct(
        private readonly Kingdom $item,
    ) {
    }

    // phpcs:ignore SlevomatCodingStandard.Functions.UnusedParameter.UnusedParameter, SlevomatCodingStandard.TypeHints.ParameterTypeHint.MissingAnyTypeHint -- baseline
    public function toResponse($request): Response
    {
        return fractal()
            ->item($this->item)
            ->transformWith(KingdomTransformer::class)
            ->respond(statusCode: Response::HTTP_OK);
    }
}
