<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required',
            'email' => 'required|email',
            'subject' => 'required',
            'message' => 'required|min:10',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'El nombre es obligatorio',
            'email.required'  => 'El email es obligatorio',
            'email.email'  => 'El email ingresado no es válido',
            'subject.required'  => 'El asunto es obligatorio',
            'message.required'  => 'El mensaje es obligatorio',
            'message.min'  => 'El mensaje es muy corto',
        ];
    }
}
