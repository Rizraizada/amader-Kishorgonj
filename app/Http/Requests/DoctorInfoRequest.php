<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DoctorInfoRequest extends FormRequest
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
            'clinic_name' => 'required_with:designation | max:100',
            'bmdc_number' => 'required_with:clinic_name | max:100',
            'experiences' => 'required_with:bmdc_number | max:255',
        ];
    }
}
