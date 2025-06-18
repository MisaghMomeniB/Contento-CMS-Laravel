<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>ثبت‌نام</title>
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
        <h2 class="text-3xl font-bold">به خانواده ما بپیوندید</h2>
        <p class="text-blue-100">ثبت‌نام شما اولین قدم به سمت یک تجربه بهتر است.</p>
        <svg class="w-20 h-20 mx-auto text-white opacity-30" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" d="M2 16l5-5 5 5 5-5 5 5"></path>
        </svg>
      </div>
    </div>

    <!-- سمت راست: فرم ثبت‌نام -->
    <div class="w-full md:w-1/2 p-8 md:p-10">
      <h2 class="text-2xl font-bold text-blue-700 mb-6 text-center">ثبت‌نام</h2>

      <form action="{{ route('register') }}" method="POST" class="space-y-4">
        @csrf

        <div>
          <label class="block text-gray-700 mb-1">نام کامل</label>
          <input type="text" name="name" placeholder="مثلاً میثاق مومنی" class="w-full border border-gray-300 rounded px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400">
        </div>

        <div>
          <label class="block text-gray-700 mb-1">شماره موبایل</label>
          <input type="text" name="phone_number" placeholder="09121234567" class="w-full border border-gray-300 rounded px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400">
        </div>

        <div>
          <label class="block text-gray-700 mb-1">رمز عبور</label>
          <input type="password" name="password" class="w-full border border-gray-300 rounded px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400">
        </div>

        <div>
          <label class="block text-gray-700 mb-1">تکرار رمز عبور</label>
          <input type="password" name="password_confirmation" class="w-full border border-gray-300 rounded px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400">
        </div>

        <!-- کپچا -->
        <div>
          <label class="block text-gray-700 mb-1">کد امنیتی</label>
          <div class="flex items-center">
            <img src="{{ captcha_src('flat') }}" alt="captcha" class="ml-4 cursor-pointer rounded" onclick="this.src='{{ captcha_src('flat') }}?'+Math.random()">
            <input type="text" name="captcha" placeholder="کد را وارد کنید" class="w-full border border-gray-300 rounded px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400">
          </div>
          @error('captcha')
            <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span>
          @enderror
        </div>

        <button type="submit" class="w-full bg-blue-600 text-white py-2 rounded hover:bg-blue-700 transition">ثبت‌نام</button>
      </form>

      <div class="text-center mt-6 text-sm text-gray-600">
        قبلاً ثبت‌نام کرده‌اید؟ <a href="{{ route('login') }}" class="text-blue-600 hover:underline">ورود</a>
      </div>
    </div>
  </div>
</body>
</html>
