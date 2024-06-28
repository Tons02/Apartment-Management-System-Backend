<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            "first_name" => "sometimes:required", 
            "last_name" => "sometimes:required",
            "address" => "sometimes:required",
            "contact_details" => [
                "unique:users,contact_details," . $this->route()->user,
                "regex:/^\+63\d{10}$/",
            ],
            "gender" => "sometimes:required",
            
            "username" => [
                "required",
                "unique:users,username," . $this->route()->user,
            ],

            "role_id" => ["required","exists:roles,id"]
        ];
    }
}
