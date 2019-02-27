<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmitirPedidoRequest extends FormRequest
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
            'dadosFaturamento.cep' => 'required',
            'dadosFaturamento.bairro' => 'required',
            'dadosFaturamento.cidade' => 'required',
            'dadosFaturamento.complemento' => 'required',
            'dadosFaturamento.endereco' => 'required',
            'dadosFaturamento.estado' => 'required',
            'dadosFaturamento.numero' => 'required',

            'dadosPessoais.cep' => 'required',
            'dadosPessoais.bairro' => 'required',
            'dadosPessoais.cidade' => 'required',
            'dadosPessoais.complemento' => 'required',
            'dadosPessoais.endereco' => 'required',
            'dadosPessoais.estado' => 'required',
            'dadosPessoais.numero' => 'required',
            'dadosPessoais.cpfcnpj' => 'required',
            'dadosPessoais.nome' => 'required',
            'dadosPessoais.sobrenome' => 'required',
            'dadosPessoais.email' => 'required',
        ];
    }
}
