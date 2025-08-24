<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */

    'accepted' => 'El campo :attribute debe ser aceptado.',
    'accepted_if' => 'El campo :attribute debe ser aceptado cuando :other es :value.',
    'active_url' => 'El campo :attribute no es una URL válida.',
    'after' => 'El campo :attribute debe ser una fecha después de :date.',
    'after_or_equal' => 'El campo :attribute debe ser una fecha después de o igual a :date.',
    'alpha' => 'El campo :attribute solo puede contener letras.',
    'alpha_dash' => 'El campo :attribute solo puede contener letras, números, guiones, y guiones bajos.',
    'alpha_num' => 'El campo :attribute solo puede contener letras y números.',
    'any_of' => 'El campo :attribute es inválido.',
    'array' => 'El campo :attribute debe ser un array.',
    'ascii' => 'El campo :attribute solo puede contener símbolos y caracteres alfanuméricos single-byte.',
    'before' => 'El campo :attribute debe ser una fecha anterior a :date.',
    'before_or_equal' => 'El campo :attribute debe ser una fecha anterior o igual a :date.',
    'between' => [
        'array' => 'El campo :attribute debe tener entre :min y :max elementos.',
        'file' => 'El campo :attribute debe pesar entre :min y :max kilobytes.',
        'numeric' => 'El campo :attribute debe ser un valor entre :min y :max.',
        'string' => 'El campo :attribute debe contener entre :min y :max caracteres.',
    ],
    'boolean' => 'El campo :attribute debe ser verdadero o falso.',
    'can' => 'El campo :attribute contiene un valor no autorizado.',
    'confirmed' => 'La confirmación del campo :attribute no coincide.',
    'contains' => 'El campo :attribute is missing a required value.',
    'current_password' => 'The password is incorrect.',
    'date' => 'El campo :attribute must be a valid date.',
    'date_equals' => 'El campo :attribute must be a date equal to :date.',
    'date_format' => 'El campo :attribute must match the format :format.',
    'decimal' => 'El campo :attribute must have :decimal decimal places.',
    'declined' => 'El campo :attribute must be declined.',
    'declined_if' => 'El campo :attribute must be declined when :other is :value.',
    'different' => 'El campo :attribute and :other must be different.',
    'digits' => 'El campo :attribute must be :digits digits.',
    'digits_between' => 'El campo :attribute must be between :min and :max digits.',
    'dimensions' => 'El campo :attribute has invalid image dimensions.',
    'distinct' => 'El campo :attribute has a duplicate value.',
    'doesnt_contain' => 'El campo :attribute must not contain any of the following: :values.',
    'doesnt_end_with' => 'El campo :attribute must not end with one of the following: :values.',
    'doesnt_start_with' => 'El campo :attribute must not start with one of the following: :values.',
    'email' => 'El campo :attribute must be a valid email address.',
    'ends_with' => 'El campo :attribute must end with one of the following: :values.',
    'enum' => 'The selected :attribute is invalid.',
    'exists' => 'The selected :attribute is invalid.',
    'extensions' => 'El campo :attribute must have one of the following extensions: :values.',
    'file' => 'El campo :attribute must be a file.',
    'filled' => 'El campo :attribute must have a value.',
    'gt' => [
        'array' => 'El campo :attribute must have more than :value items.',
        'file' => 'El campo :attribute must be greater than :value kilobytes.',
        'numeric' => 'El campo :attribute must be greater than :value.',
        'string' => 'El campo :attribute must be greater than :value characters.',
    ],
    'gte' => [
        'array' => 'El campo :attribute must have :value items or more.',
        'file' => 'El campo :attribute must be greater than or equal to :value kilobytes.',
        'numeric' => 'El campo :attribute must be greater than or equal to :value.',
        'string' => 'El campo :attribute must be greater than or equal to :value characters.',
    ],
    'hex_color' => 'El campo :attribute must be a valid hexadecimal color.',
    'image' => 'El campo :attribute must be an image.',
    'in' => 'The selected :attribute is invalid.',
    'in_array' => 'El campo :attribute must exist in :other.',
    'in_array_keys' => 'El campo :attribute must contain at least one of the following keys: :values.',
    'integer' => 'El campo :attribute must be an integer.',
    'ip' => 'El campo :attribute must be a valid IP address.',
    'ipv4' => 'El campo :attribute must be a valid IPv4 address.',
    'ipv6' => 'El campo :attribute must be a valid IPv6 address.',
    'json' => 'El campo :attribute must be a valid JSON string.',
    'list' => 'El campo :attribute must be a list.',
    'lowercase' => 'El campo :attribute must be lowercase.',
    'lt' => [
        'array' => 'El campo :attribute must have less than :value items.',
        'file' => 'El campo :attribute must be less than :value kilobytes.',
        'numeric' => 'El campo :attribute must be less than :value.',
        'string' => 'El campo :attribute must be less than :value characters.',
    ],
    'lte' => [
        'array' => 'El campo :attribute must not have more than :value items.',
        'file' => 'El campo :attribute must be less than or equal to :value kilobytes.',
        'numeric' => 'El campo :attribute must be less than or equal to :value.',
        'string' => 'El campo :attribute must be less than or equal to :value characters.',
    ],
    'mac_address' => 'El campo :attribute must be a valid MAC address.',
    'max' => [
        'array' => 'El campo :attribute must not have more than :max items.',
        'file' => 'El campo :attribute must not be greater than :max kilobytes.',
        'numeric' => 'El campo :attribute must not be greater than :max.',
        'string' => 'El campo :attribute must not be greater than :max characters.',
    ],
    'max_digits' => 'El campo :attribute must not have more than :max digits.',
    'mimes' => 'El campo :attribute must be a file of type: :values.',
    'mimetypes' => 'El campo :attribute must be a file of type: :values.',
    'min' => [
        'array' => 'El campo :attribute must have at least :min items.',
        'file' => 'El campo :attribute must be at least :min kilobytes.',
        'numeric' => 'El campo :attribute must be at least :min.',
        'string' => 'El campo :attribute must be at least :min characters.',
    ],
    'min_digits' => 'El campo :attribute must have at least :min digits.',
    'missing' => 'El campo :attribute must be missing.',
    'missing_if' => 'El campo :attribute must be missing when :other is :value.',
    'missing_unless' => 'El campo :attribute must be missing unless :other is :value.',
    'missing_with' => 'El campo :attribute must be missing when :values is present.',
    'missing_with_all' => 'El campo :attribute must be missing when :values are present.',
    'multiple_of' => 'El campo :attribute must be a multiple of :value.',
    'not_in' => 'The selected :attribute is invalid.',
    'not_regex' => 'El campo :attribute format is invalid.',
    'numeric' => 'El campo :attribute must be a number.',
    'password' => [
        'letters' => 'El campo :attribute must contain at least one letter.',
        'mixed' => 'El campo :attribute must contain at least one uppercase and one lowercase letter.',
        'numbers' => 'El campo :attribute must contain at least one number.',
        'symbols' => 'El campo :attribute must contain at least one symbol.',
        'uncompromised' => 'The given :attribute has appeared in a data leak. Please choose a different :attribute.',
    ],
    'present' => 'El campo :attribute must be present.',
    'present_if' => 'El campo :attribute must be present when :other is :value.',
    'present_unless' => 'El campo :attribute must be present unless :other is :value.',
    'present_with' => 'El campo :attribute must be present when :values is present.',
    'present_with_all' => 'El campo :attribute must be present when :values are present.',
    'prohibited' => 'El campo :attribute is prohibited.',
    'prohibited_if' => 'El campo :attribute is prohibited when :other is :value.',
    'prohibited_if_accepted' => 'El campo :attribute is prohibited when :other is accepted.',
    'prohibited_if_declined' => 'El campo :attribute is prohibited when :other is declined.',
    'prohibited_unless' => 'El campo :attribute is prohibited unless :other is in :values.',
    'prohibits' => 'El campo :attribute prohibits :other from being present.',
    'regex' => 'El campo :attribute format is invalid.',
    'required' => 'El campo :attribute is required.',
    'required_array_keys' => 'El campo :attribute must contain entries for: :values.',
    'required_if' => 'El campo :attribute is required when :other is :value.',
    'required_if_accepted' => 'El campo :attribute is required when :other is accepted.',
    'required_if_declined' => 'El campo :attribute is required when :other is declined.',
    'required_unless' => 'El campo :attribute is required unless :other is in :values.',
    'required_with' => 'El campo :attribute is required when :values is present.',
    'required_with_all' => 'El campo :attribute is required when :values are present.',
    'required_without' => 'El campo :attribute is required when :values is not present.',
    'required_without_all' => 'El campo :attribute is required when none of :values are present.',
    'same' => 'El campo :attribute must match :other.',
    'size' => [
        'array' => 'El campo :attribute must contain :size items.',
        'file' => 'El campo :attribute must be :size kilobytes.',
        'numeric' => 'El campo :attribute must be :size.',
        'string' => 'El campo :attribute must be :size characters.',
    ],
    'starts_with' => 'El campo :attribute must start with one of the following: :values.',
    'string' => 'El campo :attribute must be a string.',
    'timezone' => 'El campo :attribute must be a valid timezone.',
    'unique' => 'The :attribute has already been taken.',
    'uploaded' => 'The :attribute failed to upload.',
    'uppercase' => 'El campo :attribute must be uppercase.',
    'url' => 'El campo :attribute debe ser una URL válida.',
    'ulid' => 'El campo :attribute debe ser un ULID válido.',
    'uuid' => 'El campo :attribute debe ser un UUID válido.',

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */

    'custom' => [
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap our attribute placeholder
    | with something more reader friendly such as "E-Mail Address" instead
    | of "email". This simply helps us make our message more expressive.
    |
    */

    'attributes' => [],

];
