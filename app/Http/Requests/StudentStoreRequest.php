<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StudentStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->user()->can('create users');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'first_name'        => 'required|string',
            'last_name'         => 'required|string',
            'email'             => 'nullable|string|email|max:255|unique:users',
            'gender'            => 'required|string',
            'nationality'       => 'required|string',
            // 'phone'             => 'required|string',
            'address'           => 'required|string',
            'address2'          => 'nullable|string',
            'city'              => 'required|string',
            'zip'               => 'nullable|string',
            'photo'             => 'nullable|string',
            'birthday'          => 'required|date',
            // 'religion'          => 'required|string',
            // 'blood_type'        => 'required|string',
            // 'password'          => 'required|string|min:8',

            // Parents' information
            'main_parent_name'       => 'required|string',
            'main_parent_phone'      => 'required|string',
            'substitute_name'       => 'required|string',
            'substitute_phone'      => 'required|string',
            'main_parent_address'    => 'required|string',
            'substitute_address'    => 'nullable|string',

            // Academic information
            'class_id'          => 'nullable|string',
            'section_id'        => 'nullable|string',
            //'board_reg_no'      => 'nullable|string',
            'session_id'        => 'nullable|string',
            'id_card_number'    => 'required|string|regex:/^\d{2,3}\.\d{3}\.\d{3}-[\dK]$/', // refers to R.U.T
        ];
    }
}
