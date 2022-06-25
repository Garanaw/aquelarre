<?php

declare(strict_types=1);

namespace Aquelarre\Core\User\Application\Commands;

use Aquelarre\Core\Shared\Application\Rules\Rule;
use Aquelarre\Core\User\Domain\Dto\NewUser;
use Aquelarre\Core\User\Domain\Services\Writer;
use Aquelarre\Core\User\Infrastructure\Models\Role;
use Illuminate\Console\Command;
use Illuminate\Support\Carbon;
use Illuminate\Validation\Factory;

class MakeUserCommand extends Command
{
    /**
     * @var string
     * @phpcsSuppress SlevomatCodingStandard.TypeHints.ParameterTypeHint.MissingNativeTypeHint
     */
    // phpcs:ignore SlevomatCodingStandard.TypeHints.PropertyTypeHint.MissingNativeTypeHint -- baseline
    protected $signature = 'make:user {name}';

    /**
     * @var string
     * @phpcsSuppress SlevomatCodingStandard.TypeHints.ParameterTypeHint.MissingNativeTypeHint
     */
    // phpcs:ignore SlevomatCodingStandard.TypeHints.PropertyTypeHint.MissingNativeTypeHint -- baseline
    protected $description = 'Create a new user';

    private readonly Factory $validator;
    // phpcs:ignore Squiz.WhiteSpace.MemberVarSpacing.Incorrect -- baseline
    private readonly array $roleNames;

    public function handle(Writer $creator, Role $role, Factory $validator): void
    {
        $this->validator = $validator;
        $this->roleNames = $role->pluck('name')->toArray();

        $userDto = new NewUser($this->getData());

        $creator->create($userDto);
    }

    // phpcs:ignore SlevomatCodingStandard.TypeHints.ReturnTypeHint.MissingTraversableTypeHintSpecification -- baseline
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
        $error = false;
        do {
            $question = 'What is the email?';

            if ($error) {
                $question = 'The email is invalid. ' . $question;
            }

            $email = $this->ask(question: $question);
            $this->checkForCancellation(response: $email);
            $error = true;
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
            $this->checkForCancellation(response: $roleName);
        } while (! $this->validate(data: ['roles' => $roleName], rules: ['roles' => ['required', Rule::in($this->roleNames)]]));

        return $roleName;
    }

    // phpcs:ignore SlevomatCodingStandard.TypeHints.ParameterTypeHint.MissingTraversableTypeHintSpecification -- baseline
    private function validate(array $data, array $rules): bool
    {
        return $this->validator->make($data, $rules)->passes();
    }

    private function checkForCancellation(string $response): void
    {
        if (in_array($response, ['q', 'quit', 'exit', 'cancel'], true)) {
            $this->quit();
        }
    }

    /** @SuppressWarnings(PHPMD.ExitExpression) */
    private function quit(): never
    {
        $this->info('Bye!');
        exit;
    }
}
