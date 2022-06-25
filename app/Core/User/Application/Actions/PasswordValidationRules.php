<?php // phpcs:ignore SlevomatCodingStandard.TypeHints.DeclareStrictTypes.DeclareStrictTypesMissing -- baseline

namespace Aquelarre\Core\User\Application\Actions;

use Laravel\Fortify\Rules\Password;

trait PasswordValidationRules
{
    // phpcs:disable SlevomatCodingStandard.TypeHints.ReturnTypeHint.MissingTraversableTypeHintSpecification -- baseline
    /**
     * Get the validation rules used to validate passwords.
     *
     * @return array
     */
    // phpcs:enable SlevomatCodingStandard.TypeHints.ReturnTypeHint.MissingTraversableTypeHintSpecification -- baseline
    // phpcs:ignore SlevomatCodingStandard.TypeHints.ReturnTypeHint.MissingNativeTypeHint -- baseline
    protected function passwordRules()
    {
        // phpcs:ignore PSR12.Classes.ClassInstantiation.MissingParentheses, Squiz.Arrays.ArrayDeclaration.SingleLineNotAllowed -- baseline
        return ['required', 'string', new Password, 'confirmed'];
    }
}
