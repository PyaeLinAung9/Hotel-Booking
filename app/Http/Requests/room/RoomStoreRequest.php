<?php

namespace App\Http\Requests\room;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class RoomStoreRequest extends FormRequest
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
                Rule::unique('rooms','name')->where('deleted_at',null),
            ],
            'occupation' => [
                'required',
                'integer'
            ],
            'bed' => [
                'required',
            ],
            'size' => [
                'required',
                'integer'
            ],
            'view' => [
                'required',
            ],
            'price_per_day' => [
                'required',
                'integer',
            ],
            'extra_bed_price' => [
                'required',
                'integer'
            ],
            'description' => [
                'required',
            ],
            'detail' => [
                'required',
            ],
            'amenity' => [
                'required',
                'array'
            ],
            'feature' => [
                'required',
                'array'
            ],
            'image-name' => [
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
