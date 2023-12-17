<?php

namespace App\Http\Requests\Front;

use Illuminate\Foundation\Http\FormRequest;

class storeCheckOutRequest extends FormRequest
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
        if(!auth()->guard('cus')->check()){
            return [
                'name'=>'required|min:3|max:45',
                'phone'=>'required',
                'city'=>'required',
                'email'=>'required|email',
                'countries_id'=>'required',
                'address'=>'required',
                'payments_id'=>'required',
                //show me something copilot

            ];
        }
        return [
            'payments_id'=>'required',
        ];

    }
    public function messages(): array
    {
        return [
            'name.required'=>'Name is required',
            'name.min'=>'Name must be at least 3 characters',
            'name.max'=>'Name must be at most 45 characters',
            'phone.required'=>'Phone is required',
            'city.required'=>'City is required',
            'email.required'=>'Email is required',
            'email.email'=>'Email is not valid',
            'countries_id.required'=>'Country is required',
            'address.required'=>'Address is required',
            'payments_id.required'=>'Payment method is required',
        ];
    }
}
