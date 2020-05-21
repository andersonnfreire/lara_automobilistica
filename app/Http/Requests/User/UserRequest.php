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
            'cpf' => 'required|string|max:11|unique:users',
            'password' => 'required|min:6|max:6|confirmed',
            'sexo'     => 'required|string|max:1',
            'situacao' => 'required|boolean',
            'data_nascimento' => 'required',
            'filial' => 'required|integer',
            'cargo_desempenhado' => 'required|string',
            'cep' => 'required',
            'logradouro' => 'required',
            'numero' => 'integer|nullable',
            'complemento' => 'nullable|string',
            'bairro' => 'required',
            'cidade' => 'required',
            'uf' => 'required',
            'pais' => 'required'
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
            'nome.required' => 'Nome é requerido',
            'cpf.required' => 'CPF é requerid',
            'password.required' => 'Senha não informada',
            'sexo.required'     => 'Sexo não informado',
            'situacao.required' => 'Situacao não informado',
            'data_nascimento.required' => 'Data de Nascimento não informado',
            'filial.required' => 'Filial não informado',
            'cargo_desempenhado.required' => 'Filial não informado',
            'cep.required' => 'Filial não informado',
            'logradouro.required' => 'Filial não informado',
            'bairro.required' => 'Filial não informado',
            'cidade.required' => 'Filial não informado',
            'uf.required' => 'Filial não informado',
            'pais.required' => 'Filial não informado'
        ];
    }

}
