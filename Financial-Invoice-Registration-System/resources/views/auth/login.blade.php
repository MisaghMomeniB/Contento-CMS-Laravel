<div dir="rtl">
    {{-- Tailwind CDN --}}
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- فرم ورود -->
    <section class="max-w-md mx-auto mt-10 bg-white p-6 rounded-xl shadow-md shadow-cyan-400">
        <h2 class="text-2xl font-bold mb-6 text-center text-blue-600">فرم ورود</h2>
        <form id="loginForm" action="{{route("login")}}" method="POST" class="space-y-4">
            @csrf
            <div>
                <label class="block mb-1 text-gray-700 mb-[16px]">شماره همراه  : </label>
                <input placeholder="0912345678" id="mobile" type="tel" name="mobile"
                    class="w-full p-2 border text-center border-gray-300 rounded-[16px] text-[14px] focus:outline-none focus:ring-2 focus:ring-blue-400"
                    required>
            </div>
            <div>
                <label class="block mb-1 text-gray-700 mb-[16px]">رمز عبور  : </label>
                <input dir="ltr" id="password" placeholder="Password ..." type="password" name="password"
                    class="w-full text-center p-2 border border-gray-300 rounded-[16px] text-[14px] focus:outline-none focus:ring-2 focus:ring-blue-400"
                    required>
            </div>
            {{-- <div id="registerError" class="text-red-500 text-sm"></div> --}}
            <center>
            <button type="submit"
                class="w-1/2 align-center bg-blue-600 text-white py-2 mb-[16px] rounded-[16px] hover:bg-blue-800 transition">ورود</button></center>
        </form>
        <a href="/">
            <a href="{{route("otp")}}"><p class="text-blue-600 text-[14px] mb-[8px] hover:text-blue-800">ورود با رمز یکبار مصرف</p></a>
        </a>
        <a href="/register">
            <p class="text-blue-600 hover:text-blue-800 text-[14px]">حساب کاربری ندارید ؟ بسازید</p>
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