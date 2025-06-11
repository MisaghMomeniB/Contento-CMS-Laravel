<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>داشبورد مدیریت</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.fontcdn.ir/Font/Persian/Vazir/Vazir.css" rel="stylesheet">
    <style>
        body {
            font-family: Vazir, sans-serif;
        }
    </style>
</head>
<body class="bg-gray-200">
    <div class="flex h-screen">
        <!-- نوار کناری -->
        <aside class="w-64 bg-blue-800 text-white shadow-md">
            <div class="p-4 border-b border-blue-700">
                <h1 class="text-xl font-bold">پنل مدیریت</h1>
            </div>
            <nav class="mt-4">
                <ul>
                    <li class="mb-1">
                        <a href="#" class="block py-2 px-4 hover:bg-blue-700 flex items-center">
                            <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                            </svg>
                            صفحه اصلی
                        </a>
                    </li>
                    <li class="mb-1">
                        <a href="#" class="block py-2 px-4 hover:bg-blue-700 flex items-center">
                            <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path>
                            </svg>
                            تیکت ها
                        </a>
                         <li class="mb-1">
                        <a href="#" class="block py-2 px-4 hover:bg-blue-700 flex items-center">
                            <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path>
                            </svg>
                            ثبت فاکتور
                        </a>
                    </li>
                    <li class="mb-1">
                        <a href="#" class="block py-2 px-4 hover:bg-blue-700 flex items-center">
                            <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            </svg>
                            تنظیمات
                        </a>
                    </li>
                </ul>
            </nav>
        </aside>

        <!-- محتوای اصلی -->
        <div class="flex-1 overflow-auto">
            <!-- هدر -->
            <header class="bg-white shadow-sm">
                <div class="flex justify-between items-center p-4">
                    <h2 class="text-lg font-semibold">تیکت های شما</h2>
                    <div class="flex items-center space-x-4 space-x-reverse">
                        <div class="relative">
                            <input type="text" placeholder="جستجو..." class="pr-10 pl-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                            <svg class="w-5 h-5 absolute left-3 top-2.5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                            </svg>
                        </div>
                        <div class="flex items-center">
                        </div>
                    </div>
                </div>
            </header>

</body>
</html>