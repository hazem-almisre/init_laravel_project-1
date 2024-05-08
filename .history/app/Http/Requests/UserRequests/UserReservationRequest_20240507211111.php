<?php

namespace App\Http\Requests\UserRequests;

use Illuminate\Foundation\Http\FormRequest;

class UserReservationRequest extends FormRequest
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
            'travelId' => 'required|integer|exists:travels,travelId',
             "matrix.*.seteId"  => ["integer","bu"]
        ];
    }

    public function messages()
    {
        return [
            "travelId.required" => " معرف الرحلة مطلوب",
            "travelId.integer" => "معرف الرحلة يجب ان يكون رقم",
            "travelId.exists" => "الرحلة غير موجودة الرجاء تحمبل الصفحة مجددا واعادة المحاولة",
        ];
    }
}
