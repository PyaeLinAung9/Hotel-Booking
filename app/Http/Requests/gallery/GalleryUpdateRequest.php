<?php

namespace App\Http\Requests\gallery;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class GalleryUpdateRequest extends FormRequest
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
            'room-name' => [
                'required',
                'min:2',
                'max:20',
                Rule::unique('rooms','name')->where('deleted_at',null)->ignore($this->id),
            ],
        ];
    }
}
