<!DOCTYPE html>
<html lang="fa" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>در حال بروزرسانی</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/gh/rastikerdar/vazir-font/dist/font-face.css" rel="stylesheet">
    <style>
        body {
            font-family: Vazir, sans-serif;
            background-color: #f8fafc;
        }

        .loader {
            width: 48px;
            height: 48px;
            border: 3px solid #3b82f6;
            border-radius: 50%;
            border-top-color: transparent;
            animation: spin 1s linear infinite;
        }

        @keyframes spin {
            100% {
                transform: rotate(360deg);
            }
        }
    </style>
</head>

<body class="min-h-screen flex flex-col items-center justify-center text-gray-800">
    <div class="text-center p-6 max-w-md">
        <div class="loader mx-auto mb-6"></div>
        <h1 class="text-2xl font-medium mb-3">در حال بروزرسانی</h1>
        <p class="text-gray-600 mb-6">ما در حال بهبود سرویس‌ها هستیم. به زودی بازمی‌گردیم.</p>
        <p class="text-sm text-gray-500">لطفاً کمی بعد مجدداً بررسی کنید.</p>
    </div>
</body>

</html>