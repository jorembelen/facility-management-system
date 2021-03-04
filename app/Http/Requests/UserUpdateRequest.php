<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UserUpdateRequest extends FormRequest
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
            'name' => [
                'required',
                Rule::unique('users','name')->ignore($this->user)
            ],
            'email' => [
                'required', 'email',
                Rule::unique('users','email')->ignore($this->user)
            ],
            'password' => 'sometimes|nullable|confirmed|min:6|max:50',
        ];
    }
}
