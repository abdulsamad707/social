<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class signup extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            "email"=>"required|email|unique:users,email",
            "mobile"=>"required|digits:11",
            "password"=>"required|confirmed",
            "dateofbirth"=>"required",
            "name"=>"required|string",
            "referalcode"=>"nullable|alpha_dash|exists:referals,referalCode"
        ];
    }
    public function attributes(){
        return [
          
            "name"=>"User Name",
            "dateofbirth"=>"Date Of Birth"
        ];
    }
}
