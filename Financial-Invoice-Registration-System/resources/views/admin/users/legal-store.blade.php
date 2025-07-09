<!DOCTYPE html>
<html lang="fa" dir="rtl">

<head>
    <meta charset="UTF-8" />
    <title>ثبت مشتری حقوقی</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        navy: "#1e293b",
                        golden: "#facc15",
                    },
                    fontFamily: {
                        sans: ["Vazirmatn", "sans-serif"],
                    },
                },
            },
        };
    </script>
    <!-- <link href="https://cdn.fontcdn.ir/Font/Persian/Vazirmatn/Vazirmatn.css" rel="stylesheet" /> -->

    <!-- Persian Datepicker -->
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/persian-datepicker@1.2.0/dist/css/persian-datepicker.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/persian-date@0.1.8/dist/persian-date.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/persian-datepicker@1.2.0/dist/js/persian-datepicker.min.js"></script> -->
</head>

<body class="bg-gray-100 font-sans p-6">
    <div class="max-w-3xl mx-auto bg-white p-6 rounded shadow">
        <h1 class="text-2xl font-bold text-navy mb-6">فرم ثبت مشتری حقوقی</h1>

        <form action="{{route("admin.customers.storeCustomer")}}" method="POST" class="space-y-5" id="customerForm">
            @csrf
            <div>
                <label for="first_name" class="block mb-1 font-medium">نام فروشنده:</label>
                <input id="first_name" name="first_name" class="w-full border rounded px-4 py-2" />
                <p id="error_company_name" class="text-red-600 text-sm hidden mt-1">
                    لطفاً نام شرکت را وارد کنید.
                </p>
            </div>

            <div>
                <label for="last_name" class="block mb-1 font-medium">نام خانوادگی فروشنده:</label>
                <input id="last_name" name="last_name" class="w-full border rounded px-4 py-2" />
                <p id="error_company_name" class="text-red-600 text-sm hidden mt-1">
                    لطفاً نام شرکت را وارد کنید.
                </p>
            </div>

            <div>
                <label for="company_name" class="block mb-1 font-medium">نام شرکت / فروشگاه:</label>
                <input id="company_name" name="company_name" class="w-full border rounded px-4 py-2" />
                <p id="error_company_name" class="text-red-600 text-sm hidden mt-1">
                    لطفاً نام شرکت را وارد کنید.
                </p>
            </div>

            <div>
                <label for="national_id" class="block mb-1 font-medium">شناسه ملی:</label>
                <input id="national_id" name="national_id" class="w-full border rounded px-4 py-2" />
                <p id="error_national_id" class="text-red-600 text-sm hidden mt-1">
                    شناسه ملی باید 11 رقم باشد.
                </p>
            </div>

            <div>
                <label for="registration_number" class="block mb-1 font-medium">شماره ثبت:</label>
                <input id="registration_number" name="registration_number" class="w-full border rounded px-4 py-2" />
                <p id="error_registration_number" class="text-red-600 text-sm hidden mt-1">
                    شماره ثبت را وارد کنید.
                </p>
            </div>

            <div>
                <label for="economic_number" class="block mb-1 font-medium">شماره اقتصادی:</label>
                <input id="economic_number" name="economic_number" class="w-full border rounded px-4 py-2" />
                <p id="error_registration_number" class="text-red-600 text-sm hidden mt-1">
                    شماره ثبت را وارد کنید.
                </p>
            </div>

            <div>
                <label for="phone" class="block mb-1 font-medium">شماره تماس:</label>
                <input id="phone" name="phone" class="w-full border rounded px-4 py-2" />
                <p id="error_phone" class="text-red-600 text-sm hidden mt-1">
                    شماره تماس معتبر نیست.
                </p>
            </div>

            <div>
                <label for="mobile" class="block mb-1 font-medium">شماره همراه:</label>
                <input id="mobile" name="mobile" class="w-full border rounded px-4 py-2" />
                <p id="error_mobile" class="text-red-600 text-sm hidden mt-1">
                    شماره همراه معتبر نیست.
                </p>
            </div>

            <div>
                <label for="password" class="block mb-1 font-medium">رمز عبور:</label>
                <input id="password" name="password" class="w-full border rounded px-4 py-2" />
                <p id="error_mobile" class="text-red-600 text-sm hidden mt-1">
                    شماره همراه معتبر نیست.
                </p>
            </div>

            <div>
                <label for="postal_code" class="block mb-1 font-medium">کد پستی:</label>
                <input id="postal_code" name="postal_code" class="w-full border rounded px-4 py-2" />
                <p id="error_mobile" class="text-red-600 text-sm hidden mt-1">
                    شماره همراه معتبر نیست.
                </p>
            </div>

            <div>
                <label for="address" class="block mb-1 font-medium">آدرس:</label>
                <textarea id="address" name="address" rows="3"
                    class="w-full border rounded px-4 py-2 resize-y"></textarea>
                <p id="error_address" class="text-red-600 text-sm hidden mt-1">
                    آدرس را وارد کنید.
                </p>
            </div>

            <div>
                <label for="register_date" class="block mb-1 font-medium">تاریخ ثبت:</label>
                <input type="text" id="register_date" name="register_date"
                    class="datepicker w-full border rounded px-4 py-2" placeholder="انتخاب تاریخ" />
                <p id="error_register_date" class="text-red-600 text-sm hidden mt-1">
                    تاریخ ثبت را وارد کنید.
                </p>
            </div>

            <div class="flex justify-end">
                <a class="p-4 rounded text-white bg-golden mx-4" href="{{route("admin.dashboard")}}">بازگشت </a>

                <button type="submit"
                    class="bg-blue-600 text-white px-6 py-2 rounded font-bold hover:bg-blue-700 transition">
                    ثبت مشتری
                </button>
            </div>
        </form>
    </div>

</body>

</html>