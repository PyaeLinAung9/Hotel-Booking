<?php

namespace App\Http\Requests\amenity;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class amenityStoreRequest extends FormRequest
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
                Rule::unique('amenities','name')->where('deleted_at',null)->where('type',$this->type),
            ],
            'type' => [
                'required',
            ],
        ];
    }
    public function messages()
    {
        return [
            'name.unique' => "The name your enter with the same type is already exit",
            'type.required' => "Please choose your amenity type .",
        ];
    }


}
