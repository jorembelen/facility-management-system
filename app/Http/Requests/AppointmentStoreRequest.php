<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AppointmentStoreRequest extends FormRequest
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
            'job_order_id' => 'required|max:50',
            'employee_id' => 'required|max:50',
            'date' => 'required',
            'time' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'employee_id.required' => 'The technicians name field is required.',
        ];
    }

}
