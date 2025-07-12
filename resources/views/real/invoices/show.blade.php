<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>جزئیات فاکتور</title>
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
            <a href="{{ route('real.dashboard') }}" class="block py-2 px-4 rounded hover:bg-indigo-500 transition">داشبورد</a>
            <a href="#" class="block py-2 px-4 rounded hover:bg-indigo-500 transition">پروفایل</a>
            <a href="{{ route('real.invoices.index') }}" class="block py-2 px-4 rounded bg-indigo-500 hover:bg-indigo-600 transition">فاکتورها</a>
            <a href="#" class="block py-2 px-4 rounded hover:bg-indigo-500 transition">تنظیمات</a>
        </nav>
        <form method="POST" action="{{ route('logout') }}" class="p-4 border-t border-indigo-500">
            @csrf
            <button class="w-full py-2 text-sm bg-red-500 hover:bg-red-600 rounded text-white transition">خروج</button>
        </form>
    </aside>

    <!-- Main -->
    <main class="flex-1 p-6">
        <header class="mb-6">
            <h1 class="text-3xl font-bold text-indigo-700">جزئیات فاکتور شماره {{ $invoice->invoice_number }}</h1>
            <p class="text-sm text-gray-600 mt-1">نمایش اطلاعات فاکتور</p>
        </header>

        <section class="bg-white shadow rounded-lg p-6 mb-6">
            <h2 class="text-xl font-semibold text-gray-700 mb-4">اطلاعات فاکتور</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <p class="text-gray-600"><strong>شماره فاکتور:</strong> {{ $invoice->invoice_number }}</p>
                    <p class="text-gray-600"><strong>تاریخ:</strong> {{ $invoice->invoice_date->format('Y-m-d') }}</p>
                    <p class="text-gray-600"><strong>نوع فاکتور:</strong> {{ $invoice->invoice_type }}</p>
                </div>
                <div>
                    <p class="text-gray-600"><strong>مبلغ کل:</strong> {{ number_format($invoice->total_amount) }} تومان</p>
                    <p class="text-gray-600"><strong>تخفیف:</strong> {{ number_format($invoice->discount) }} تومان</p>
                    <p class="text-gray-600"><strong>وضعیت:</strong> {{ $invoice->status }}</p>
                </div>
            </div>
            @if ($invoice->description)
                <p class="text-gray-600 mt-4"><strong>توضیحات:</strong> {{ $invoice->description }}</p>
            @endif
        </section>

        <section class="bg-white shadow rounded-lg p-6">
            <h2 class="text-xl font-semibold text-gray-700 mb-4">آیتم‌های فاکتور</h2>
            @if ($invoice->items->isEmpty())
                <p class="text-gray-600">هیچ آیتمی یافت نشد.</p>
            @else
                <div class="overflow-x-auto">
                    <table class="min-w-full border-collapse">
                        <thead>
                            <tr class="bg-indigo-100">
                                <th class="px-4 py-2 text-right border-b">محصول</th>
                                <th class="px-4 py-2 text-right border-b">دسته‌بندی</th>
                                <th class="px-4 py-2 text-right border-b">قیمت واحد</th>
                                <th class="px-4 py-2 text-right border-b">تخفیف</th>
                                <th class="px-4 py-2 text-right border-b">قیمت کل</th>
                                <th class="px-4 py-2 text-right border-b">توضیحات</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($invoice->items as $item)
                                <tr class="hover:bg-gray-50">
                                    <td class="px-4 py-2 border-b">{{ $item->product_name }}</td>
                                    <td class="px-4 py-2 border-b">{{ $item->category->name ?? 'نامشخص' }}</td>
                                    <td class="px-4 py-2 border-b">{{ number_format($item->product_price) }}</td>
                                    <td class="px-4 py-2 border-b">{{ number_format($item->discount) }}</td>
                                    <td class="px-4 py-2 border-b">{{ number_format($item->total_price) }}</td>
                                    <td class="px-4 py-2 border-b">{{ $item->description ?? '-' }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
        </section>

        <div class="mt-6">
            <a href="{{ route('real.invoices.index') }}" class="bg-indigo-600 text-white px-4 py-2 rounded hover:bg-indigo-700">بازگشت به لیست فاکتورها</a>
        </div>
    </main>
</body>
</html>