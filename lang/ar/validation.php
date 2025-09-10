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

    'accepted'             => 'يجب قبول :attribute.',
    'accepted_if'          => 'يجب قبول :attribute عندما يكون :other يساوي :value.',
    'active_url'           => ':attribute ليس عنوان URL صالحًا.',
    'after'                => ':attribute يجب أن يكون تاريخًا بعد :date.',
    'after_or_equal'       => ':attribute يجب أن يكون تاريخًا بعد أو يساوي :date.',
    'alpha'                => ':attribute يجب أن يحتوي على أحرف فقط.',
    'alpha_dash'           => ':attribute يجب أن يحتوي على أحرف وأرقام وشرطات فقط.',
    'alpha_num'            => ':attribute يجب أن يحتوي على أحرف وأرقام فقط.',
    'array'                => ':attribute يجب أن يكون مصفوفة.',
    'ascii'                => 'يجب أن يحتوي :attribute على أحرف أبجدية رقمية أحادية البايت ورموز فقط.',
    'before'               => ':attribute يجب أن يكون تاريخًا قبل :date.',
    'before_or_equal'      => ':attribute يجب أن يكون تاريخًا قبل أو يساوي :date.',
    'between'              => [
        'array'   => ':attribute يجب أن يحتوي بين :min و :max عنصر.',
        'file'    => ':attribute يجب أن يكون بين :min و :max كيلوبايت.',
        'numeric' => ':attribute يجب أن يكون بين :min و :max.',
        'string'  => ':attribute يجب أن يكون بين :min و :max حرف.',
    ],
    'boolean'              => ':attribute يجب أن يكون true أو false.',
    'can'                  => 'حقل :attribute يحتوي على قيمة غير مصرح بها.',
    'confirmed'            => 'تأكيد :attribute غير متطابق.',
    'current_password'     => 'كلمة المرور غير صحيحة.',
    'date'                 => ':attribute ليس تاريخًا صالحًا.',
    'date_equals'          => ':attribute يجب أن يكون تاريخًا يساوي :date.',
    'date_format'          => ':attribute لا يتطابق مع التنسيق :format.',
    'decimal'              => 'يجب أن يحتوي :attribute على :decimal منازل عشرية.',
    'declined'             => 'يجب رفض :attribute.',
    'declined_if'          => 'يجب رفض :attribute عندما يكون :other يساوي :value.',
    'different'            => ':attribute و :other يجب أن يكونا مختلفين.',
    'digits'               => ':attribute يجب أن يكون :digits أرقام.',
    'digits_between'       => ':attribute يجب أن يكون بين :min و :max أرقام.',
    'dimensions'           => ':attribute يحتوي على أبعاد صورة غير صالحة.',
    'distinct'             => ':attribute يحتوي على قيمة مكررة.',
    'doesnt_end_with'      => 'يجب ألا ينتهي :attribute بأحد القيم التالية: :values.',
    'doesnt_start_with'    => 'يجب ألا يبدأ :attribute بأحد القيم التالية: :values.',
    'email'                => ':attribute يجب أن يكون عنوان بريد إلكتروني صالح.',
    'ends_with'            => ':attribute يجب أن ينتهي بأحد القيم التالية: :values.',
    'enum'                 => ':attribute المحدد غير صالح.',
    'exists'               => ':attribute المحدد غير صالح.',
    'file'                 => ':attribute يجب أن يكون ملفًا.',
    'filled'               => ':attribute يجب أن يحتوي على قيمة.',
    'gt'                   => [
        'array'   => ':attribute يجب أن يحتوي على أكثر من :value عنصر.',
        'file'    => ':attribute يجب أن يكون أكبر من :value كيلوبايت.',
        'numeric' => ':attribute يجب أن يكون أكبر من :value.',
        'string'  => ':attribute يجب أن يكون أكبر من :value حرف.',
    ],
    'gte'                  => [
        'array'   => ':attribute يجب أن يحتوي على :value عنصر أو أكثر.',
        'file'    => ':attribute يجب أن يكون أكبر من أو يساوي :value كيلوبايت.',
        'numeric' => ':attribute يجب أن يكون أكبر من أو يساوي :value.',
        'string'  => ':attribute يجب أن يكون أكبر من أو يساوي :value حرف.',
    ],
    'image'                => ':attribute يجب أن يكون صورة.',
    'in'                   => ':attribute المحدد غير صالح.',
    'in_array'             => ':attribute يجب أن يكون موجودًا في :other.',
    'integer'              => ':attribute يجب أن يكون رقمًا صحيحًا.',
    'ip'                   => ':attribute يجب أن يكون عنوان IP صالح.',
    'ipv4'                 => ':attribute يجب أن يكون عنوان IPv4 صالح.',
    'ipv6'                 => ':attribute يجب أن يكون عنوان IPv6 صالح.',
    'json'                 => ':attribute يجب أن يكون نصًا من نوع JSON صالح.',
    'lowercase'            => 'يجب أن يكون :attribute أحرف صغيرة.',
    'lt'                   => [
        'array'   => ':attribute يجب أن يحتوي على أقل من :value عنصر.',
        'file'    => ':attribute يجب أن يكون أقل من :value كيلوبايت.',
        'numeric' => ':attribute يجب أن يكون أقل من :value.',
        'string'  => ':attribute يجب أن يكون أقل من :value حرف.',
    ],
    'lte'                  => [
        'array'   => ':attribute يجب أن يحتوي على :value عناصر أو أقل.',
        'file'    => ':attribute يجب أن يكون أقل من أو يساوي :value كيلوبايت.',
        'numeric' => ':attribute يجب أن يكون أقل من أو يساوي :value.',
        'string'  => ':attribute يجب أن يكون أقل من أو يساوي :value حرف.',
    ],
    'mac_address'          => ':attribute يجب أن يكون عنوان MAC صالح.',
    'max'                  => [
        'array'   => ':attribute يجب ألا يحتوي على أكثر من :max عنصر.',
        'file'    => ':attribute يجب ألا يكون أكبر من :max كيلوبايت.',
        'numeric' => ':attribute يجب ألا يكون أكبر من :max.',
        'string'  => ':attribute يجب ألا يكون أكبر من :max حرف.',
    ],
    'max_digits'           => 'يجب ألا يحتوي :attribute على أكثر من :max أرقام.',
    'mimes'                => ':attribute يجب أن يكون ملفًا من نوع: :values.',
    'mimetypes'            => ':attribute يجب أن يكون ملفًا من نوع: :values.',
    'min'                  => [
        'array'   => ':attribute يجب أن يحتوي على الأقل على :min عنصر.',
        'file'    => ':attribute يجب أن يكون على الأقل :min كيلوبايت.',
        'numeric' => ':attribute يجب أن يكون على الأقل :min.',
        'string'  => ':attribute يجب أن يكون على الأقل :min حرف.',
    ],
    'min_digits'           => 'يجب أن يحتوي :attribute على الأقل على :min أرقام.',
    'missing'              => 'يجب أن يكون حقل :attribute مفقودًا.',
    'missing_if'           => 'يجب أن يكون حقل :attribute مفقودًا عندما يكون :other يساوي :value.',
    'missing_unless'       => 'يجب أن يكون حقل :attribute مفقودًا ما لم يكن :other يساوي :value.',
    'missing_with'         => 'يجب أن يكون حقل :attribute مفقودًا عند وجود :value.',
    'missing_with_all'     => 'يجب أن يكون حقل :attribute مفقودًا عند وجود :values.',
    'multiple_of'          => ':attribute يجب أن يكون مضاعفًا لـ :value.',
    'not_in'               => ':attribute المحدد غير صالح.',
    'not_regex'            => 'صيغة :attribute غير صالحة.',
    'numeric'              => ':attribute يجب أن يكون رقمًا.',
    'password'             => [
        'letters'       => 'يجب أن يحتوي :attribute على حرف واحد على الأقل.',
        'mixed'         => 'يجب أن يحتوي :attribute على حرف كبير وحرف صغير على الأقل.',
        'numbers'       => 'يجب أن يحتوي :attribute على رقم واحد على الأقل.',
        'symbols'       => 'يجب أن يحتوي :attribute على رمز واحد على الأقل.',
        'uncompromised' => 'ظهر :attribute في تسريب بيانات. يرجى اختيار :attribute مختلف.',
    ],
    'present'              => ':attribute يجب أن يكون حاضرًا.',
    'prohibited'           => ':attribute محظور.',
    'prohibited_if'        => ':attribute محظور عندما :other يساوي :value.',
    'prohibited_unless'    => ':attribute محظور إلا إذا :other موجود في :values.',
    'prohibits'            => ':attribute يحظر وجود :other.',
    'regex'                => 'صيغة :attribute غير صالحة.',
    'required'             => ':attribute مطلوب.',
    'required_array_keys'  => 'يجب أن يحتوي حقل :attribute على إدخالات للـ: :values.',
    'required_if'          => ':attribute مطلوب عندما :other يساوي :value.',
    'required_if_accepted' => ':attribute مطلوب عندما يتم قبول :other.',
    'required_unless'      => ':attribute مطلوب إلا إذا :other موجود في :values.',
    'required_with'        => ':attribute مطلوب عندما :values موجود.',
    'required_with_all'    => ':attribute مطلوب عندما :values موجودة.',
    'required_without'     => ':attribute مطلوب عندما :values غير موجود.',
    'required_without_all' => ':attribute مطلوب عندما لا يوجد أي من :values.',
    'same'                 => ':attribute و :other يجب أن يتطابقا.',
    'size'                 => [
        'array'   => ':attribute يجب أن يحتوي على :size عنصر.',
        'file'    => ':attribute يجب أن يكون :size كيلوبايت.',
        'numeric' => ':attribute يجب أن يكون :size.',
        'string'  => ':attribute يجب أن يكون :size حرف.',
    ],
    'starts_with'          => ':attribute يجب أن يبدأ بأحد القيم التالية: :values.',
    'string'               => ':attribute يجب أن يكون نصًا.',
    'timezone'             => ':attribute يجب أن يكون منطقة زمنية صالحة.',
    'unique'               => ':attribute تم استخدامه مسبقًا.',
    'uploaded'             => 'فشل تحميل :attribute.',
    'uppercase'            => 'يجب أن يكون :attribute أحرف كبيرة.',
    'url'                  => ':attribute يجب أن يكون عنوان URL صالح.',
    'ulid'                 => 'يجب أن يكون :attribute معرّف ULID صالح.',
    'uuid'                 => ':attribute يجب أن يكون UUID صالح.',

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

    'attributes' => [
        'name'                  => 'الاسم',
        'username'              => 'اسم المستخدم',
        'email'                 => 'البريد الإلكتروني',
        'slug'                  => 'الرابط',
        'first_name'            => 'الاسم الأول',
        'last_name'             => 'اسم العائلة',
        'password'              => 'كلمة المرور',
        'password_confirmation' => 'تأكيد كلمة المرور',
        'city'                  => 'المدينة',
        'country'               => 'الدولة',
        'address'               => 'العنوان',
        'phone'                 => 'الهاتف',
        'mobile'                => 'الجوال',
        'age'                   => 'العمر',
        'sex'                   => 'الجنس',
        'gender'                => 'النوع',
        'day'                   => 'اليوم',
        'month'                 => 'الشهر',
        'year'                  => 'السنة',
        'hour'                  => 'الساعة',
        'minute'                => 'الدقيقة',
        'second'                => 'الثانية',
        'title'                 => 'العنوان',
        'content'               => 'المُحتوى',
        'description'           => 'الوصف',
        'excerpt'               => 'مقتطف',
        'date'                  => 'التاريخ',
        'time'                  => 'الوقت',
        'available'             => 'مُتاح',
        'desc'                  => 'الوصف',
        'photo'                 => 'الصورة',
        'image'                 => 'الصورة',
        'size'                  => 'الحجم',
        'color'                 => 'اللون',
        'quantity'              => 'الكميه',
        'price'                 => 'السعر',
        'discount'              => 'الخصم',
        'category_id'           => 'القسم',
        'product_id'            => 'القسم',
    ],

];
