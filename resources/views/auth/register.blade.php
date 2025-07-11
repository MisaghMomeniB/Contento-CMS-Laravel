@extends('layouts.app')

@section('title', 'صفحه ثبت نام')

@section('content')
    <div class="max-w-2xl mx-auto mt-10 bg-white dark:bg-gray-900 shadow-lg rounded-xl p-8 space-y-6 text-gray-800 dark:text-gray-100">
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

        <form action="{{ route('register') }}" method="POST" class="space-y-4">
            @csrf

            {{-- اطلاعات عمومی --}}
            <div class="space-y-4">
                <div>
                    <label class="block font-medium">نام:</label>
                    <input type="text" name="first_name" value="{{ old('first_name') }}"
                        class="w-full mt-1 border border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-800 rounded-lg p-2"
                        required>
                </div>

                <div>
                    <label class="block font-medium">نام خانوادگی:</label>
                    <input type="text" name="last_name" value="{{ old('last_name') }}"
                        class="w-full mt-1 border border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-800 rounded-lg p-2"
                        required>
                </div>

                <div>
                    <label class="block font-medium">موبایل:</label>
                    <input type="text" name="mobile" value="{{ old('mobile') }}"
                        class="w-full mt-1 border border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-800 rounded-lg p-2"
                        required>
                </div>

                <div>
                    <label class="block font-medium">تلفن ثابت:</label>
                    <input type="text" name="phone" value="{{ old('phone') }}"
                        class="w-full mt-1 border border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-800 rounded-lg p-2">
                </div>

                <div>
                    <label class="block font-medium">رمز عبور:</label>
                    <input type="password" name="password"
                        class="w-full mt-1 border border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-800 rounded-lg p-2"
                        required>
                </div>

                <div>
                    <label class="block font-medium">تکرار رمز عبور:</label>
                    <input type="password" name="password_confirmation"
                        class="w-full mt-1 border border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-800 rounded-lg p-2"
                        required>
                </div>

                <div>
                    <label class="block font-medium">نوع کاربر:</label>
                    <select name="type"
                        class="w-full mt-1 border border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-800 rounded-lg p-2">
                        <option value="">-- انتخاب کنید --</option>
                        <option value="حقیقی" {{ old('type') == 'حقیقی' ? 'selected' : '' }}>حقیقی</option>
                        <option value="حقوقی" {{ old('type') == 'حقوقی' ? 'selected' : '' }}>حقوقی</option>
                    </select>
                </div>
            </div>

            {{-- فیلدهای کاربر حقیقی --}}
            <div id="real-fields" class="space-y-4 hidden">
                <div>
                    <label class="block font-medium">کد ملی:</label>
                    <input type="text" name="national_code" value="{{ old('national_code') }}"
                        class="w-full mt-1 border border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-800 rounded-lg p-2">
                </div>
            </div>

            {{-- فیلدهای کاربر حقوقی --}}
            <div id="legal-fields" class="space-y-4 hidden">
                <div>
                    <label class="block font-medium">نام فروشگاه:</label>
                    <input type="text" name="store_name" value="{{ old('store_name') }}"
                        class="w-full mt-1 border border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-800 rounded-lg p-2">
                </div>

                <div>
                    <label class="block font-medium">شماره ثبت:</label>
                    <input type="text" name="registration_number" value="{{ old('registration_number') }}"
                        class="w-full mt-1 border border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-800 rounded-lg p-2">
                </div>

                <div>
                    <label class="block font-medium">کد اقتصادی:</label>
                    <input type="text" name="economic_code" value="{{ old('economic_code') }}"
                        class="w-full mt-1 border border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-800 rounded-lg p-2">
                </div>
            </div>

            {{-- فیلدهای مشترک برای هر دو نوع کاربر --}}
            <div id="shared-fields" class="space-y-4">
                <div>
                    <label class="block font-medium">کد پستی:</label>
                    <input type="text" name="postal_code" value="{{ old('postal_code') }}"
                        class="w-full mt-1 border border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-800 rounded-lg p-2">
                </div>

                <div>
                    <label class="block font-medium">آدرس:</label>
                    <textarea name="address"
                        class="w-full mt-1 border border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-800 rounded-lg p-2">{{ old('address') }}</textarea>
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
    </script>
@endsection
