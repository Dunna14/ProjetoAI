<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FilmePost extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            "titulo" => "required",
            "genero_code" => "required|exists:generos,code",
            "sumario" => "required",
            "ano" => "required",
            "trailer_url" => "required|url"
        ];
    }
}
