<?php

namespace App\Http\Requests\Filial;

use Illuminate\Foundation\Http\FormRequest;

class FilialRequest extends FormRequest
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
            'ie'   =>  'required',
            'cnpj' =>  'required|digits:18',
            'cep' => 'required|digits:8',
            'logradouro' => 'required|string|max:100',
            'numero' => 'integer|nullable',
            'complemento' => 'nullable|string|max:100',
            'bairro' => 'required|string|max:100',
            'cidade' => 'required|string|max:100',
            'uf' => 'required|string|max:2|min:2',
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
            'ie.required' => 'Inscricao Estadual não informada',
            'cnpj.required' => 'CNPJ não informada',
            'cep.required' => 'CEP não informado',
            'logradouro.required' => 'Logradouro não informado',
            'bairro.required' => 'Bairro não informado',
            'cidade.required' => 'Cidade não informado',
            'uf.required' => 'UF não informado'
        ];
    }
}
