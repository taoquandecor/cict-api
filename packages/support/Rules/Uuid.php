<?php

namespace Support\Rules;

use Illuminate\Contracts\Validation\Rule;
use Support\General\Config;

class Uuid implements Rule
{
    public function passes($attribute, $value)
    {
        return preg_match(Config::UUID_REGEX, strtoupper($value));
    }

    public function message()
    {
        return __('Uuid');
    }
}
