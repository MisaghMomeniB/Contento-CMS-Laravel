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
<body class="bg-gray-200" x-data="{ tab: 'home' }">
    <div class="flex h-screen">
        <!-- نوار کناری -->
        <aside class="w-64 bg-blue-800 text-white shadow-md">
            <div class="p-4 border-b border-blue-700">
                <h1 class="text-xl font-bold">پنل مدیریت</h1>
            </div>
            <nav class="mt-4">
                <ul>
                    <li class="mb-1">
                        <a href="#" @click.prevent="tab = 'home'" class="block py-2 px-4 hover:bg-blue-700 flex items-center">
                            🏠 <span class="ml-2">صفحه اصلی</span>
                        </a>
                    </li>
                    <li class="mb-1">
                        <a href="#" @click.prevent="tab = 'tickets'" class="block py-2 px-4 hover:bg-blue-700 flex items-center">
                            🎫 <span class="ml-2">تیکت های شما</span>
                        </a>
                    </li>
                    <li class="mb-1">
                        <a href="#" @click.prevent="tab = 'create-invoice'" class="block py-2 px-4 hover:bg-blue-700 flex items-center">
                            🧾 <span class="ml-2">ثبت فاکتور</span>
                        </a>
                    </li>
                    <li class="mb-1">
                        <a href="#" @click.prevent="tab = 'settings'" class="block py-2 px-4 hover:bg-blue-700 flex items-center">
                            ⚙️ <span class="ml-2">تنظیمات</span>
                        </a>
                    </li>
                    <li class="mb-1">
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="w-full py-2 px-4 hover:bg-red-600 flex items-center bg-red-500 rounded text-white">
                                🚪 <span class="ml-2">خروج</span>
                            </button>
                        </form>
                    </li>
                </ul>
            </nav>
        </aside>

        <!-- محتوای اصلی -->
        <div class="flex-1 overflow-auto">
            <header class="bg-white shadow-sm">
                <div class="flex justify-between items-center p-4">
                    <h2 class="text-lg font-semibold" x-text="tab === 'home' ? 'صفحه اصلی' : tab === 'tickets' ? 'تیکت‌ها' : tab === 'create-invoice' ? 'ثبت فاکتور' : tab === 'settings' ? 'تنظیمات' : '' "></h2>
                </div>
            </header>

            <!-- صفحه اصلی -->
            <div x-show="tab === 'home'" class="p-6">
                <div class="bg-white p-6 rounded shadow">
                    <h3 class="text-xl font-bold text-blue-700 mb-4">خوش آمدید!</h3>
                    <p class="text-gray-600">لطفاً یک گزینه از نوار کناری را انتخاب کنید.</p>
                </div>
            </div>

            <!-- تیکت‌ها -->
            <div x-show="tab === 'tickets'" class="p-6">
                <div class="bg-white p-6 rounded shadow">
                    <h3 class="text-xl font-bold text-blue-700 mb-4">لیست تیکت‌ها</h3>
                    <p class="text-gray-600">در اینجا تیکت‌های شما نمایش داده می‌شوند.</p>
                </div>
            </div>

            <!-- فرم ثبت فاکتور -->
            <div x-show="tab === 'create-invoice'" class="p-6">
                <div class="max-w-2xl mx-auto bg-white p-6 rounded-xl shadow">
                    <h2 class="text-xl font-bold text-blue-700 mb-6 text-center">🧾 ثبت فاکتور جدید</h2>
                    <form action="{{ route('createinvoice') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
                        @csrf

                        <div>
                            <label class="block text-gray-700 font-medium mb-1">تاریخ فاکتور</label>
                            <input type="date" name="date" class="w-full border border-gray-300 rounded px-4 py-2 focus:ring-2 focus:ring-blue-400">
                        </div>

                        <div>
                            <label class="block text-gray-700 font-medium mb-1">نام فروشگاه</label>
                            <input type="text" name="store_name" placeholder="مثلاً فروشگاه دیجی‌کالا" class="w-full border border-gray-300 rounded px-4 py-2 focus:ring-2 focus:ring-blue-400">
                        </div>

                        <div>
                            <label class="block text-gray-700 font-medium mb-1">مبلغ (تومان)</label>
                            <input type="number" name="price" placeholder="مثلاً ۵۰۰۰۰۰" class="w-full border border-gray-300 rounded px-4 py-2 focus:ring-2 focus:ring-blue-400">
                        </div>

                        <div>
                            <label class="block text-gray-700 font-medium mb-1">دسته‌بندی</label>
                            <select name="category" class="w-full border border-gray-300 rounded px-4 py-2 focus:ring-2 focus:ring-blue-400">
                                <option value="">-- انتخاب کنید --</option>
                                <option value="خوراکی">خوراکی</option>
                                <option value="لوازم‌التحریر">لوازم‌التحریر</option>
                                <option value="حمل و نقل">حمل و نقل</option>
                                <option value="سایر">سایر</option>
                            </select>
                        </div>

                        <div>
                            <label class="block text-gray-700 font-medium mb-1">توضیحات</label>
                            <textarea name="description" rows="3" placeholder="توضیحات اضافه..." class="w-full border border-gray-300 rounded px-4 py-2 focus:ring-2 focus:ring-blue-400"></textarea>
                        </div>

                        <div>
                            <label class="block text-gray-700 font-medium mb-1">آپلود فایل فاکتور</label>
                            <input type="file" name="invoice_file" class="w-full text-gray-600 file:mr-4 file:py-2 file:px-4 file:rounded file:border-0 file:text-white file:bg-blue-600 hover:file:bg-blue-700">
                        </div>

                        <div class="flex justify-end">
                            <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded hover:bg-blue-700 transition">ثبت فاکتور</button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- تنظیمات -->
            <div x-show="tab === 'settings'" class="p-6">
                <div class="bg-white p-6 rounded shadow">
                    <h3 class="text-xl font-bold text-blue-700 mb-4">تنظیمات</h3>
                    <p class="text-gray-600">در اینجا می‌توانید تنظیمات را تغییر دهید.</p>
                </div>
            </div>
        </div>
    </div>
</body>
</html>