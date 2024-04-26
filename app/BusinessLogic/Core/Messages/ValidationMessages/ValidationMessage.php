<?php
namespace App\BusinessLogic\Core\Messages\ValidationMessages;

class ValidationMessage
{
    static $UniqueEmail = 'البريد الإلكتروني موجود مسبقاً';
    static $Email       = 'يرجى إدخال عنوان بريد إلكتروني صالح';

    // password validation
    static $RequiredPassword    = 'حقل كلمة المرور مطلوب';
    static $IncorrectPassword   = 'كلمة المرور غير صحيحة';
    static $PhoneRequired       = 'رقم الهاتف مطلوب';
    static $PasswordRequired    = 'حقل كلمة المرور مطلوب';
    static $FirstNameRequired   = "رقم السر مطلوب";
    static $LastNameRequired    = "الكنية مطلوب";
    static $GenderRequired      = "الجنس مطلوب";
    static $PersonalIdRequired  = "الرقم الوطني مطلوب";
    static $birthDayRequired    = "تاريخ الميلاد مطلوب";
    static $phoneNumeric        = "يجب ألا يحتوي رقم الهاتف على احرف";
    static $PhoneDigits         = "يجب ألا يتجاوز رقم الهاتف العشر خانات";
    static $PersonalIdNumeric   = "يجب ألا يحتوي الرقم الوطني على احرف";




}



// "phoneNumber.required" => "رقم الهاتف مطلوب",
// "password.required" => "رقم السر مطلوب",
// "phoneNumber.numeric" => "يجب ألا يحتوي رقم الهاتف على احرف",
// "phoneNumber.digits" => "يجب ألا يتجاوز رقم الهاتف العشر خانات",
// "password.min" => "يجب ان يتجاوز طول كلمة المرور الثمانية احرف",
// "phoneNumber.required" => "رقم الهاتف مطلوب",
// "password.required" => "رقم السر مطلوب",
// "name.required" => "الاسم مطلوب",
// "phoneNumber.numeric" => "يجب ألا يحتوي رقم الهاتف على احرف",
// "phoneNumber.digits" => "يجب ألا يتجاوز رقم الهاتف العشر خانات",
// "password.min" => "يجب ان يتجاوز طول كلمة المرور الثمانية احرف",
// "name.min" => "يجب ان يتجاوز طول الاسم الثلاثة احرف",
// "name.max" => "يجب ان لا يتجاوز طول الاسم 25 حرف",

// "phoneNumber.required" => "رقم الهاتف مطلوب",
// "password.required" => "رقم السر مطلوب",
// "name.required" => "الاسم مطلوب",
// "subscribeId.required" => "معرف الاشتراك مطلوب",
// "phoneNumber.numeric" => "يجب ألا يحتوي رقم الهاتف على احرف",
// "phoneNumber.digits" => "يجب ألا يتجاوز رقم الهاتف العشر خانات",
// "password.min" => "يجب ان يتجاوز طول كلمة المرور الثمانية احرف",
// "name.min" => "يجب ان يتجاوز طول الاسم الثلاثة احرف",
// "name.max" => "يجب ان لا يتجاوز طول الاسم 25 حرف",
// "subscribeId.exists" => "معرف الاشتراك غير موجود",

// "phoneNumber.required" => "رقم الهاتف مطلوب",
// "password.required" => "رقم السر مطلوب",
// "firstName.required" => "الاسم مطلوب",
// "lastName.required" => "الكنية مطلوب",
// "gendor.required" => "الجنس مطلوب",
// "companeId.required" => "معرف الشركة مطلوب",
// "birthDay.required" => "تاريخ الميلاد مطلوب",
// "phoneNumber.numeric" => "يجب ألا يحتوي رقم الهاتف على احرف",
// "phoneNumber.digits" => "يجب ألا يتجاوز رقم الهاتف العشر خانات",
// "companeId.integer" => "يجب أن يكون معرف الشركة رقم",
// "companeId.exists" => "معرف الشركة غير موجود",
// "password.min" => "يجب ان يتجاوز طول كلمة المرور الثمانية احرف",
// "birthDay.date_format" => "التاريخ يجب ان يكون من الشكل يوم-شهر-سنة",
// "gendor.in" => "الجنس يجب ان يكون ذكر او أنثى",
// "firstName.min" => "يجب ان يتجاوز طول الاسم الثلاثة احرف",
// "firstName.max" => "يجب ان لا يتجاوز طول الاسم 25 حرف",
// "lastName.min" => "يجب ان يتجاوز طول الكنية الثلاثة احرف",
// "lastName.max" => "يجب ان لا يتجاوز طول الكنية 25 حرف",

// "phoneNumber.required" => "رقم الهاتف مطلوب",
// "password.required" => "رقم السر مطلوب",
// "firstName.required" => "الاسم مطلوب",
// "lastName.required" => "الكنية مطلوب",
// "gendor.required" => "الجنس مطلوب",
// "personalId.required" => "الرقم الوطني مطلوب",
// "birthDay.required" => "تاريخ الميلاد مطلوب",
// "phoneNumber.numeric" => "يجب ألا يحتوي رقم الهاتف على احرف",
// "phoneNumber.digits" => "يجب ألا يتجاوز رقم الهاتف العشر خانات",
// "personalId.numeric" => "يجب ألا يحتوي الرقم الوطني على احرف",
// "personalId.digits" => "يجب ألا يتجاوز الرقم الوطني العشر خانات",
// "password.min" => "يجب ان يتجاوز طول كلمة المرور الثمانية احرف",
// "birthDay.date_format" => "التاريخ يجب ان يكون من الشكل يوم-شهر-سنة",
// "gendor.in" => "الجنس يجب ان يكون ذكر او أنثى",
// "firstName.min" => "يجب ان يتجاوز طول الاسم الثلاثة احرف",
// "firstName.max" => "يجب ان لا يتجاوز طول الاسم 25 حرف",
// "lastName.min" => "يجب ان يتجاوز طول الكنية الثلاثة احرف",
// "lastName.max" => "يجب ان لا يتجاوز طول الكنية 25 حرف",