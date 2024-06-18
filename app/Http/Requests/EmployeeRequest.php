<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmployeeRequest extends FormRequest
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
            'name'=>'required',
            'email'=>'required|unique:users',
            'phone'=>'required|unique:users',
            'password'=>'required|max:15|min:8',
            'status'=>'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Employee name is required.',
            'email.required' => 'Employee email is required.',
            'email.unique' => 'Employee email is should unique.',
            'phone.required' => 'Employee phone number is required.',
            'phone.unique' => 'Employee phone number is should unique.',
            'password.required' => 'Employee password is required.',
            'status.required' => 'Employee status is required.',
        ];
    }
}
