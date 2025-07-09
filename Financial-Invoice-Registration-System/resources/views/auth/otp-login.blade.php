<!DOCTYPE html>
<html lang="fa" dir="rtl">

<head>
    <meta charset="UTF-8">
    <title>ورود با رمز یکبار مصرف</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>

<body class="bg-gray-100 flex items-center justify-center min-h-screen">
    <section class="bg-white p-6 rounded-xl shadow-md w-full max-w-md">
        <h2 class="text-xl font-bold text-blue-600 text-center mb-4">ورود با رمز یکبار مصرف</h2>

        <div id="otpResponse" class="text-sm text-center mb-4"></div>

        <form id="otpForm" class="space-y-4">
            <div>
                <label class="block mb-1 text-gray-700">شماره موبایل:</label>
                <input type="tel" id="mobile" name="mobile" class="w-full border border-gray-300 p-2 rounded-md"
                    required>
            </div>

            <div id="otpCodeSection" class="hidden">
                <label class="block mb-1 text-gray-700">کد ارسال شده:</label>
                <input type="text" id="otp" name="otp" class="w-full border border-gray-300 p-2 rounded-md"
                    maxlength="6">
            </div>

            <button type="button" onclick="sendOtp()"
                class="w-full bg-blue-600 text-white py-2 rounded-md hover:bg-blue-700 transition">
                ارسال کد
            </button>

            <button type="button" onclick="verifyOtp()"
                class="w-full bg-green-600 text-white py-2 rounded-md hover:bg-green-700 transition hidden"
                id="verifyBtn">
                ورود
            </button>
        </form>
    </section>

    <script>
        const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

        function sendOtp() {
            const mobile = document.getElementById('mobile').value.trim();

            fetch("/send-otp", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                    "X-CSRF-TOKEN": csrfToken
                },
                body: JSON.stringify({ mobile })
            })
                .then(res => res.json())
                .then(data => {
                    const box = document.getElementById('otpResponse');
                    if (data.status === 'sent') {
                        box.textContent = "کد ارسال شد.";
                        box.className = 'text-green-600 text-sm text-center mb-4';
                        document.getElementById('otpCodeSection').classList.remove('hidden');
                        document.getElementById('verifyBtn').classList.remove('hidden');
                    } else {
                        box.textContent = data.msg || "خطا در ارسال کد.";
                        box.className = 'text-red-600 text-sm text-center mb-4';
                    }
                })
                .catch(() => {
                    document.getElementById('otpResponse').textContent = "مشکلی پیش آمد.";
                });
        }

        function verifyOtp() {
            const phone = document.getElementById('phone').value.trim();
            const otp = document.getElementById('otp').value.trim();

            fetch("/verify-otp", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                    "X-CSRF-TOKEN": csrfToken
                },
                body: JSON.stringify({ phone, otp })
            })
                .then(res => res.json())
                .then(data => {
                    if (data.status === 'verified') {
                        window.location.href = data.redirect; // ریدایرکت به داشبورد
                    } else {
                        document.getElementById('otpResponse').textContent = "کد وارد شده صحیح نیست.";
                        document.getElementById('otpResponse').className = "text-red-600 text-sm text-center mb-4";
                    }
                });
        }


    </script>
</body>

</html>