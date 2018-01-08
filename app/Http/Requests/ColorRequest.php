<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ColorRequest extends FormRequest
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
            'value' => ['required', Rule::unique('colors')->ignore(request()->input('id'))],
            'hex' => 'required_without:file',
            'file' => 'required_without:hex|image'
        ];
    }

    public function messages()
    {
        return [
            'value.required' => 'El campo nombre es obligatorio.',
            'hex.required_without' => 'El campo color es obligatorio cuando imagen no está presente.',
            'file.required_without' => 'El campo imagen es obligatorio cuando color no está presente.'
        ];
    }
}
