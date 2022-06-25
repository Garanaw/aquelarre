<?php // phpcs:ignore SlevomatCodingStandard.TypeHints.DeclareStrictTypes.DeclareStrictTypesMissing -- baseline

namespace Aquelarre\Core\User\Application\Actions;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Laravel\Fortify\Contracts\UpdatesUserProfileInformation;

class UpdateUserProfileInformation implements UpdatesUserProfileInformation
{
    // phpcs:disable SlevomatCodingStandard.TypeHints.ParameterTypeHint.MissingTraversableTypeHintSpecification -- baseline
    /**
     * Validate and update the given user's profile information.
     *
     * @param  mixed  $user
     * @param  array  $input
     * @return void
     */
    // phpcs:enable SlevomatCodingStandard.TypeHints.ParameterTypeHint.MissingTraversableTypeHintSpecification -- baseline
    // phpcs:ignore SlevomatCodingStandard.TypeHints.ParameterTypeHint.MissingNativeTypeHint, SlevomatCodingStandard.TypeHints.ReturnTypeHint.MissingNativeTypeHint -- baseline
    public function update($user, array $input)
    {
        Validator::make($input, [
            // phpcs:ignore Squiz.Arrays.ArrayDeclaration.SingleLineNotAllowed -- baseline
            'name' => ['required', 'string', 'max:255'],

            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                Rule::unique('users')->ignore($user->id),
            ],
        ])->validateWithBag('updateProfileInformation');

        if ($input['email'] !== $user->email &&
            // phpcs:ignore PEAR.ControlStructures.MultiLineCondition.CloseBracketNewLine, PEAR.ControlStructures.MultiLineCondition.StartWithBoolean -- baseline
            $user instanceof MustVerifyEmail) {
            $this->updateVerifiedUser($user, $input);
            return;
        }

        $user->forceFill([
            'name' => $input['name'],
            'email' => $input['email'],
        ])->save();
    }

    // phpcs:disable SlevomatCodingStandard.TypeHints.ParameterTypeHint.MissingTraversableTypeHintSpecification -- baseline
    /**
     * Update the given verified user's profile information.
     *
     * @param  mixed  $user
     * @param  array  $input
     * @return void
     */
    // phpcs:enable SlevomatCodingStandard.TypeHints.ParameterTypeHint.MissingTraversableTypeHintSpecification -- baseline
    // phpcs:ignore SlevomatCodingStandard.TypeHints.ParameterTypeHint.MissingNativeTypeHint, SlevomatCodingStandard.TypeHints.ReturnTypeHint.MissingNativeTypeHint -- baseline
    protected function updateVerifiedUser($user, array $input)
    {
        $user->forceFill([
            'name' => $input['name'],
            'email' => $input['email'],
            'email_verified_at' => null,
        ])->save();

        $user->sendEmailVerificationNotification();
    }
}
