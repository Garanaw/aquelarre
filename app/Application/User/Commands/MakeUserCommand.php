<?php

declare(strict_types=1);

/**
 * Due to Laravel's commands discovery mechanism,
 * the namespace of the commands must be at the App level.
 */
namespace Application\User\Commands;

use Application\Shared\Rules\Rule;
use Aquelarre\Core\User\Domain\Dto\NewUser;
use Aquelarre\Core\User\Domain\Services\Writer;
use Illuminate\Console\Command;
use Illuminate\Support\Carbon;
use Illuminate\Validation\Factory;
use Infrastructure\User\Models\Role;

class MakeUserCommand extends Command
{
    protected $signature = 'make:user {name}';

    protected $description = 'Create a new user';

    private readonly Factory $validator;
    private readonly array $roleNames;

    public function handle(Writer $creator, Role $role, Factory $validator): void
    {
        $this->validator = $validator;
        $this->roleNames = $role->pluck('name')->toArray();

        $userDto = new NewUser($this->getData());

        $creator->create($userDto);
    }

    private function getData(): array
    {
        return [
            'name' => $this->argument(key: 'name'),
            'email' => $this->askForEmail(),
            'password' => $this->askForPassword(),
            'email_verified_at' => Carbon::now(),
            'role_name' => $this->askForRole(),
        ];
    }

    private function askForEmail(): string
    {
        do {
            $email = $this->ask(question: 'What is the user email?');
        } while (! $this->validate(data: ['email' => $email], rules: ['email' => Rule::emailRules()]));

        return $email;
    }

    private function askForPassword(): string
    {
        do {
            $data = [
                'password' => $this->secret(question: 'What is the user password?'),
                'password_confirmation' => $this->secret('Confirm the user password?'),
            ];
        } while (! $this->validate(data: $data, rules: ['password' => Rule::passwordRules()]));

        return $data['password'];
    }

    private function askForRole(): string
    {
        do {
            $roleName = $this->anticipate(question: 'What is the user role?', choices: $this->roleNames);
        } while (! $this->validate(data: ['roles' => $roleName], rules: ['roles' => ['required', Rule::in($this->roleNames)]]));

        return $roleName;
    }

    private function validate(array $data, array $rules): bool
    {
        return $this->validator->make($data, $rules)->passes();
    }
}
