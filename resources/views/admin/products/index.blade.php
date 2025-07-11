<!DOCTYPE html>
<html lang="fa">
<head>
    <meta charset="UTF-8">
    <title>لیست محصولات</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-8">

    <div class="max-w-6xl mx-auto bg-white p-6 rounded shadow">
        <h1 class="text-2xl font-bold mb-6">لیست محصولات</h1>

        <table class="w-full table-auto border-collapse">
            <thead>
                <tr class="bg-gray-200 text-right">
                    <th class="px-4 py-2 border">#</th>
                    <th class="px-4 py-2 border">نام محصول</th>
                    <th class="px-4 py-2 border">دسته‌بندی</th>
                    <th class="px-4 py-2 border">قیمت</th>
                    <th class="px-4 py-2 border">کد محصول</th>
                    <th class="px-4 py-2 border">تاریخ ایجاد</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($products as $product)
                    <tr>
                        <td class="px-4 py-2 border">{{ $loop->iteration }}</td>
                        <td class="px-4 py-2 border">{{ $product->name }}</td>
                        <td class="px-4 py-2 border">{{ $product->category->name }}</td>
                        <td class="px-4 py-2 border">{{ number_format($product->price) }} تومان</td>
                        <td class="px-4 py-2 border">{{ $product->product_code }}</td>
                        {{-- <td class="px-4 py-2 border">{{ jdate($product->created_at)->format('Y/m/d') }}</td> --}}
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center py-4">محصولی یافت نشد.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

</body>
</html>
