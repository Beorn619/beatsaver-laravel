<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request
     */
    public function rules()
    {
        return [
            'email' => 'required|email',
            'password' => 'required'
        ];
    }

    /**
     * Get the error messages for the defined validation rules
     */
    public function messages()
    {
        return [
            'email.required' => 'Please enter your email',
            'email.email' => 'Please provide a valid email',
            'password.required' => 'Please enter your password',
        ];
    }
}
