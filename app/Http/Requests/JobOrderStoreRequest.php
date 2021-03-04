<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class JobOrderStoreRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'user_id' => 'required|max:50',
            'building_id' => 'required|max:50',
            'job_type' => 'required|max:50',
            'job_category' => 'required|max:50',
            'notes' => 'required',
        ];
    }
}