<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UnitsRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'rate_id' => ['sometimes', 'required', 'exists:rates,id'],
            'name'    => ['required', Rule::unique('units', 'name')->where(function($query) {
                return $query->where([['version_id', version()->id], ['rate_id', $this->get('rate_id')]]);
            })],
            'count'   => ['integer', 'min:0'],
        ];
    }
}
