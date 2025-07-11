<!DOCTYPE html>
<html lang="fa">
<head>
    <meta charset="UTF-8">
    <title>جزئیات دسته‌بندی</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-6 font-sans">
    <div class="max-w-xl mx-auto bg-white rounded-lg shadow p-6">
        <h2 class="text-2xl font-bold mb-4 text-center">جزئیات دسته‌بندی</h2>

        @if(session('success'))
            <div class="bg-green-100 text-green-800 p-3 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        <div class="mb-4">
            <label class="block font-medium mb-1">نام دسته‌بندی:</label>
            <p class="border-gray-300 rounded p-2 bg-gray-50">{{ $category->name }}</p>
        </div>

        <div class="text-right space-x-2 space-x-reverse">
            <a href="{{ route('admin.categories.edit', $category) }}" class="bg-yellow-600 text-white px-4 py-2 rounded hover:bg-yellow-700">ویرایش</a>
            <form action="{{ route('admin.categories.destroy', $category) }}" method="POST" class="inline-block" onsubmit="return confirm('آیا مطمئن هستید که می‌خواهید این دسته‌بندی را حذف کنید؟');">
                @csrf
                @method('DELETE')
                <button type="submit" class="bg-red-600 text-white px-4 py-2 rounded hover:bg-red-700">حذف</button>
            </form>
            <a href="{{ route('admin.categories.index') }}" class="bg-gray-600 text-white px-4 py-2 rounded hover:bg-gray-700">بازگشت</a>
        </div>
    </div>
</body>
</html>