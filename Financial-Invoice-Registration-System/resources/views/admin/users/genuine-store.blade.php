<!DOCTYPE html>
<html lang="fa" dir="rtl">

<head>
    <meta charset="UTF-8" />
    <title>ثبت مشتری حقیقی</title>
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
        <h1 class="text-2xl font-bold text-navy mb-6">فرم ثبت مشتری حقیقی</h1>

        <form onsubmit="return validateHaghighiForm()" id="haghighiForm" class="space-y-5">
            <div>
                <label for="first_name" class="block mb-1 font-medium">نام:</label>
                <input id="first_name" name="first_name" class="w-full border rounded px-4 py-2" />
                <p id="error_first_name" class="text-red-600 text-sm hidden mt-1">نام را وارد کنید.</p>
            </div>

            <div>
                <label for="last_name" class="block mb-1 font-medium">نام خانوادگی:</label>
                <input id="last_name" name="last_name" class="w-full border rounded px-4 py-2" />
                <p id="error_last_name" class="text-red-600 text-sm hidden mt-1">نام خانوادگی را وارد کنید.</p>
            </div>

            <div>
                <label for="national_code" class="block mb-1 font-medium">کد ملی:</label>
                <input id="national_code" name="national_code" class="w-full border rounded px-4 py-2" />
                <p id="error_national_code" class="text-red-600 text-sm hidden mt-1">کد ملی باید ۱۰ رقم باشد.</p>
            </div>

            <div>
                <label for="phone_haghighi" class="block mb-1 font-medium">شماره تماس:</label>
                <input id="phone_haghighi" name="phone_haghighi" class="w-full border rounded px-4 py-2" />
                <p id="error_phone_haghighi" class="text-red-600 text-sm hidden mt-1">شماره تماس معتبر نیست.</p>
            </div>

            <div>
                <label for="birth_date" class="block mb-1 font-medium">تاریخ تولد:</label>
                <input id="birth_date" name="birth_date" type="text" class="datepicker w-full border rounded px-4 py-2"
                    placeholder="انتخاب تاریخ" />
                <p id="error_birth_date" class="text-red-600 text-sm hidden mt-1">تاریخ تولد را وارد کنید.</p>
            </div>

            <div>
                <label for="address_haghighi" class="block mb-1 font-medium">آدرس:</label>
                <textarea id="address_haghighi" name="address_haghighi" rows="3"
                    class="w-full border rounded px-4 py-2 resize-y"></textarea>
                <p id="error_address_haghighi" class="text-red-600 text-sm hidden mt-1">آدرس را وارد کنید.</p>
            </div>

            <div class="flex justify-end">
                <a class="p-4 rounded text-white bg-golden mx-4" href="{{route("admin.dashboard")}}">بازگشت </a>
                <button type="submit"
                    class="bg-blue-600 text-white px-6 py-2 rounded font-bold hover:bg-blue-700 transition">ثبت
                    مشتری</button>
            </div>
        </form>
    </div>

</body>

</html>