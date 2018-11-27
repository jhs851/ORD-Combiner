<?php

namespace App\Rules;

use App\Models\Unit;
use Illuminate\Contracts\Validation\Rule;

class ExistWisp implements Rule
{
    /**
     * @var Unit
     */
    protected $unit;

    /**
     * Create a new rule instance.
     *
     * @param Unit $unit
     */
    public function __construct(Unit $unit)
    {
        $this->unit = $unit;
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
        return ! in_array(
            Unit::wisp()->value('id'),
            $this->unit->formulas->pluck('unit_id')->toArray()
        );
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return __('validation.exist_wisp');
    }
}
