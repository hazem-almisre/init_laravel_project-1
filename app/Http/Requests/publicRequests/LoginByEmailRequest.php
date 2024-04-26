<?php
namespace App\Http\Requests\publicRequests;


use Illuminate\Foundation\Http\FormRequest;

class LoginByEmailRequest extends FormRequest
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



    public function messages()
    {
        return 
        [
            'email.required'     => 'The email field is required.',
            // 'email.email'        => 'Please enter a valid email address.',
            // 'password.required'  => 'The password field is required.',
            // 'password.string'    => 'The password field must be a string.',

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
            'email'         => 'required|email',
            'password'       =>'required|min:8',        
        ];
    }
}
