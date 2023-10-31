<?php

namespace App\Http\Requests\bed;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class bedUpdateValidation extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => [
                'required',
                'min:2',
                'max:20',
                Rule::unique('beds','name')->where('deleted_at',null)->ignore($this->id),
            ],
        ];
    }
}
