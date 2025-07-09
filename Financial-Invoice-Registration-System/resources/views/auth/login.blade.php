<div dir="rtl">
    {{-- Tailwind CDN --}}
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- فرم ورود -->
    <section class="max-w-md mx-auto mt-10 bg-white p-6 rounded-xl shadow-md">
        <h2 class="text-2xl font-bold mb-6 text-center text-blue-600">فرم ورود</h2>
        <form id="loginForm" action="{{route("login")}}" method="POST" class="space-y-4">
            @csrf
            <div>
                <label class="block mb-1 text-gray-700">شماره همراه شما : </label>
                <input id="mobile" type="tel" name="mobile"
                    class="w-full p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-400"
                    required>
            </div>
            <div>
                <label class="block mb-1 text-gray-700">رمز عبور شما : </label>
                <input id="password" type="password" name="password"
                    class="w-full p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-400"
                    required>
            </div>
            {{-- <div id="registerError" class="text-red-500 text-sm"></div> --}}
            <button type="submit"
                class="w-full bg-blue-600 text-white py-2 rounded-md hover:bg-blue-800 transition">ورود</button>
        </form>
        <a href="/">
            <a href="{{route("otp")}}"><p class="text-blue-600 hover:text-blue-800">ورود با رمز یکبار مصرف</p></a>
        </a>
        <a href="/register">
            <p class="text-blue-600 hover:text-blue-800">حساب کاربری ندارید ؟ بسازید</p>
        </a>
    </section>

    <script>
        const mobile = document.getElementById('mobile').value.trim();
        const password = document.getElementById('password').value.trim();

        if (!mobile || !password) {
            errorBox.textContent = "لطفا فیلد را کامل کنید";
            return;
        }
    </script>

</div>