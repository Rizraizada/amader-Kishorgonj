<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DiplomaInfoRequest extends FormRequest
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
            'degree_name.*' => 'max:100',
            'diploma_institute' => 'required_with:degree_name|max:100',
            'dip_start_date.*' => 'required_with:diploma_institute|date',
            'dip_end_date.*' => 'required_with:dip_start_date|date',
        ];
    }
}
