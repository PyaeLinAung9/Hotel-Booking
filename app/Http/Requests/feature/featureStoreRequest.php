<?php

namespace App\Http\Requests\feature;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class featureStoreRequest extends FormRequest
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
                Rule::unique('special_features','name')->where('deleted_at',null),
            ],
        ];
    }
}
