<?php

declare(strict_types=1);

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DepartmentRegisterRequest extends FormRequest
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
            'inep_code' => 'required|numeric|unique:departments,inep_code',
            'acronym' => 'nullable',
            'cnpj' => 'nullable|unique:departments,cnpj',
            'state' => 'nullable',
            'secretary_id' => 'required|integer|exists:users,id',
            'name' => 'required|unique:departments,name',
            'email' => 'required|email|unique:departments,email',
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
