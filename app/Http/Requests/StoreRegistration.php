<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreRegistration extends FormRequest
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
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'firstname.required' => 'We require your first name.',
            'lastname.required' => 'We require your last name.',
            'email.required' => 'We require your email address.',
            'email.unique' => 'That email address has already been used.',
            'email.email' => 'Your email address is not valid.',
            'accept.accepted' => 'You must accept our Terms & Conditions.',
        ];
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'required|unique:registrations|email',
            'accept' => 'accepted',
        ];
    }
}
