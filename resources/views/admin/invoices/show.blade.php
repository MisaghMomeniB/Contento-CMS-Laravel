<!DOCTYPE html>
<html lang="fa">

<head>
    <meta charset="UTF-8">
    <title>جزئیات فاکتور</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 p-6 font-sans">
    <div class="max-w-4xl mx-auto bg-white rounded-lg shadow p-6">
        <h2 class="text-2xl font-bold mb-4 text-center">جزئیات فاکتور</h2>

        @if(session('success'))
            <div class="bg-green-100 text-green-800 p-3 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        <div class="mb-4">
            <label class="block font-medium mb-1">شماره فاکتور:</label>
            <p class="border-gray-300 rounded p-2 bg-gray-50">{{ $invoice->invoice_number }}</p>
        </div>
        <div class="mb-4">
            <label class="block font-medium mb-1">تاریخ فاکتور:</label>
            <p class="border-gray-300 rounded p-2 bg-gray-50">{{ $invoice->invoice_date }}</p>
        </div>
        <div class="mb-4">
            <label class="block font-medium mb-1">کاربر:</label>
            <p class="border-gray-300 rounded p-2 bg-gray-50">{{ $invoice->user->name }}</p>
        </div>
        <div class="mb-4">
            <label class="block font-medium mb-1">نوع فاکتور:</label>
            <p class="border-gray-300 rounded p-2 bg-gray-50">{{ $invoice->invoice_type }}</p>
        </div>
        <div class="mb-4">
            <label class="block font-medium mb-1">وضعیت:</label>
            <p class="border-gray-300 rounded p-2 bg-gray-50">{{ $invoice->status }}</p>
        </div>
        <div class="mb-4">
            <label class="block font-medium mb-1">تخفیف:</label>
            <p class="border-gray-300 rounded p-2 bg-gray-50">{{ number_format($invoice->discount) }} تومان</p>
        </div>
        <div class="mb-4">
            <label class="block font-medium mb-1">توضیحات:</label>
            <p class="border-gray-300 rounded p-2 bg-gray-50">{{ $invoice->description ?? 'بدون توضیحات' }}</p>
        </div>

        <div class="mb-4">
            <h3 class="text-lg font-bold mb-2">آیتم‌های فاکتور</h3>
            <table class="w-full table-auto border-collapse">
                <thead>
                    <tr class="bg-gray-200">
                        <th class="p-3 text-right">محصول</th>
                        <th class="p-3 text-right">دسته‌بندی</th>
                        <th class="p-3 text-right">قیمت واحد</th>
                        <th class="p-3 text-right">تخفیف</th>
                        <th class="p-3 text-right">قیمت کل</th>
                        <th class="p-3 text-right">توضیحات</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($invoice->items as $item)
                        <tr class="border-b">
                            <td class="p-3">{{ $item->product_name }}</td>
                            <td class="p-3">{{ $item->category->name }}</td>
                            <td class="p-3">{{ number_format($item->product_price) }} تومان</td>
                            <td class="p-3">{{ number_format($item->discount) }} تومان</td>
                            <td class="p-3">{{ number_format($item->total_price) }} تومان</td>
                            <td class="p-3">{{ $item->description ?? 'بدون توضیحات' }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="text-right space-x-2 space-x-reverse">
            <a href="{{ route('admin.invoices.edit', $invoice) }}"
                class="bg-yellow-600 text-white px-4 py-2 rounded hover:bg-yellow-700">ویرایش</a>
            <form action="{{ route('admin.invoices.destroy', $invoice) }}" method="POST" class="inline-block"
                onsubmit="return confirm('آیا مطمئن هستید که می‌خواهید این فاکتور را حذف کنید؟');">
                @csrf
                @method('DELETE')
                <button type="submit" class="bg-red-600 text-white px-4 py-2 rounded hover:bg-red-700">حذف</button>
            </form>
            <a href="{{ route('admin.invoices.index') }}"
                class="bg-gray-600 text-white px-4 py-2 rounded hover:bg-gray-700">بازگشت</a>
        </div>
    </div>
</body>

</html>