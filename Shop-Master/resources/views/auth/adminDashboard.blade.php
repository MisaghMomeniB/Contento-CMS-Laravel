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
                <h1 class="text-xl font-bold">داشبورد ادمین</h1>
            </div>
            <nav class="mt-4">
                <ul>
                    <li classp="mb-1">
                        <a href="?section=home" class="block py-2 px-4 hover:bg-blue-700 flex items-center">
                            🏠 <span class="mr-2">صفحه اصلی</span>
                        </a>
                    </li>
                    <li class="mb-1">
                        <a href="?section=tickets" class="block py-2 px-4 hover:bg-blue-700 flex items-center">
                            🎫 <span class="mr-2">تیکت‌های ثبت‌شده</span>
                        </a>
                    </li>
                    <li class="mb-1">
                        <a href="?section=invoices" class="block py-2 px-4 hover:bg-blue-700 flex items-center">
                            🧾 <span class="mr-2">فاکتورهای ثبت‌شده</span>
                        </a>
                    </li>
                    <li class="mb-1">
                        <a href="?section=users" class="block py-2 px-4 hover:bg-blue-700 flex items-center">
                            👥 <span class="mr-2">کاربران</span>
                        </a>
                    </li>
                    <li class="mb-1">
                        <a href="?section=settings" class="block py-2 px-4 hover:bg-blue-700 flex items-center">
                            ⚙️ <span class="mr-2">تنظیمات</span>
                        </a>
                    </li>
                </ul>
                <form action="{{ route('logout') }}" method="POST" class="mt-6 px-4">
                    @csrf
                    <button type="submit" class="w-full bg-red-500 text-white py-2 rounded hover:bg-red-600">
                        خروج
                    </button>
                </form>
            </nav>
        </aside>

        <!-- محتوای اصلی -->
        <div class="flex-1 overflow-auto">
            <header class="bg-white shadow-sm">
                <div class="flex justify-between items-center p-4">
                    <h2 class="text-lg font-semibold">داشبورد</h2>
                </div>
            </header>

            <main class="p-6">
                @if ($section === 'users')
                    <h2 class="text-xl font-bold mb-4">لیست کاربران</h2>
                    <table class="w-full bg-white shadow rounded-xl text-right">
                        <thead class="bg-gray-100">
                            <tr>
                                <th class="px-4 py-2">#</th>
                                <th class="px-4 py-2">نام</th>
                                <th class="px-4 py-2">شماره همراه</th>
                                <th class="px-4 py-2">نقش</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                <tr class="border-b">
                                    <td class="px-4 py-2">{{ $user->id }}</td>
                                    <td class="px-4 py-2">{{ $user->name }}</td>
                                    <td class="px-4 py-2">{{ $user->phone_number }}</td>
                                    <td class="px-4 py-2">{{ $user->role }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                @elseif ($section === 'tickets')
                    <h2 class="text-xl font-bold mb-4">تیکت‌ها</h2>
                    <p>اینجا تیکت‌ها نمایش داده می‌شوند...</p>

                @elseif ($section === 'invoices')
                    <h2 class="text-xl font-bold mb-4">فاکتورها</h2>
                    <p>اینجا فاکتورها نمایش داده می‌شوند...</p>

                @elseif ($section === 'settings')
                    <h2 class="text-xl font-bold mb-4">تنظیمات</h2>
                    <p>اینجا تنظیمات قابل ویرایش هستند...</p>

                @else
                    <h2 class="text-xl font-bold mb-4">خوش آمدید!</h2>
                    <p>لطفاً از منوی کناری یک گزینه را انتخاب کنید.</p>
                @endif
            </main>
        </div>
    </div>
</body>
</html>