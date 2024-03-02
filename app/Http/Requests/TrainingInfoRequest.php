<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TrainingInfoRequest extends FormRequest
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
            'training_name.*' => 'max:100',
            'training_note.*' => 'required_with:training_name|max:255',
            'training_center.*' => 'required_with:training_note|max:255',
            'tr_start_date.*' => 'required_with:training_center|date',
            'tr_end_date.*' => 'required_with:tr_start_date|date',
        ];
    }
}
