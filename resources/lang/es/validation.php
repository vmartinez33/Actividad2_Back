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

    'accepted' => ':attribute debe ser aceptado.',
    'active_url' => ':attribute no es una URL válida.',
    'after' => ':attribute debe ser una fecha posterior a :date.',
    'after_or_equal' => ':attribute debe ser una fecha igual o posterior a :date',
    'alpha' => ':attribute solo debe contener letras.',
    'alpha_dash' => ':attribute solo debe contener letras, números, guiones y guiones bajos.',
    'alpha_num' => ':attribute solo debe contener letras y números.',
    'array' => ':attribute debe ser un array.',
    'before' => ':attribute debe ser una fecha anterior a :date.',
    'before_or_equal' => ':attribute debe ser una fecha igual o anterior a :date.',
    'between' => [
        'numeric' => ':attribute debe ser un valor entre :min y :max.',
        'file' => 'El archivo :attribute debe pesar entre :min y :max kilobytes.',
        'string' => ':attribute debe tener entre :min y :max carácteres.',
        'array' => 'El array :attribute debe contener entre :min y :max elementos.',
    ],
    'boolean' => 'El campo :attribute debe ser "true" o "false".',
    'confirmed' => 'La confirmación de :attribute no coincide.',
    'date' => ':attribute no es una fecha válida.',
    'date_equals' => ':attribute debe ser una fecha igual a :date.',
    'date_format' => 'La fecha :attribute no tiene el formato :format.',
    'different' => ':attribute y :other deben ser diferentes.',
    'digits' => ':attribute debe tener :digits dígitos.',
    'digits_between' => ':attribute debe tener entre :min y :max dígitos.',
    'dimensions' => ':attribute no tiene unas dimensiones de imágen válidas.',
    'distinct' => 'El campo :attribute tiene un valor duplicado.',
    'email' => ':attribute debe ser una dirección de correo electrónico válida.',
    'ends_with' => ':attribute debe terminar con uno de los siguientes valores: :values.',
    'exists' => 'El :attribute seleccionado no es válido.',
    'file' => ':attribute debe ser un archivo.',
    'filled' => 'El campo :attribute debe tener un valor.',
    'gt' => [
        'numeric' => ':attribute debe ser mayor de :value.',
        'file' => 'El archivo :attribute debe pesar más de :value kilobytes.',
        'string' => ':attribute debe tener más de :value carácteres.',
        'array' => 'El array :attribute debe tener más de :value elementos.',
    ],
    'gte' => [
        'numeric' => ':attribute debe ser mayor o igual a :value.',
        'file' => 'El archivo :attribute debe pesar :value kilobytes o más.',
        'string' => ':attribute debe tener :value carácteres o más.',
        'array' => 'El array :attribute debe tener :value elementos o más.',
    ],
    'image' => ':attribute debe ser una imagen.',
    'in' => 'El :attribute seleccionado no es válido.',
    'in_array' => 'El campo :attribute no existe en :other.',
    'integer' => ':attribute debe ser un entero.',
    'ip' => ':attribute debe ser una dirección IP válida.',
    'ipv4' => ':attribute debe ser una dirección IPv4 válida.',
    'ipv6' => ':attribute debe ser una dirección IPv6 válida.',
    'json' => ':attribute debe ser un string JSON válido.',
    'lt' => [
        'numeric' => ':attribute debe ser menor de :value.',
        'file' => 'El archivo :attribute debe pesar menos de :value kilobytes.',
        'string' => ':attribute debe tener menos de :value carácteres.',
        'array' => 'El array :attribute debe tener menos de :value elementos.',
    ],
    'lte' => [
        'numeric' => ':attribute debe ser menor o igual a :value.',
        'file' => 'El archivo :attribute debe pesar :value kilobytes o menos.',
        'string' => ':attribute debe tener :value carácteres o menos.',
        'array' => 'El array :attribute debe tener :value elementos o menos.',
    ],
    'max' => [
        'numeric' => ':attribute no puede ser mayor de :max.',
        'file' => 'El archivo :attribute no puede pesar más de :max kilobytes.',
        'string' => ':attribute no puede tener más de :max carácteres.',
        'array' => 'El array :attribute no puede tener más de :max elementos.',
    ],
    'mimes' => 'El archivo :attribute debe ser de tipo: :values.',
    'mimetypes' => 'El archivo :attribute debe ser de tipo: :values.',
    'min' => [
        'numeric' => 'El valor de :attribute debe ser como mínimo :min.',
        'file' => 'El archivo :attribute debe pesar al menos :min kilobytes.',
        'string' => ':attribute debe tener al menos :min carácteres.',
        'array' => 'El array :attribute debe tener al menos :min elementos.',
    ],
    'not_in' => 'El :attribute seleccionado no es válido.',
    'not_regex' => 'El formato de :attribute no es válido.',
    'numeric' => ':attribute debe ser un número.',
    'password' => 'La contraseña es incorrecta.',
    'present' => 'El campo :attribute debe estar presente.',
    'regex' => 'El formato :attribute no es válido.',
    'required' => 'El campo :attribute es requerido.',
    'required_if' => 'El campo :attribute es requerido cuando :other es :value.',
    'required_unless' => 'El campo :attribute es requerido a no ser que :other sea :values.',
    'required_with' => 'El campo :attribute es requerido cuando :values está presente.',
    'required_with_all' => 'El campo :attribute es requerido cuando :values están presentes.',
    'required_without' => 'El campo :attribute es requerido cuando :values no está presente.',
    'required_without_all' => 'El campo :attribute es requerido cuando ninguno de los :values están presentes.',
    'same' => ':attribute y :other deben coincidir.',
    'size' => [
        'numeric' => ':attribute debe ser :size.',
        'file' => 'El fichero :attribute debe ser :size kilobytes.',
        'string' => ':attribute debe ser :size carácteres.',
        'array' => 'El array :attribute debe contener :size elementos.',
    ],
    'starts_with' => ':attribute debe comenzar con uno de los siguientes valores: :values.',
    'string' => ':attribute debe ser un string.',
    'timezone' => 'La zona horaria :attribute debe ser una zona válida.',
    'unique' => ':attribute ya ha sido tomado.',
    'uploaded' => 'La subida de :attribute ha fallado.',
    'url' => 'El formato de :attribute no es válido.',
    'uuid' => ':attribute debe ser un UUID válido.',

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
