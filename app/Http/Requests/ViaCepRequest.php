<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ViaCepRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'cep'=> ['required','max:8', 'max:8']
        ];
    }

    public function messages()
    {
        return [
            'cep.required' => 'Cep é obrigartório.',
            'cep.min' => 'Número mínimo de 8 Dígitos.',
            'cep.max' => 'Número máximo de 8 Dígitos.',
        ];
    }
}
