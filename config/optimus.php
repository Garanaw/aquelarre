<?php // phpcs:ignore SlevomatCodingStandard.TypeHints.DeclareStrictTypes.DeclareStrictTypesMissing -- baseline

return [
    'prime' => (int)env('OPTIMUS_PRIME', 217645199),
    'inverse' => (int)env('OPTIMUS_INVERSE', 981999215),
    'random' => (int)env('OPTIMUS_RANDOM', 544739622),
    'bit_length' => (int)env('OPTIMUS_BIT_LENGTH', 31),
];
