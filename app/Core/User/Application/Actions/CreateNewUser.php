<?php

declare(strict_types=1);

namespace Aquelarre\Core\User\Application\Actions;

use Aquelarre\Core\Shared\Application\Rules\Rule;
use Aquelarre\Core\User\Domain\Dto\NewUser;
use Aquelarre\Core\User\Domain\Services\Writer;
use Illuminate\Validation\Factory;
use Laravel\Fortify\Contracts\CreatesNewUsers;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    public function __construct(
        private readonly Factory $validator,
        private readonly Writer $writer,
    ) {
    }

    // phpcs:ignore SlevomatCodingStandard.TypeHints.ParameterTypeHint.MissingTraversableTypeHintSpecification, SlevomatCodingStandard.TypeHints.ReturnTypeHint.MissingAnyTypeHint -- baseline
    public function create(array $input)
    {
        $data = $this->validator->make(
            data: $input,
            rules: $this->rules()
        )->validate();

        return $this->writer->create(
            data: $this->mapDataToDto(input: $data),
        );
    }

    // phpcs:ignore SlevomatCodingStandard.TypeHints.ParameterTypeHint.MissingTraversableTypeHintSpecification -- baseline
    private function mapDataToDto(array $input): NewUser
    {
        return new NewUser([
            'name' => $input['name'],
            'email' => $input['email'],
            'password' => $input['password'],
            'role_name' => $input['role'] ?? 'user',
        ]);
    }

    // phpcs:ignore SlevomatCodingStandard.TypeHints.ReturnTypeHint.MissingTraversableTypeHintSpecification -- baseline
    private function rules(): array
    {
        return [
            'name' => Rule::nameRules(),
            'email' => Rule::emailRules(),
            'password' => Rule::passwordRules(),
        ];
    }
}
