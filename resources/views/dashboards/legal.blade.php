<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>داشبورد حقوقی</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body {
            font-family: "Vazirmatn", sans-serif;
        }
    </style>
</head>
<body class="bg-gradient-to-tr from-indigo-50 to-blue-100 min-h-screen flex">
    <!-- Sidebar -->
    <aside class="w-64 bg-indigo-600 text-white flex flex-col shadow-lg">
        <div class="p-6 border-b border-indigo-500">
            <h2 class="text-2xl font-bold">پنل مدیریتی</h2>
            <p class="text-sm text-indigo-200 mt-1">{{ auth()->user()->type }}</p>
        </div>
        <nav class="flex-1 p-4 space-y-3">
            <a href="{{ route('legal.dashboard') }}" class="block py-2 px-4 rounded bg-indigo-500 hover:bg-indigo-600 transition">داشبورد</a>
            <a href="#" class="block py-2 px-4 rounded hover:bg-indigo-500 transition">پروفایل</a>
            <a href="{{ route('legal.invoices.index') }}" class="block py-2 px-4 rounded hover:bg-indigo-500 transition">فاکتورها</a>
            <a href="#" class="block py-2 px-4 rounded hover:bg-indigo-500 transition">تنظیمات</a>
        </nav>
        <form method="POST" action="{{ route('logout') }}" class="p-4 border-t border-indigo-500">
            @csrf
            <button class="w-full py-2 text-sm bg-red-500 hover:bg-red-600 rounded text-white transition">خروج</button>
        </form>
    </aside>

    <!-- Main -->
    <main class="flex-1 p-6">
        <!-- Header -->
        <header class="mb-6">
            <h1 class="text-3xl font-bold text-indigo-700">سلام {{ auth()->user()->first_name ?? 'کاربر' }} 👋</h1>
            <p class="text-sm text-gray-600 mt-1">خوش آمدید</p>
        </header>

        <!-- Invoices Table -->
        <section class="bg-white shadow rounded-lg p-6 mb-6">
            <h2 class="text-xl font-semibold text-gray-700 mb-4">لیست فاکتورهای شما</h2>
            @if ($invoices->isEmpty())
                <p class="text-gray-600">هیچ فاکتوری یافت نشد.</p>
            @else
                <div class="overflow-x-auto">
                    <table class="min-w-full border-collapse">
                        <thead>
                            <tr class="bg-indigo-100">
                                <th class="px-4 py-2 text-right border-b">شماره فاکتور</th>
                                <th class="px-4 py-2 text-right border-b">تاریخ</th>
                                <th class="px-4 py-2 text-right border-b">نوع فاکتور</th>
                                <th class="px-4 py-2 text-right border-b">مبلغ کل (تومان)</th>
                                <th class="px-4 py-2 text-right border-b">تخفیف</th>
                                <th class="px-4 py-2 text-right border-b">وضعیت</th>
                                <th class="px-4 py-2 text-right border-b">عملیات</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($invoices as $invoice)
                                <tr class="hover:bg-gray-50">
                                    <td class="px-4 py-2 border-b">{{ $invoice->invoice_number }}</td>
                                    <td class="px-4 py-2 border-b">{{ \Carbon\Carbon::parse($invoice->invoice_date)->format('Y-m-d') }}</td>
                                    <td class="px-4 py-2 border-b">{{ $invoice->invoice_type }}</td>
                                    <td class="px-4 py-2 border-b">{{ number_format($invoice->total_amount) }}</td>
                                    <td class="px-4 py-2 border-b">{{ number_format($invoice->discount) }}</td>
                                    <td class="px-4 py-2 border-b">{{ $invoice->status }}</td>
                                    <td class="px-4 py-2 border-b">
                                        <a href="{{ route('legal.invoices.show', $invoice->id) }}" class="text-blue-600 hover:underline">نمایش</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
        </section>

        <!-- Stats Cards -->
        <section class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
            <div class="bg-white shadow rounded-lg p-5 border-r-4 border-green-400">
                <h3 class="text-gray-700 font-semibold">تعداد فاکتورها</h3>
                <p class="text-2xl font-bold mt-2 text-green-500">{{ $invoices->count() }}</p>
            </div>
            <div class="bg-white shadow rounded-lg p-5 border-r-4 border-yellow-400">
                <h3 class="text-gray-700 font-semibold">مبلغ کل</h3>
                <p class="text-2xl font-bold mt-2 text-yellow-500">{{ number_format($invoices->sum('total_amount')) }} تومان</p>
            </div>
            <div class="bg-white shadow rounded-lg p-5 border-r-4 border-blue-400">
                <h3 class="text-gray-700 font-semibold">وضعیت فعال</h3>
                <p class="text-xl mt-2 text-blue-500">فعال</p>
            </div>
        </section>
    </main>
</body>
</html>