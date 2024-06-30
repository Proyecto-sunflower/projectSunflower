<?php

namespace App\Http\Requests;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class SectionStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->user()->can('create sections');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'section_name' => [
                'required',
                Rule::unique('sections')->where(function ($query) {
                    return $query->where('class_id', $this->class_id)
                                 ->where('session_id', $this->session_id);
                }),
            ],
            'class_id' => 'required|integer|gt:0',
            'session_id' => 'required|integer|gt:0',
        ];
    }
}
