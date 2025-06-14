<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ورود به حساب</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.fontcdn.ir/Font/Persian/Vazir/Vazir.css" rel="stylesheet">
    <style>
        body {
            font-family: Vazir, sans-serif;
        }
    </style>
</head>
<body class="bg-blue-50 min-h-screen flex items-center justify-center px-4">
    <div class="w-full max-w-5xl bg-white shadow-lg rounded-2xl overflow-hidden flex flex-col md:flex-row">
        
        <!-- سمت چپ: پترن -->
        <div class="hidden md:flex md:w-1/2 bg-blue-700 text-white items-center justify-center p-8 relative">
            <div class="absolute top-0 right-0 bottom-0 left-0 bg-blue-800 opacity-20 z-0"></div>
            <div class="z-10 text-center space-y-4">
                <h2 class="text-3xl font-bold">به پنل ما خوش آمدید</h2>
                <p class="text-blue-100">با ثبت‌نام یا ورود، به خدمات حرفه‌ای ما دسترسی داشته باشید.</p>
                <svg class="w-20 h-20 mx-auto text-white opacity-30" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M2 16l5-5 5 5 5-5 5 5"></path>
                </svg>
            </div>
        </div>

        <!-- سمت راست: فرم ورود -->
        <div class="w-full md:w-1/2 p-8 md:p-10">
            <h2 class="text-2xl font-bold text-blue-700 mb-6 text-center">ورود به حساب کاربری</h2>

            @if ($errors->any())
                <div class="bg-red-100 border border-red-400 text-red-700 p-3 rounded mb-4 text-sm">
                    <ul class="list-disc pr-5">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @if (session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 p-3 rounded mb-4 text-sm">
                    {{ session('success') }}
                </div>
            @endif

            <form action="{{ route('login') }}" method="POST" class="space-y-4">
                @csrf

                <div>
                    <label class="block text-gray-700 mb-1">شماره موبایل</label>
                    <input type="text" name="phone_number" class="w-full border border-gray-300 rounded px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400" required>
                </div>

                <div>
                    <label class="block text-gray-700 mb-1">رمز عبور</label>
                    <input type="password" name="password" class="w-full border border-gray-300 rounded px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400" required>
                </div>

                <div>
                    <label class="block text-gray-700 mb-1">کد امنیتی</label>
                    <div class="flex items-center gap-4">
                        <img src="{{ captcha_src('flat') }}" alt="captcha" class="rounded border cursor-pointer" onclick="this.src='{{ captcha_src('flat') }}' + Math.random()" title="برای بارگذاری مجدد کلیک کنید">
                        <input type="text" name="captcha" placeholder="کد بالا را وارد کنید" class="w-full border border-gray-300 rounded px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400" required>
                    </div>
                </div>

                <div class="flex items-center justify-between">
                    <label class="flex items-center">
                        <input type="checkbox" name="remember" class="ml-2">
                        <span class="text-sm text-gray-600">مرا به خاطر بسپار</span>
                    </label>
                    <a href="#" class="text-sm text-blue-600 hover:underline">فراموشی رمز؟</a>
                </div>

                <button type="submit" class="w-full bg-blue-600 text-white py-2 rounded hover:bg-blue-700 transition">ورود</button>
            </form>

            <div class="text-center mt-6 text-sm text-gray-600">
                حساب کاربری ندارید؟ <a href="{{ route('showRegister') }}" class="text-blue-600 hover:underline">ثبت‌نام کنید</a>
            </div>
        </div>
    </div>
</body>
</html>
