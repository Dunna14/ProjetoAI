<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReciboPost extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'data' => 'required|date',
            'nif' => 'required',
            'nome_cliente' => 'required',
            'tipo_pagamento' => 'required'
        ];
    }
}
