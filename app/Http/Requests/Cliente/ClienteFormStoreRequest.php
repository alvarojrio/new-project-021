<?php

namespace App\Http\Requests\Cliente;

use Illuminate\Foundation\Http\FormRequest;

class ClienteFormStoreRequest extends FormRequest
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
                  'nome' => 'required',
                  'email' => 'required',
                  'telefone1' => 'required',
                  'telefone2' => 'required',
                  'nascimento' => 'required',
                  'sexo' => 'required',
                  'cep' => 'required',
                  'endereco' => 'required',
                  'numero' => 'required',
                  'complemento' => 'required',
                  'bairro' => 'required',
                  'senha' => 'required',
        ];
    }

    public function messages(){

        return [
           'nome.required' => 'O Campo Nome é obrigatório.',
           'telefone1.required' => 'O Campo telefone1 é obrigatório.',
           'telefone2.required' => 'O Campo telefone2 é obrigatório.',
           'nascimento.required' => 'O Campo nascimento é obrigatório.',
           'sexo.required' => 'O Campo sexo é obrigatório.',
           'cep.required' => 'O Campo  cep é obrigatório.',
           'endereco.required' => 'O Campo endereco é obrigatório.',
           'complemento.required' => 'O Campo complemento é obrigatório.',
           'numero.required' => 'O Campo E-numero é obrigatório.',
           'bairro.required' => 'O Campo E-bairro é obrigatório.',
           'senha.required' => 'O Campo E-senha é obrigatório.',


        ];
    }
}
