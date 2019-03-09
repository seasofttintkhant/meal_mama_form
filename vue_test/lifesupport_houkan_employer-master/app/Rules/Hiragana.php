<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class Hiragana implements Rule
{

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        if(preg_match('/^[\p{Hiragana}]+$/iu', $value))
        {
            return true;
        }
        return false;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return ':attribute はひらがなで入力してください。';
    }
}
