<div dir="rtl">
    {{-- Tailwind CDN --}}
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- فرم ثبت‌نام -->
    <section class="max-w-md mx-auto mt-10 bg-white p-6 rounded-xl shadow-md">
        <h2 class="text-2xl font-bold mb-6 text-center text-blue-600">فرم ثبت‌نام</h2>
        <form action="{{route("register")}}" method="POST" class="space-y-4" id="registerForm">
            @csrf
            <div>
                <label class="block mb-1 text-gray-700">نام شما : </label>
                <input id="firstName" type="text" name="first_name"
                    class="w-full p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-400"
                    required>
            </div>
            <div>
                <label class="block mb-1 text-gray-700">نام خانوادگی شما : </label>
                <input id="lastName" type="text" name="last_name"
                    class="w-full p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-400"
                    required>
            </div>
            <div>
                <label class="block mb-1 text-gray-700">شماره همراه شما : </label>
                <input id="mobile" type="tel" name="mobile"
                    class="w-full p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-400"
                    required>
            </div>
            <div>
                <label class="block mb-1 text-gray-700">رمز عبور : </label>
                <input id="password" type="password" name="password"
                    class="w-full p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-400"
                    required>
            </div>
            <div id="registerError" class="text-red-500 text-sm"></div>
            <button type="submit"
                class="w-full bg-blue-600 text-white py-2 rounded-md hover:bg-blue-700 transition">ثبت‌نام</button>
        </form>
        <a href="/login">
            <p class="text-blue-600 hover:text-blue-800">حساب دارید ؟ وارد شوید</p>
        </a>
    </section>

    <script>
        document.getElementById('registerForm').addEventListener('submit', function (e) {
            e.preventDefault();

            const first_name = document.getElementById('first_name').value.trim();
            const last_name = document.getElementById('last_name').value.trim();
            const mobile = document.getElementById('mobile').value.trim();
            const password = document.getElementById('password');
            const errorBox = document.getElementById('registerError')

            errorBox.textContent = "";

            if (!first_name || !last_name || !mobile || !password) {
                errorBox.textContent = "لطفا فیلد را کامل کنید";
                return;
            }

            if (password.length < 8) {
                errorBox.textContent = "رمز عبور حداقل 8 کاراکتر باید باشد";
                return;
            }
        })
    </script>

</div>