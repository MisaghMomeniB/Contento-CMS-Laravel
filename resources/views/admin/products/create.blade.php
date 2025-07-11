<!DOCTYPE html>
<html lang="fa">

<head>
    <meta charset="UTF-8">
    <title>ایجاد محصول جدید</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 p-8">

    <div class="max-w-2xl mx-auto bg-white p-6 rounded shadow">
        <h1 class="text-2xl font-bold mb-6">ثبت محصول جدید</h1>

        @if ($errors->any())
            <div class="mb-4 p-4 bg-red-100 text-red-700 rounded">
                <ul class="list-disc pl-5">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('admin.products.store') }}" method="POST">
            @csrf

            <div class="mb-4">
                <label for="name" class="block mb-1 font-medium">نام محصول</label>
                <input type="text" name="name" id="name" class="w-full border px-3 py-2 rounded"
                    value="{{ old('name') }}">
            </div>

            <div class="mb-4">
                <label for="category_id" class="block mb-1 font-medium">دسته‌بندی</label>
                <select name="category_id" id="category_id" class="w-full border px-3 py-2 rounded">
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-4">
                <label for="price" class="block mb-1 font-medium">قیمت (تومان)</label>
                <input type="number" name="price" id="price" step="0.01" class="w-full border px-3 py-2 rounded"
                    value="{{ old('price') }}">
            </div>

            <div class="mb-4">
                <label for="product_code" class="block mb-1 font-medium">کد محصول</label>
                <input type="text" name="product_code" id="product_code" class="w-full border px-3 py-2 rounded"
                    value="{{ old('product_code') }}">
            </div>

            <div class="flex justify-end">
                <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">ثبت
                    محصول</button>
                <a href="{{route("admin.dashboard")}}"> <p
                        class="bg-blue-600 ml-2 text-white px-4 py-2 rounded hover:bg-blue-700">بازگشت</p>
                </a>
            </div>
        </form>
    </div>

</body>

</html>