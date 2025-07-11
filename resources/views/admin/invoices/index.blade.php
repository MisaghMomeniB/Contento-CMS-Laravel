<!DOCTYPE html>
<html lang="fa" dir="rtl">

<head>
    <meta charset="UTF-8" />
    <title>لیست فاکتورها</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 p-6">
    <div class="max-w-6xl mx-auto bg-white p-6 rounded shadow mt-10">
        <h2 class="text-2xl font-bold mb-4">لیست فاکتورها</h2>

        @if (session('success'))
            <div class="bg-green-100 text-green-700 p-3 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        <table class="w-full table-auto border border-gray-300 text-sm">
            <thead class="bg-gray-100">
                <tr class="text-right">
                    <th class="p-2 border">شناسه</th>
                    <th class="p-2 border">شماره فاکتور</th>
                    <th class="p-2 border">تاریخ</th>
                    <th class="p-2 border">کاربر</th>
                    <th class="p-2 border">نوع</th>
                    <th class="p-2 border">تخفیف</th>
                    <th class="p-2 border">وضعیت</th>
                    <th class="p-2 border">توضیحات</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($invoices as $invoice)
                    <tr>
                        <td class="p-2 border">{{ $invoice->id }}</td>
                        <td class="p-2 border">{{ $invoice->invoice_number }}</td>
                        <td class="p-2 border">{{ $invoice->invoice_date }}</td>
                        <td class="p-2 border">{{ $invoice->user->mobile ?? '-' }}</td>
                        <td class="p-2 border">{{ $invoice->invoice_type }}</td>
                        <td class="p-2 border">{{ number_format($invoice->discount) }} تومان</td>
                        <td class="p-2 border">
                            <span
                                class="{{ $invoice->status === 'پرداخت شده' ? 'text-green-600' : 'text-red-600' }}">
                                {{ $invoice->status }}
                            </span>
                        </td>
                        <td class="p-2 border">{{ $invoice->description ?? '-' }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="8" class="text-center py-4">فاکتوری یافت نشد.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</body>

</html>
