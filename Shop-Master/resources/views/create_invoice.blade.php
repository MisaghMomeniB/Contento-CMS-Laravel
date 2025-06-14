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
                    <li class="mb-1"><a href="#" @click.prevent="tab = 'home'" class="block py-2 px-4 hover:bg-blue-700">🏠 صفحه اصلی</a></li>
                    <li class="mb-1"><a href="#" @click.prevent="tab = 'tickets'" class="block py-2 px-4 hover:bg-blue-700">🎫 تیکت‌ها</a></li>
                    <li class="mb-1"><a href="#" @click.prevent="tab = 'create-invoice'" class="block py-2 px-4 hover:bg-blue-700">🧾 ثبت فاکتور</a></li>
                    <li class="mb-1"><a href="#" @click.prevent="tab = 'settings'" class="block py-2 px-4 hover:bg-blue-700">⚙️ تنظیمات</a></li>
                    <li class="mb-1">
                        <form action="{{ route('logout') }}" method="POST">@csrf
                            <button type="submit" class="w-full bg-red-500 py-2 px-4 rounded hover:bg-red-600">🚪 خروج</button>
                        </form>
                    </li>
                </ul>
            </nav>
        </aside>

        <!-- محتوای اصلی -->
        <div class="flex-1 overflow-auto">
            <header class="bg-white shadow-sm">
                <div class="p-4">
                    <h2 class="text-lg font-semibold text-gray-800" x-text="tab === 'home' ? 'صفحه اصلی' : tab === 'tickets' ? 'تیکت‌ها' : tab === 'create-invoice' ? 'ثبت فاکتور' : 'تنظیمات' "></h2>
                </div>
            </header>

            <!-- صفحه اصلی -->
            <div x-show="tab === 'home'" class="p-6">
                <div class="bg-white p-6 rounded shadow">
                    <h3 class="text-xl font-bold text-blue-700 mb-4">خوش آمدید!</h3>
                    <p class="text-gray-600">لطفاً یک گزینه از منوی سمت راست انتخاب کنید.</p>
                </div>
            </div>

            <!-- تیکت‌ها -->
            <div x-show="tab === 'tickets'" class="p-6">
                <div class="bg-white p-6 rounded shadow">
                    <h3 class="text-xl font-bold text-blue-700 mb-4">لیست تیکت‌ها</h3>
                    <p class="text-gray-600">در اینجا تیکت‌ها نمایش داده می‌شوند.</p>
                </div>
            </div>

            <!-- فرم ثبت فاکتور -->
            <div x-show="tab === 'create-invoice'" class="p-6">
                <div class="max-w-2xl mx-auto bg-white p-6 rounded-xl shadow">
                    <h2 class="text-xl font-bold text-blue-700 mb-6 text-center">🧾 ثبت فاکتور جدید</h2>

                    @if (session('success'))
                        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                            {{ session('success') }}
                        </div>
                    @endif

                    <form action="{{ route('createinvoice') }}" method="POST" class="space-y-4">
                        @csrf

                        <!-- اگر یوزر به یک store متصل است -->
                       <select name="store_id" class="...">
    @foreach ($stores as $store)
        <option value="{{ $store->id }}">{{ $store->name }}</option>
    @endforeach
</select>

                        <div>
                            <label class="block text-gray-700 font-medium mb-1">مبلغ (تومان)</label>
                            <input type="number" name="amount" class="w-full border border-gray-300 rounded px-4 py-2 focus:ring-2 focus:ring-blue-400" placeholder="مثلاً ۵۰۰۰۰۰">
                        </div>

                        <div>
                            <label class="block text-gray-700 font-medium mb-1">توضیحات</label>
                            <textarea name="description" rows="3" class="w-full border border-gray-300 rounded px-4 py-2 focus:ring-2 focus:ring-blue-400" placeholder="توضیحاتی در مورد فاکتور..."></textarea>
                        </div>

                        <div class="flex items-center">
                            <input type="checkbox" name="is_paid" value="1" class="ml-2">
                            <label class="text-gray-700">پرداخت شده</label>
                        </div>

                        <div class="flex justify-end">
                            <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded hover:bg-blue-700">ثبت فاکتور</button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- تنظیمات -->
            <div x-show="tab === 'settings'" class="p-6">
                <div class="bg-white p-6 rounded shadow">
                    <h3 class="text-xl font-bold text-blue-700 mb-4">تنظیمات</h3>
                    <p class="text-gray-600">در اینجا تنظیمات شما قرار خواهند گرفت.</p>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
