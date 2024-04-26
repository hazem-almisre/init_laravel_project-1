<?php
namespace App\Http\Requests\UserRequests;

use Illuminate\Foundation\Http\FormRequest;
use App\BusinessLogic\Core\Messages\ValidationMessages\ValidationMessage;

class RegisterUserRequest extends FormRequest
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
        
        "phoneNumber.required"      => ValidationMessage::$PhoneRequired,
        "password.required"         => ValidationMessage::$PasswordRequired,
        "firstName.required"        => ValidationMessage::$FirstNameRequired,
        "lastName.required"         => ValidationMessage::$LastNameRequired,
        "gendor.required"           => ValidationMessage::$GenderRequired,
        "personalId.required"       => ValidationMessage::$PersonalIdRequired,
        "birthDay.required"         => ValidationMessage::$birthDayRequired,
        "phoneNumber.numeric"       => ValidationMessage::$phoneNumeric,
        "phoneNumber.digits"        => ValidationMessage::$PhoneDigits,
        "personalId.numeric"        => ValidationMessage::$PersonalIdNumeric,
        "personalId.unique"        => "الرقم المدخل تم مأخوذ الرجاء ادخال رقم جديد",

        "personalId.digits"         => "يجب ألا يتجاوز الرقم الوطني العشر خانات",
        "password.min"               => "يجب ان يتجاوز طول كلمة المرور الثمانية احرف",
        "birthDay.date_format" => "التاريخ يجب ان يكون من الشكل يوم-شهر-سنة",
        "gendor.in" => "الجنس يجب ان يكون ذكر او أنثى",
        "firstName.min" => "يجب ان يتجاوز طول الاسم الثلاثة احرف",
        "firstName.max" => "يجب ان لا يتجاوز طول الاسم 25 حرف",
        "lastName.min" => "يجب ان يتجاوز طول الكنية الثلاثة احرف",
        "lastName.max" => "يجب ان لا يتجاوز طول الكنية 25 حرف",
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
            "firstName" => ['required', 'max:25', 'min:3', 'string'],
            "lastName" => ['required', 'max:25', 'min:3', 'string'],
            "gendor" => ['required', 'string', 'in:ذكر,أنثى'],
            "personalId" => ['required', 'numeric', 'digits:11'],
            "birthDay" => ['required', 'date_format:Y-m-d', 'string'],
            'phoneNumber' => ['required', 'numeric', 'digits:10','unique:users'],
            'password' => [
                'required',
                'string',
                'min:8',
            ],
        ];
    }
}
