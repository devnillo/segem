<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SchoolRegisterRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules()
    {

    }

    public function messages(): array
    {
        return [
            'inep_code.unique' => 'Este código INEP já está cadastrado.',
            '*.in' => 'O campo :attribute aceita apenas 0 (Não) ou 1 (Sim).',
            '*.integer' => 'O campo :attribute deve ser um número inteiro.',
            '*.max' => 'O valor máximo permitido para :attribute é 9999.',
        ];
    }
}
