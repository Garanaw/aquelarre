<?php

declare(strict_types=1);

namespace Application\User\Actions;

use Application\Shared\Rules\Rule;
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

    private function mapDataToDto(array $input): NewUser
    {
        return new NewUser(
            name: $input['name'],
            email: $input['email'],
            password: $input['password'],
            role_name: $input['role'] ?? 'user',
        );
    }

    private function rules(): array
    {
        return [
            'name' => Rule::nameRules(),
            'email' => Rule::emailRules(),
            'password' => Rule::passwordRules(),
        ];
    }
}
