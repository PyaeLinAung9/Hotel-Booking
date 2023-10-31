<?php

namespace App\Http\Requests\gallery;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class GalleryStoreRequest extends FormRequest
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
            'room_id' => [
                'required',
                'integer',
            ],
            'image-name' => [
                'sometimes',
                'required',
                'mimes:jpg,jpeg,png',
                'image'
            ],
        ];
    }
    // public function messages()
    // {
    //     return [
    //         'room-name.unique' => "The name your enter with the same type is already exit",
    //     ];
    // }


}
