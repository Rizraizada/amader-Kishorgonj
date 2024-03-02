<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PrimaryInfoRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
             'name_en' => 'required | max:255',
            'name_bn' => 'required | max:255',
            'father_name' => 'required | max:255',
            'mother_name' => 'required | max:255',
            'mobile_no' => 'required | digits:11 | unique:primary_info',
            'nid' => 'required | digits:13 | unique:primary_info',
            'birth_date' => 'required | date',
            'email' => 'required | max:255 | unique:primary_info',
            'gender' => 'required',
            'blood_group' => 'required',
            'emergency_contact_no' => 'required | digits:11',// | unique:primary_info',
            'photo' => 'required|image|mimes:jpg,jpeg,png|max:2048',
        ];
    }
}
