<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

class CustomerRegisterApiRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true; //control from middleware
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            // 'name' => 'required|string|min:3|max:255',
            'email' => 'required|email|unique:e_customers,email',
            'password' => 'required|string|min:6',
            'phone'=>'required|string|min:11|max:11',
            'first_name'=>'required|string|min:3|max:255',
            'last_name'=>'required|string|min:3|max:255',

        ];
    }
}
