<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterSecretaryRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'inep_code' => 'required|numeric',
            'acronym' => 'nullable',
            'cnpj' => 'nullable',
            'state' => 'nullable',
            'secretary_id' => 'required|integer|exists:users,id',
            'name' => 'required',
            'email' => 'required|email|unique:secretaries,email',
            'phone' => 'required',
            'street' => 'required',
            'number' => 'required',
            'district' => 'required',
            'neighborhood' => 'required',
            'zip_code' => 'required',
            'city' => 'required',
        ];
    }
}
