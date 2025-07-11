@extends('layouts.app')

@section('title', 'صفحه ورود')

@section('content')
<div class="max-w-md mx-auto mt-16 bg-white dark:bg-gray-900 shadow-lg rounded-xl p-8 text-gray-800 dark:text-gray-100">
    <h2 class="text-3xl font-bold text-center mb-8">ورود به حساب کاربری</h2>

    @if ($errors->any())
        <div class="bg-red-100 dark:bg-red-500/20 border border-red-400 text-red-700 dark:text-red-300 px-4 py-3 rounded mb-6">
            <ul class="list-disc list-inside space-y-1">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('login') }}" method="POST" class="space-y-6">
        @csrf

        <div>
            <label for="mobile" class="block text-sm font-medium mb-1">موبایل:</label>
            <input
                id="mobile"
                type="text"
                name="mobile"
                value="{{ old('mobile') }}"
                placeholder="مثلاً 09121234567"
                class="w-full border border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-800 rounded-lg p-3 focus:outline-none focus:ring-2 focus:ring-blue-500 transition"
                required
            >
        </div>

        <div>
            <label for="password" class="block text-sm font-medium mb-1">رمز عبور:</label>
            <input
                id="password"
                type="password"
                name="password"
                placeholder="رمز عبور خود را وارد کنید"
                class="w-full border border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-800 rounded-lg p-3 focus:outline-none focus:ring-2 focus:ring-blue-500 transition"
                required
            >
        </div>

        <div class="text-center">
            <button
                type="submit"
                class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-3 rounded-lg shadow-md transition duration-300"
            >
                ورود
            </button>
        </div>

        <div class="text-center pt-4">
            <a href="{{ route('register.form') }}" class="text-blue-600 hover:underline">
                اگر اکانت ندارید، ثبت‌نام کنید
            </a>
        </div>
    </form>
</div>
@endsection
