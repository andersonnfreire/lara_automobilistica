<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            'nome' => 'required|string|max:255',
            'cpf' => 'required|string|digits:11|unique:users',
            'password' => 'required',
            'sexo'     => 'required|string|max:1',
            'situacao' => 'required|boolean',
            'data_nascimento' => 'required|date',
            'filial' => 'required|integer',
            'cargo_desempenhado' => 'required|string|max:255',
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
            'cpf.required' => 'CPF não informado',
            'password.required' => 'Senha não informada',
            'sexo.required'     => 'Sexo não informado',
            'situacao.required' => 'Situacao não informado',
            'data_nascimento.required' => 'Data de Nascimento não informado',
            'filial.required' => 'Filial não informado',
            'cargo_desempenhado.required' => 'Cargo Desempenhado não informado',
            'cep.required' => 'CEP não informado',
            'logradouro.required' => 'Logradouro não informado',
            'bairro.required' => 'Bairro não informado',
            'cidade.required' => 'Cidade não informado',
            'uf.required' => 'UF não informado'
        ];
    }

}
