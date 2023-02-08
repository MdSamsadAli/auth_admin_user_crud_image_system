<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            "first_name"=>"required",
            "last_name"=>"required",
            "email"=>"required|email|unique:users",
            "password"=>"required|min:8|confirmed",
        ];
    }
    public function messages(){
        return [
            'first_name.required'=>'First Name cannot be empty',
            'last_name.required'=>'Last Name cannot be empty',
            'email.required'=>'email cannot be empty',
            'email.email'=>'Not a valid Email',
            'email.unique'=>'User Already Exits',
            'password.required'=>'Password cannot be empty',
        ];
    }
}
