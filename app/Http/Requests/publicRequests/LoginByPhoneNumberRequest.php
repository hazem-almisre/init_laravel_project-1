<?php
namespace App\Http\Requests\publicRequests;


use Illuminate\Foundation\Http\FormRequest;

class LoginByPhoneNumberRequest extends FormRequest
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
        return [
            "phoneNumber.required" => "رقم الهاتف مطلوب",
            "password.required" => "رقم السر مطلوب",
            "phoneNumber.numeric" => "يجب ألا يحتوي رقم الهاتف على احرف",
            "phoneNumber.digits" => "يجب ألا يتجاوز رقم الهاتف العشر خانات",
            "password.min" => "يجب ان يتجاوز طول كلمة المرور الثمانية احرف",
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
            'phoneNumber'=>['required','numeric','digits:10'],
            'password' => [
                'required',
                'min:8',
            ],
        ];
    }
}
