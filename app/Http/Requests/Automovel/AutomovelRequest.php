<?php

namespace App\Http\Requests\Automovel;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class AutomovelRequest extends FormRequest
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
            'nome' => 'required|string|max:100',
            'cor' => 'required|string|max:50|',
            'categoria' => 'required',
            'numero_chassi' => 'required|integer',
            'ano'     => 'required|integer|digits:4',
            'filial' => 'required|integer',
            'modelo' => 'required|string|max:50',
        ];
    }
    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'nome.required' => 'Nome não informado',
            'cor.required' => 'Cor não informado',
            'filial.required' => 'Filial não informado',
            'ano.required' => 'Ano não informado',
            'modelo.required' => 'Modelo não informado',
            'numero_chassi.required' => 'Numero de chassi não informado',
            'categoria.required' => 'Categoria não informado',
        ];
    }
}
