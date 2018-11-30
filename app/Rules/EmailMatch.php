<?php

namespace App\Rules;

use App\Models\Guest;
use Illuminate\Contracts\Validation\Rule;

class EmailMatch implements Rule
{
    /**
     * @var Guest
     */
    protected $guest;

    /**
     * Create a new rule instance.
     *
     * @param Guest $guest
     */
    public function __construct(Guest $guest)
    {
        $this->guest = $guest;
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        return $this->guest->email === $value;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return __('validation.email_match');
    }
}
