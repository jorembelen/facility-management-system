<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmployeeStoreRequest extends FormRequest
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
            'badge' => 'required|numeric|unique:employees',
            'mobile' => 'numeric',
            'name' => 'required|unique:employees|max:255',
            'designation' => 'required|max:255',
        ];
    }
}
