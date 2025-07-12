<!DOCTYPE html>
<html lang="fa">
<head>
    <meta charset="UTF-8">
    <title>ویرایش محصول</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-6 font-sans">
    <div class="max-w-xl mx-auto bg-white rounded-lg shadow p-6">
        <h2 class="text-2xl font-bold mb-4 text-center">ویرایش محصول</h2>

        @if(session('success'))
            <div class="bg-green-100 text-green-800 p-3 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        @if($errors->any())
            <div class="bg-red-100 text-red-800 p-3 rounded mb-4">
                <ul class="list-disc list-inside">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('admin.products.update', $product) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-4">
                <label for="name" class="block font-medium mb-1">نام محصول:</label>
                <input type="text" name="name" id="name" value="{{ old('name', $product->name) }}" class="w-full border-gray-300 rounded p-2 focus:ring focus:ring-blue-200" required>
            </div>
            <div class="mb-4">
                <label for="category_id" class="block font-medium mb-1">دسته‌بندی:</label>
                <select name="category_id" id="category_id" class="w-full border-gray-300 rounded p-2 focus:ring focus:ring-blue-200" required>
                    <option value="">انتخاب دسته‌بندی</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}" {{ old('category_id', $product->category_id) == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-4">
                <label for="price" class="block font-medium mb-1">قیمت (تومان):</label>
                <input type="number" name="price" id="price" value="{{ old('price', $product->price) }}" class="w-full border-gray-300 rounded p-2 focus:ring focus:ring-blue-200" required>
            </div>
            <div class="mb-4">
                <label for="description" class="block font-medium mb-1">توضیحات:</label>
                <textarea name="description" id="description" class="w-full border-gray-300 rounded p-2 focus:ring focus:ring-blue-200">{{ old('description', $product->description) }}</textarea>
            </div>

            <div class="text-right space-x-2 space-x-reverse">
                <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">ثبت تغییرات</button>
                <a href="{{ route('admin.products.index') }}" class="bg-gray-600 text-white px-4 py-2 rounded hover:bg-gray-700">بازگشت</a>
            </div>
        </form>
    </div>
</body>
</html>