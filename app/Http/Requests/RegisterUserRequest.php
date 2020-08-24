<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterUserRequest extends FormRequest
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
            'name_register' => ['required', 'string', 'max:255'],
            'email_register' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password_register' => ['required', 'string', 'min:8', 'confirmed'],
        ];
    }
}
