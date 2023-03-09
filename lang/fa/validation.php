<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */
    "accepted"         => ":attribute باید پذیرفته شده باشد.",
    "active_url"       => "آدرس :attribute معتبر نیست",
    "after"            => ":attribute باید تاریخی بعد از :date باشد.",
    "alpha"            => ":attribute باید شامل حروف الفبا باشد.",
    "alpha_dash"       => ":attribute باید شامل حروف الفبا و عدد و خظ تیره(-) باشد.",
    "alpha_num"        => ":attribute باید شامل حروف الفبا و عدد باشد.",
    "array"            => ":attribute باید شامل آرایه باشد.",
    "before"           => ":attribute باید تاریخی قبل از :date باشد.",
    "between"          => array(
        "numeric" => ":attribute باید بین :min و :max باشد.",
        "file"    => ":attribute باید بین :min و :max کیلوبایت باشد.",
        "string"  => ":attribute باید بین :min و :max کاراکتر باشد.",
        "array"   => ":attribute باید بین :min و :max آیتم باشد.",
    ),
    "boolean"          => "The :attribute field must be true or false",
    "confirmed"        => ":attribute با تاییدیه مطابقت ندارد.",
    "date"             => ":attribute یک تاریخ معتبر نیست.",
    "date_format"      => ":attribute با الگوی :format مطاقبت ندارد.",
    "different"        => ":attribute و :other باید متفاوت باشند.",
    "digits"           => ":attribute باید :digits رقم باشد.",
    "digits_between"   => ":attribute باید بین :min و :max رقم باشد.",
    "email"            => "فرمت :attribute معتبر نیست.",
    "exists"           => ":attribute انتخاب شده، معتبر نیست.",
    "image"            => ":attribute باید تصویر باشد.",
    "in"               => ":attribute انتخاب شده، معتبر نیست.",
    "integer"          => ":attribute باید نوع داده ای عددی (integer) باشد.",
    "ip"               => ":attribute باید IP آدرس معتبر باشد.",
    "max"              => array(
        "numeric" => ":attribute نباید بزرگتر از :max باشد.",
        "file"    => ":attribute نباید بزرگتر از :max کیلوبایت باشد.",
        "string"  => ":attribute نباید بیشتر از :max کاراکتر باشد.",
        "array"   => ":attribute نباید بیشتر از :max آیتم باشد.",
    ),
    "mimes"            => ":attribute باید یکی از فرمت های :values باشد.",
    "min"              => array(
        "numeric" => ":attribute نباید کوچکتر از :min باشد.",
        "file"    => ":attribute نباید کوچکتر از :min کیلوبایت باشد.",
        "string"  => ":attribute نباید کمتر از :min کاراکتر باشد.",
        "array"   => ":attribute نباید کمتر از :min آیتم باشد.",
    ),
    "not_in"           => ":attribute انتخاب شده، معتبر نیست.",
    "numeric"          => ":attribute باید شامل عدد باشد.",
    "regex"            => ":attribute ترکیبی از حروف و عدد و کاراکتر نیست",
    "required"         => "فیلد :attribute الزامی است لطفا پر کنید",
    "required_if"      => "فیلد :attribute هنگامی که :other برابر با :value است، الزامیست.",
    "required_with"    => ":attribute الزامی است زمانی که :values موجود است.",
    "required_with_all"=> ":attribute الزامی است زمانی که :values موجود است.",
    "required_without" => ":attribute الزامی است زمانی که :values موجود نیست.",
    "required_without_all" => ":attribute الزامی است زمانی که :values موجود نیست.",
    "same"             => ":attribute و :other باید مانند هم باشند.",
    "size"             => array(
        "numeric" => ":attribute باید برابر با :size باشد.",
        "file"    => ":attribute باید برابر با :size کیلوبایت باشد.",
        "string"  => ":attribute باید برابر با :size کاراکتر باشد.",
        "array"   => ":attribute باسد شامل :size آیتم باشد.",
    ),
    "timezone"         => "The :attribute must be a valid zone.",
    "unique"           => ":attribute قبلا انتخاب شده است.",
    "url"              => "فرمت آدرس :attribute اشتباه است.",
    "exists_code"      => "کد ارسالی در سیستم وجود ندارد",
    "expire_code"      => "اعتبار کد ارسالی به پایان رسیده است",
    "used"             => "این کد قبلا مورد استفاده قرار گرفته است",
    "exists_phone"     => "چنین شماره ای در سیستم ثبت نشده است",
    "recaptcha"        => "کپچا اعتبار لازم را ندارد",

    /*

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */

    'custom' => [
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap our attribute placeholder
    | with something more reader friendly such as "E-Mail Address" instead
    | of "email". This simply helps us make our message more expressive.
    |
    */

    'attributes' => array(
        'Fname'=>'نام',
        'Lname'=>'نام خانوادگی',
        'avatar'=>'تصویر کاربر',
        'ad_title'=>'عنوان اگهی',
        'Type_cooperation'=>'نوع همکاری',
        'minimum_salary'=>'حقوق',
        'ad_content'=>'توضیحات',
        'title_blog'=>'عنوان مقاله',
        'thumbnail_blog'=>'تصویر شاخص مقاله',
        'content_blog'=>'توضیحات مقاله',
        'meta_description'=>'متا توضیحات',
        'category_id'=>'دسته بندی',
        'keyword_description'=>'کلمات کلیدی',
        'slug'=>'مسیردستیابی',
        'title_category'=>'عنوان دسته بندی',
        'codemeli'=>'کدملی',
        'phone_number'=>'شماره همراه',
        'degree_education'=>'مدرک تحصیلی',
        'university'=>'دانشگاه',
        'Fname_Lname'=>'نام و نام خانوادگی',
        'subject'=>'موضوع',
        'description'=>'توضیحات',
        'degree_level'=>'مدرک تحصیلی',
        'major'=>'رشته',
        'start_date'=>'تاریخ شروع',
        'company_english'=>'عنوان انگلیسی شرکت',
        'company_persian'=>'عنوان فارسی شرکت',
        'company_logo'=>'لوگو شرکت',
        'address_company'=>'آدرس شرکت',
        'Activity_company'=>'فعالیت شرکت',
        'bio_company'=>'بیوگرافی شرکت',
        'website_company'=>'وبسایت شرکت',
        'Fname_Lname_manager'=>'نام و نام خانوادگی مدیرعامل',
        'email'=>'ایمیل',
        'phone'=>'شماره همراه',
        'password'=>'رمزعبور',
        'title_event'=>'عنوان رویداد',
        'thumbnail_events'=>'تصویر شاخص رویداد',
        'teacher_image_events'=>'تصویر مدرس رویداد',
        'teacher_events'=>'مدرس رویداد',
        'time_events'=>'زمان رویداد',
        'date_events'=>'تاریخ رویداد',
        'view_register'=>'تعداد ثبت نامی ها',
        'price_event'=>'قیمت رویداد',
        'description_events'=>'توضیحات رویداد',
        'title_faqs'=>'عنوان سوالات',
        'content_faqs'=>'پاسخ سوالات',
        'Priority_faqs'=>'اولویت',
        'date'=>'تاریخ',
        'time_start'=>'زمان شروع',
        'time_end'=>'زمان پایان',
        'title_s'=>'عنوان سایت',
        'seo_s'=>'سئو سایت',
        'favicon_setting'=>'فایوایکن',
        'logo_setting'=>'لوگو',
        'aboutUs_setting'=>'درباره ی ما',
        'copyright_website'=>'قوانین کپی رایت',
        'keyword_seo'=>'کلمات کلیدی',
        'date_birthday'=>'تاریخ تولد',
        'Expected_Salary'=>'میزان حقوق دریافتی',
        'title_job'=>'عنوان شغل',
        'company_name'=>'نام شرکت',
        'company_city'=>'شهر شرکت',
        'start_work'=>'تاریخ شروع',
        'subcategory'=>'زیر دسته بندی',
        'price'=>'مبلغ',
    ),

];
