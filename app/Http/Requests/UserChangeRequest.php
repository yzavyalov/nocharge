<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserChangeRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            '*.email' => 'required|email',
            '*.ip' => 'ip|nullable',
            '*.browser' => 'string|nullable',
            '*.agent' => 'string|nullable',
            '*.platform' => 'string|nullable',
        ];
    }
}
