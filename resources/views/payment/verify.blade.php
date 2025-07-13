<!DOCTYPE html>
<html lang="fa" dir="rtl">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>تأیید پرداخت</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link
      href="https://cdn.fontcdn.ir/Font/Persian/Vazirmatn/Vazirmatn.css"
      rel="stylesheet"
    />
  </head>

  <body class="flex items-center justify-center min-h-screen bg-gray-50 font-sans">
    <div
      class="bg-white border border-green-200 shadow-xl rounded-2xl p-8 w-full max-w-md text-center animate-fade-in"
    >
      <!-- آیکون موفقیت -->
      <div class="flex justify-center mb-4">
        <svg
          class="w-20 h-20 text-green-500"
          fill="none"
          stroke="currentColor"
          stroke-width="2"
          viewBox="0 0 24 24"
        >
          <path
            stroke-linecap="round"
            stroke-linejoin="round"
            d="M9 12l2 2l4 -4m5 2a9 9 0 11-18 0a9 9 0 0118 0z"
          />
        </svg>
      </div>

      <!-- پیام موفقیت -->
      <h2 class="text-2xl font-extrabold text-green-600 mb-2">
        پرداخت با موفقیت انجام شد
      </h2>
      <p class="text-gray-600 text-sm">
        رسید پرداخت برای شما ثبت گردید. می‌توانید از پنل خود وضعیت فاکتور را بررسی کنید.
      </p>

      <!-- دکمه بازگشت -->
      <div class="mt-6">
        <a
          href="/"
          class="inline-block bg-navy text-white py-2 px-6 rounded hover:bg-gray-800 transition"
        >
          بازگشت به صفحه اصلی
        </a>
        <a href="/"
        class="inline-block bg-navy text-white py-2 px-6 rounded hover:bg-gray-800 transition"
        >
        دانلود فاکتور
        </a>
      </div>
    </div>

    <!-- انیمیشن ساده -->
    <style>
      .animate-fade-in {
        animation: fadeIn 0.8s ease-in-out both;
      }

      @keyframes fadeIn {
        from {
          opacity: 0;
          transform: scale(0.9);
        }
        to {
          opacity: 1;
          transform: scale(1);
        }
      }
    </style>

    <script src="./validate_payment_invoice.js"></script>
  </body>
</html>