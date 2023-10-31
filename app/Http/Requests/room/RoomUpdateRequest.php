<?php

namespace App\Http\Requests\room;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class RoomUpdateRequest extends FormRequest
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
                Rule::unique('rooms','name')->where('deleted_at',null)->ignore($this->id),
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
                'sometimes',
                'required',
                'mimes:jpg,jpeg,png',
                'image'
            ],
        ];
    }
}
