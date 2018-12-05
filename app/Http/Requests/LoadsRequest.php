<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Validator;

class LoadsRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Gate::allows('update', $this->user());
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'clear' => ['required', 'integer'],
            'code'  => ['required', 'min:4'],
        ];
    }

    /**
     * Configure the validator instance.
     *
     * @param  Validator $validator
     * @return void
     */
    public function withValidator(Validator $validator)
    {
        $pattern = '/^-load /';
        $code = $this->get('code');

        if (preg_match($pattern, $code))
            $this->merge(['code' => preg_replace($pattern, '', $code)]);
    }
}
