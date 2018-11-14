<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RatesRequest extends FormRequest
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
            'column_id' => ['sometimes', 'required', 'exists:columns,id'],
            'name'      => ['required'],
            'color'     => ['required', 'min:3'],
        ];
    }
}
