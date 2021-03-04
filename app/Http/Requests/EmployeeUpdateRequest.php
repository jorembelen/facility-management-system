<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class EmployeeUpdateRequest extends FormRequest
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
            'badge' => [
                'required','numeric',
                Rule::unique('employees','badge')->ignore($this->employee)
            ],
            'name' => [
                'required',
                Rule::unique('employees','name')->ignore($this->employee)
            ],
            'mobile' => 'numeric',
            'designation' => 'required|max:255',
        ];
    }
}
