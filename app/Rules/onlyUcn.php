<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class OnlyUcn implements Rule {

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value) {
        if (strpos($value, '@ucn.dk') !== false) {
            return true;
        }
        return false;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message() {
        return 'Only UCN email is allowed.';
    }
}