<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SunctionCheckRequest extends FormRequest
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
            'organisation' =>'required|numeric|max:2|min:0',
            'base' => 'required|numeric|max:2|min:0',
            'name' => 'required|string|max:200',
            'birthDate' => 'nullable|date_format:Y',
            'country' => 'nullable|string',
            'taxnumber' => 'nullable|string|max:200',
        ];
    }
}
