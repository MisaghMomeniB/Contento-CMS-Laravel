<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>داشبورد مدیریت</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
    <link href="https://cdn.fontcdn.ir/Font/Persian/Vazir/Vazir.css" rel="stylesheet">
    <style>
        body {
            font-family: Vazir, sans-serif;
        }
    </style>
</head>
<body class="bg-gray-100" x-data="{ tab: 'home' }">
    <div class="flex h-screen">
        <!-- نوار کناری -->
        <aside class="w-64 bg-blue-800 text-white shadow-md flex flex-col">
            <div class="p-4 border-b border-blue-700">
                <h1 class="text-xl font-bold">داشبورد ادمین</h1>
            </div>
            <nav class="flex-1 overflow-y-auto mt-4">
                <ul>
                    <li class="mb-1">
                        <a href="#" @click.prevent="tab = 'home'" class="block py-2 px-4 hover:bg-blue-700 rounded flex items-center">
                            🏠 <span class="mr-2">صفحه اصلی</span>
                        </a>
                    </li>
                    <li class="mb-1">
                        <a href="#" @click.prevent="tab = 'tickets'" class="block py-2 px-4 hover:bg-blue-700 rounded flex items-center">
                            🎫 <span class="mr-2">تیکت‌های ثبت‌شده</span>
                        </a>
                    </li>
                    <li class="mb-1">
                        <a href="#" @click.prevent="tab = 'invoices'" class="block py-2 px-4 hover:bg-blue-700 rounded flex items-center">
                            🧾 <span class="mr-2">فاکتورهای ثبت‌شده</span>
                        </a>
                    </li>
                    <li class="mb-1">
                        <a href="#" @click.prevent="tab = 'users'" class="block py-2 px-4 hover:bg-blue-700 rounded flex items-center">
                            👥 <span class="mr-2">کاربران</span>
                        </a>
                    </li>
                    <li class="mb-1">
                        <a href="#" @click.prevent="tab = 'settings'" class="block py-2 px-4 hover:bg-blue-700 rounded flex items-center">
                            ⚙️ <span class="mr-2">تنظیمات</span>
                        </a>
                    </li>
                </ul>
                <form action="{{ route('logout') }}" method="POST" class="mt-6 px-4">
                    @csrf
                    <button type="submit" class="w-full bg-red-500 text-white py-2 rounded hover:bg-red-600 flex justify-center items-center">
                        🚪 <span class="mr-2">خروج</span>
                    </button>
                </form>
            </nav>
        </aside>

        <!-- محتوای اصلی -->
        <div class="flex-1 overflow-auto">
            <!-- هدر -->
            <header class="bg-white shadow">
                <div class="flex justify-between items-center p-4">
                    <h2 class="text-lg font-semibold text-gray-800">داشبورد</h2>
                </div>
            </header>

            <!-- محتوای تب‌ها -->
            <main class="p-6 space-y-6">
                <!-- خانه -->
                <div x-show="tab === 'home'" class="bg-white p-6 rounded-xl shadow">
                    <h2 class="text-xl font-bold text-gray-700 mb-4">خوش آمدید!</h2>
                    <p class="text-gray-600">لطفاً یک بخش را از نوار کناری انتخاب کنید.</p>
                </div>

                <!-- کاربران -->
                <div x-show="tab === 'users'" class="bg-white p-6 rounded-xl shadow">
                    <h2 class="text-xl font-bold text-gray-700 mb-4">لیست کاربران</h2>
                    <table class="w-full text-right">
                        <thead class="bg-gray-100 text-gray-700 font-semibold">
                            <tr>
                                <th class="px-4 py-3">#</th>
                                <th class="px-4 py-3">نام</th>
                                <th class="px-4 py-3">موبایل</th>
                                <th class="px-4 py-3">نقش</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                <tr class="border-b hover:bg-gray-50">
                                    <td class="px-4 py-3">{{ $user->id }}</td>
                                    <td class="px-4 py-3">{{ $user->name }}</td>
                                    <td class="px-4 py-3">{{ $user->phone_number }}</td>
                                    <td class="px-4 py-3">{{ $user->role }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <!-- تیکت‌ها -->
                <div x-show="tab === 'tickets'" class="bg-white p-6 rounded-xl shadow">
                    <h2 class="text-xl font-bold text-gray-700 mb-4">تیکت‌ها</h2>
                    <p class="text-gray-600">در اینجا تیکت‌ها نمایش داده می‌شوند...</p>
                </div>

                <!-- فاکتورها -->
                <div x-show="tab === 'invoices'" class="bg-white p-6 rounded-xl shadow">
                    <h2 class="text-xl font-bold text-gray-700 mb-4">فاکتورها</h2>
                    <p class="text-gray-600">در اینجا فاکتورها نمایش داده می‌شوند...</p>
                </div>

                <!-- تنظیمات -->
                <div x-show="tab === 'settings'" class="bg-white p-6 rounded-xl shadow">
                    <h2 class="text-xl font-bold text-gray-700 mb-4">تنظیمات</h2>
                    <p class="text-gray-600">در اینجا تنظیمات قابل ویرایش هستند...</p>
                </div>
            </main>
        </div>
    </div>
    
    <a href="{{ route('payment') }}" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">پرداخت آزمایشی</a>

</body>
</html>
