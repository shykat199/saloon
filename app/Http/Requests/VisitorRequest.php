<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VisitorRequest extends FormRequest
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
            'location'=>'required',
            'source'=>'required',
            'status'=>'required',
            'paidAmt'=>'required',
            'dueAmt'=>'required',
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Lead name is required.',
            'location.required' => 'Lead location is required.',
            'phone.required' => 'Lead phone number is required.',
            'status.required' => 'Lead status is required.',
            'paidAmt.required' => 'Paid Amount is required.',
            'dueAmt.required' => 'Due amount is required.',
        ];
    }
}
