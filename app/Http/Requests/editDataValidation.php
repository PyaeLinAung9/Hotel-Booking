<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class editDataValidation extends FormRequest
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
        // dd($this->id);
        return [
            'name' => ['required',
                    'min:3',
                    'max:20',
                    Rule::unique('views','name')->where('deleted_at',null)->ignore($this->id),
                    // Rule::unique('views')->where(function($query) {return $query ->where('deleted_at',null); })->ignore($this->id)
                    ],
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'You need to fill name!',
            'name.min'      => 'Name must be at least 4 character!',
            'name.max'      => 'Name cannot be more than 8 character!',
        ];
    }
}
