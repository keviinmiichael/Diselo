<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClientRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|string',
            'lastname' => 'required|string',
            'business_name' => 'required',
            'phone' => 'required|numeric',
            'email' => 'required|email',
            'street' => 'required',
            'number' => 'required|numeric',
            'zip_code' => 'required',
            'provincia_id' => 'required',
            'localidad_id' => 'required',
            'condiciones' => 'accepted'
        ];
    }

    public function messages()
    {
		return [
            'name.required' => 'El nombre es obligatorio',
            'lastname.required'  => 'El apellido es obligatorio',
            'business_name.required'  => 'La Razón Social es obligatoria',
            'phone.required'  => 'El teléfono es obligatorio',
            'email.required'  => 'El email es obligatorio',
            'street.required'  => 'El nombre de la calle es obligatorio',
            'number.required'  => 'La altura de la calle es obligatoria',
            'zip_code.required'  => 'El código postal es obligatorio',
    		'provincia_id.required'  => 'Por favor selecciona una provincia',
            'localidad_id.required'  => 'Por favor selecciona una localidad',
        ];
    }

}
