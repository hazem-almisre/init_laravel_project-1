<?php
namespace App\Http\Requests\AdminRequests;


use Illuminate\Foundation\Http\FormRequest;

class RegisterAdminRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'phoneNumber'=>['required','numeric','digits:10','unique:admins'],
            'password' => [
                'required',
                'min:8',
            ],
            "name" => ['required','max:25','min:3']
        ];
    }

    public function messages()
    {
        return [

            
            // "phoneNumber.required" => VlidationMessage:: "رقم الهاتف مطلوب",
            "password.required" => "رقم السر مطلوب",
            "name.required" => "الاسم مطلوب",
            "phoneNumber.numeric" => "يجب ألا يحتوي رقم الهاتف على احرف",
            "phoneNumber.digits" => "يجب ألا يتجاوز رقم الهاتف العشر خانات",
            "password.min" => "يجب ان يتجاوز طول كلمة المرور الثمانية احرف",
            "name.min" => "يجب ان يتجاوز طول الاسم الثلاثة احرف",
            "name.max" => "يجب ان لا يتجاوز طول الاسم 25 حرف",
        ];
    }
}
