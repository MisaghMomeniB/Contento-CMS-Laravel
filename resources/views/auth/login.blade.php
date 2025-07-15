<!DOCTYPE html>
<html lang="fa" dir="rtl">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>ورود</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>

<body class="h-screen font-sans">
    <div class="h-full flex">
        <!-- سمت چپ -->
        <div class="w-1/2 bg-[#77BEF0] text-white flex items-center justify-center p-10">
            <div class="text-center">
                <h1 class="text-4xl font-bold mb-4">خوش آمدید!</h1>
                <p class="text-lg">لطفاً وارد حساب خود شوید یا ثبت‌نام کنید.</p>
            </div>
        </div>

        <!-- سمت راست: فرم ورود -->
        <div class="w-1/2 bg-gray-200 flex items-center justify-center p-10">
            <div class="bg-white w-full max-w-md p-8 rounded-xl shadow-md">
                <h2 class="text-2xl font-bold mb-6 text-center">ورود</h2>
                <form action="{{route("login")}}" method="POST">
                    @csrf
                    <div class="mb-4">
                        <label class="block text-gray-700 mb-1">شماره همراه</label>
                        <input name="mobile" dir="rtl" type="tel" placeholder="شماره همراه"
                            class="w-full px-4 py-2 border rounded-lg focus:outline-none 
                            focus:ring-2 focus:ring-blue-500"
                            required />
                    </div>
                    <div class="mb-6">
                        <label class="block text-gray-700 mb-1">رمز عبور</label>
                        <input name="password" type="password" placeholder="رمز عبور"
                            class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                            required />
                    </div>
                    <button type="submit"
                        class="w-full bg-blue-600 text-white py-2 rounded-lg hover:bg-blue-700 transition">
                        ورود
                    </button>
                </form>
                <p class="text-center text-sm text-gray-600 mt-4">
                    حساب کاربری ندارید؟
                    <a href="{{route("register.form")}}" class="text-blue-600 hover:underline">ثبت‌نام کنید</a>
                </p>
            </div>
        </div>
    </div>
</body>

</html>