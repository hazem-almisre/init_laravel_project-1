<?php

namespace App\Http\Requests\UserRequests;

use Illuminate\Foundation\Http\FormRequest;

class CompanyFollowRequest extends FormRequest
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
            'companyId' => ['required','integer','exists:companies,companyId'],
        ];
    }

    public function messages()
    {
        return [
            "companyId.required" => " معرف الشركة مطلوب",
            "companyId.integer" => "معرف الشركة يجب ان يكون رقم",
            "companyId.exists" => "الرحلة غير موجودة الرجاء تحمبل الصفحة مجددا واعادة المحاولة",
        ];
    }
}
