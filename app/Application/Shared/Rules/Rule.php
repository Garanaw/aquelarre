<?php

declare(strict_types=1);

namespace Application\Shared\Rules;

use Illuminate\Contracts\Validation\Rule as RuleContract;
use Illuminate\Validation\Rule as BaseRule;
use Laravel\Fortify\Rules\Password;

class Rule extends BaseRule
{

    public static function nameRules(): array
    {
        return [
            'required',
            'string',
            'max:255',
        ];
    }

    public static function password(): RuleContract
    {
        $rule = new Password();

        return $rule->length(config('app.password_length'))
            ->requireNumeric()
            ->requireSpecialCharacter()
            ->requireNumeric();
    }

    public static function passwordRules(): array
    {
        return [
            'required',
            'string',
            static::password(),
            'confirmed',
        ];
    }

    public static function emailRules(): array
    {
        return [
            'required',
            'string',
            'email',
            'max:255',
            'unique:users,email',
        ];
    }
}
