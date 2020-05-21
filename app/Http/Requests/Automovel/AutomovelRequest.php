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
            'nome' => 'required|string|max:255',
            'cor' => 'required|string|digits:11|unique:users',
            'categoria' => 'required|in:entrada,hatch pequeno,hatch médio,sedã médio,sedã grande,SUV,pick-ups',
            'numero_chassi'     => 'required|string|max:1',
            'filial' => 'required|integer',
            'cargo_desempenhado' => 'required|string|max:255',
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
            'cargo_desempenhado.required' => 'Cargo Desempenhado não informado',
            'numero_chassi.required' => 'Numero de chassi não informado',
            'categoria.required' => 'Categoria não informado',
        ];
    }
}
