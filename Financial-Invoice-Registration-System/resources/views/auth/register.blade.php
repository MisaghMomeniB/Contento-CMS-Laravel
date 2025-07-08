<div dir="rtl">
    {{-- Tailwind CDN --}}
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- فرم ثبت‌نام -->
    <section class="max-w-md mx-auto mt-10 bg-white p-6 rounded-xl shadow-md">
        <h2 class="text-2xl font-bold mb-6 text-center text-blue-600">فرم ثبت‌نام</h2>
        <form action="#" method="POST" class="space-y-4">
            <div>
                <label class="block mb-1 text-gray-700">نام کامل</label>
                <input type="text" name="fullname"
                    class="w-full p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-400"
                    required>
            </div>
            <div>
                <label class="block mb-1 text-gray-700">ایمیل</label>
                <input type="email" name="email"
                    class="w-full p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-400"
                    required>
            </div>
            <div>
                <label class="block mb-1 text-gray-700">رمز عبور</label>
                <input type="password" name="password"
                    class="w-full p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-400"
                    required>
            </div>
            <div>
                <label class="block mb-1 text-gray-700">تأیید رمز عبور</label>
                <input type="password" name="confirm_password"
                    class="w-full p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-400"
                    required>
            </div>
            <button type="submit"
                class="w-full bg-blue-600 text-white py-2 rounded-md hover:bg-blue-700 transition">ثبت‌نام</button>
        </form>
        <a href="/login"><p class="text-blue-600 hover:text-blue-800" >حساب دارید ؟ وارد شوید</p></a>
    </section>

</div>