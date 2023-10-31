<?php

namespace App\Http\Requests\room;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;
use App\Rules\ReservationOverlapRule;

class RoomReserveRequest extends FormRequest
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
            'room-id'   => [
                'required',
                'integer',
                Rule::exists('rooms','id'),
            ],
            'check_in_date' => [
                'required',
                'date',
            ],
            'check_out_date' => [
                'required',
                'date',
                'after:check_in_date',
                new ReservationOverlapRule(
                    request('room-id'),
                    request('check_in_date'),
                    request('check_out_date'),
                ),
            ],
            'cus-name' => [
                'required',
            ],
            'cus-email' => [
                'required',
                'email'
            ],
            'cus-phone' => [
                'integer',
                'required',
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
