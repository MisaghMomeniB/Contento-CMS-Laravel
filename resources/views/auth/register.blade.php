@extends('layouts.app')

@section('title', 'صفحه ثبت نام')

@section('content')
    <div
        class="max-w-2xl mx-auto mt-10 bg-white dark:bg-gray-900 shadow-lg rounded-xl p-8 space-y-6 text-gray-800 dark:text-gray-100">
        <h2 class="text-2xl font-bold text-center">ثبت‌نام کاربر</h2>

        @if ($errors->any())
            <div class="bg-red-100 dark:bg-red-400/20 border border-red-400 text-red-700 dark:text-red-300 px-4 py-3 rounded">
                <ul class="list-disc list-inside">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form id="registerForm" action="{{ route('register') }}" method="POST" class="space-y-4"
            onsubmit="return validateForm(event)">
            @csrf

            {{-- اطلاعات عمومی --}}
            <div class="space-y-4">
                <div>
                    <label class="block font-medium">نام:</label>
                    <input type="text" name="first_name" value="{{ old('first_name') }}"
                        class="w-full mt-1 border border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-800 rounded-lg p-2">
                    <span class="error text-red-600 text-sm mt-1 hidden">لطفاً نام را وارد کنید</span>
                </div>

                <div>
                    <label class="block font-medium">نام خانوادگی:</label>
                    <input type="text" name="last_name" value="{{ old('last_name') }}"
                        class="w-full mt-1 border border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-800 rounded-lg p-2">
                    <span class="error text-red-600 text-sm mt-1 hidden">لطفاً نام خانوادگی را وارد کنید</span>
                </div>

                <div>
                    <label class="block font-medium">موبایل:</label>
                    <input type="text" name="mobile" value="{{ old('mobile') }}"
                        class="w-full mt-1 border border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-800 rounded-lg p-2">
                    <span class="error text-red-600 text-sm mt-1 hidden">لطفاً شماره موبایل معتبر (۱۱ رقم) وارد کنید</span>
                </div>

                <div>
                    <label class="block font-medium">تلفن ثابت:</label>
                    <input type="text" name="phone" value="{{ old('phone') }}"
                        class="w-full mt-1 border border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-800 rounded-lg p-2">
                    <span class="error text-red-600 text-sm mt-1 hidden">لطفاً شماره تلفن معتبر (۸ تا ۱۱ رقم) وارد
                        کنید</span>
                </div>

                <div>
                    <label class="block font-medium">رمز عبور:</label>
                    <input type="password" name="password"
                        class="w-full mt-1 border border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-800 rounded-lg p-2">
                    <span class="error text-red-600 text-sm mt-1 hidden">رمز عبور باید حداقل ۸ کاراکتر باشد</span>
                </div>

                <div>
                    <label class="block font-medium">تکرار رمز عبور:</label>
                    <input type="password" name="password_confirmation"
                        class="w-full mt-1 border border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-800 rounded-lg p-2">
                    <span class="error text-red-600 text-sm mt-1 hidden">رمز عبور و تکرار آن باید یکسان باشند</span>
                </div>

                <div>
                    <label class="block font-medium">نوع کاربر:</label>
                    <select name="type"
                        class="w-full mt-1 border border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-800 rounded-lg p-2">
                        <option value="">-- انتخاب کنید --</option>
                        <option value="حقیقی" {{ old('type') == 'حقیقی' ? 'selected' : '' }}>حقیقی</option>
                        <option value="حقوقی" {{ old('type') == 'حقوقی' ? 'selected' : '' }}>حقوقی</option>
                    </select>
                    <span class="error text-red-600 text-sm mt-1 hidden">لطفاً نوع کاربر را انتخاب کنید</span>
                </div>
            </div>

            {{-- فیلدهای کاربر حقیقی --}}
            <div id="real-fields" class="space-y-4 hidden">
                <div>
                    <label class="block font-medium">کد ملی:</label>
                    <input type="text" name="national_code" value="{{ old('national_code') }}"
                        class="w-full mt-1 border border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-800 rounded-lg p-2">
                    <span class="error text-red-600 text-sm mt-1 hidden">لطفاً کد ملی معتبر (۱۰ رقم) وارد کنید</span>
                </div>
            </div>

            {{-- فیلدهای کاربر حقوقی --}}
            <div id="legal-fields" class="space-y-4 hidden">
                <div>
                    <label class="block font-medium">نام فروشگاه:</label>
                    <input type="text" name="store_name" value="{{ old('store_name') }}"
                        class="w-full mt-1 border border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-800 rounded-lg p-2">
                    <span class="error text-red-600 text-sm mt-1 hidden">لطفاً نام فروشگاه را وارد کنید</span>
                </div>

                <div>
                    <label class="block font-medium">شماره ثبت:</label>
                    <input type="text" name="registration_number" value="{{ old('registration_number') }}"
                        class="w-full mt-1 border border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-800 rounded-lg p-2">
                    <span class="error text-red-600 text-sm mt-1 hidden">لطفاً شماره ثبت را وارد کنید</span>
                </div>

                <div>
                    <label class="block font-medium">کد اقتصادی:</label>
                    <input type="text" name="economic_code" value="{{ old('economic_code') }}"
                        class="w-full mt-1 border border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-800 rounded-lg p-2">
                    <span class="error text-red-600 text-sm mt-1 hidden">لطفاً کد اقتصادی معتبر (۱۲ رقم) وارد کنید</span>
                </div>
            </div>

            {{-- فیلدهای مشترک برای هر دو نوع کاربر --}}
            <div id="shared-fields" class="space-y-4">
                <div>
                    <label class="block font-medium">کد پستی:</label>
                    <input type="text" name="postal_code" value="{{ old('postal_code') }}"
                        class="w-full mt-1 border border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-800 rounded-lg p-2">
                    <span class="error text-red-600 text-sm mt-1 hidden">لطفاً کد پستی معتبر (۱۰ رقم) وارد کنید</span>
                </div>

                <div>
                    <label class="block font-medium">آدرس:</label>
                    <textarea name="address"
                        class="w-full mt-1 border border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-800 rounded-lg p-2">{{ old('address') }}</textarea>
                    <span class="error text-red-600 text-sm mt-1 hidden">لطفاً آدرس را وارد کنید</span>
                </div>
            </div>

            {{-- دکمه ثبت --}}
            <div class="text-center">
                <button type="submit"
                    class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-6 rounded-lg shadow-md transition duration-300">
                    ثبت‌نام
                </button>
            </div>
        </form>
    </div>

    <script>
        // مدیریت نمایش/مخفی کردن فیلدهای شرطی
        const typeSelect = document.querySelector('select[name="type"]');
        const realFields = document.getElementById('real-fields');
        const legalFields = document.getElementById('legal-fields');

        function toggleFields() {
            const type = typeSelect.value;
            realFields.classList.toggle('hidden', type !== 'حقیقی');
            legalFields.classList.toggle('hidden', type !== 'حقوقی');
        }

        typeSelect.addEventListener('change', toggleFields);
        window.addEventListener('load', toggleFields);

        // اعتبارسنجی فرم
        function validateForm(event) {
            event.preventDefault(); // جلوگیری از ارسال پیش‌فرض

            // مخفی کردن همه پیام‌های خطا
            document.querySelectorAll('.error').forEach(error => error.classList.add('hidden'));

            let isValid = true;

            // گرفتن مقادیر فیلدها
            const firstName = document.querySelector('input[name="first_name"]').value.trim();
            const lastName = document.querySelector('input[name="last_name"]').value.trim();
            const mobile = document.querySelector('input[name="mobile"]').value.trim();
            const phone = document.querySelector('input[name="phone"]').value.trim();
            const password = document.querySelector('input[name="password"]').value.trim();
            const passwordConfirmation = document.querySelector('input[name="password_confirmation"]').value.trim();
            const type = typeSelect.value;
            const nationalCode = document.querySelector('input[name="national_code"]').value.trim();
            const storeName = document.querySelector('input[name="store_name"]').value.trim();
            const registrationNumber = document.querySelector('input[name="registration_number"]').value.trim();
            const economicCode = document.querySelector('input[name="economic_code"]').value.trim();
            const postalCode = document.querySelector('input[name="postal_code"]').value.trim();
            const address = document.querySelector('textarea[name="address"]').value.trim();

            // اعتبارسنجی فیلدها با پیام‌های فارسی
            if (!firstName) {
                document.querySelector('input[name="first_name"]').nextElementSibling.classList.remove('hidden');
                isValid = false;
            }
            if (!lastName) {
                document.querySelector('input[name="last_name"]').nextElementSibling.classList.remove('hidden');
                isValid = false;
            }
            if (!/^09\d{9}$/.test(mobile)) {
                document.querySelector('input[name="mobile"]').nextElementSibling.classList.remove('hidden');
                isValid = false;
            }
            if (phone && !/^\d{8,11}$/.test(phone)) {
                document.querySelector('input[name="phone"]').nextElementSibling.classList.remove('hidden');
                isValid = false;
            }
            if (password.length < 8) {
                document.querySelector('input[name="password"]').nextElementSibling.classList.remove('hidden');
                isValid = false;
            }
            if (password !== passwordConfirmation) {
                document.querySelector('input[name="password_confirmation"]').nextElementSibling.classList.remove('hidden');
                isValid = false;
            }
            if (!type) {
                document.querySelector('select[name="type"]').nextElementSibling.classList.remove('hidden');
                isValid = false;
            }
            if (type === 'حقیقی' && !/^\d{10}$/.test(nationalCode)) {
                document.querySelector('input[name="national_code"]').nextElementSibling.classList.remove('hidden');
                isValid = false;
            }
            if (type === 'حقوقی') {
                if (!storeName) {
                    document.querySelector('input[name="store_name"]').nextElementSibling.classList.remove('hidden');
                    isValid = false;
                }
                if (!registrationNumber) {
                    document.querySelector('input[name="registration_number"]').nextElementSibling.classList.remove('hidden');
                    isValid = false;
                }
                if (!/^\d{12}$/.test(economicCode)) {
                    document.querySelector('input[name="economic_code"]').nextElementSibling.classList.remove('hidden');
                    isValid = false;
                }
            }
            if (!/^\d{10}$/.test(postalCode)) {
                document.querySelector('input[name="postal_code"]').nextElementSibling.classList.remove('hidden');
                isValid = false;
            }
            if (!address) {
                document.querySelector('textarea[name="address"]').nextElementSibling.classList.remove('hidden');
                isValid = false;
            }

            // ارسال فرم در صورت معتبر بودن
            if (isValid) {
                document.getElementById('registerForm').submit();
            }

            // فوکوس روی اولین فیلد دارای خطا
            if (!isValid) {
                document.querySelector('.error:not(.hidden)').previousElementSibling.focus();
            }

            return isValid;
        }
    </script>
@endsection