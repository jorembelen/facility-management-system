<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClientAppointmentRequest extends FormRequest
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
            'user_id' => 'required',
            'work_category_id' => 'required',
            'date' => 'required|date',
            'schedule_time' => 'required',
            'job_description' => 'required',
            'documents' => 'mimes:zip,doc,docx,xlsx,xls,pdf|max:2048M',
            'images.*' => 'image|mimes:jpeg,bmp,png,gif,svg,jpg|max:5048',
        ];
    }

    public function messages()
    {
        return [
            'user_id.required' => 'The tenant field is required.',
            'work_category_id.required' => 'The job category is required.',
        ];
    }

}
