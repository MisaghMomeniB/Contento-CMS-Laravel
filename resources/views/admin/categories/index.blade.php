<!DOCTYPE html>
<html lang="fa">
<head>
    <meta charset="UTF-8">
    <title>لیست دسته‌بندی‌ها</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-6 font-sans">
    <div class="max-w-4xl mx-auto bg-white rounded-lg shadow p-6">
        <h2 class="text-2xl font-bold mb-4 text-center">لیست دسته‌بندی‌ها</h2>

        @if(session('success'))
            <div class="bg-green-100 text-green-800 p-3 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        @if(session('error'))
            <div class="bg-red-100 text-red-800 p-3 rounded mb-4">
                {{ session('error') }}
            </div>
        @endif

        <div class="mb-4">
            <a href="{{ route('admin.categories.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">افزودن دسته‌بندی جدید</a>
        </div>

        @if($categories->isEmpty())
            <p class="text-gray-600 text-center">هیچ دسته‌بندی‌ای یافت نشد.</p>
        @else
            <table class="w-full table-auto border-collapse">
                <thead>
                    <tr class="bg-gray-200">
                        <th class="p-3 text-right">نام دسته‌بندی</th>
                        <th class="p-3 text-right">عملیات</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($categories as $category)
                        <tr class="border-b">
                            <td class="p-3">{{ $category->name }}</td>
                            <td class="p-3 flex justify-end space-x-2 space-x-reverse">
                                <a href="{{ route('admin.categories.show', $category) }}" class="bg-green-600 text-white px-3 py-1 rounded hover:bg-green-700">مشاهده</a>
                                <a href="{{ route('admin.categories.edit', $category) }}" class="bg-yellow-600 text-white px-3 py-1 rounded hover:bg-yellow-700">ویرایش</a>
                                <form action="{{ route('admin.categories.destroy', $category) }}" method="POST" onsubmit="return confirm('آیا مطمئن هستید که می‌خواهید این دسته‌بندی را حذف کنید؟');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="bg-red-600 text-white px-3 py-1 rounded hover:bg-red-700">حذف</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="mt-4">
                {{ $categories->links() }}
            </div>
        @endif

        <div class="mt-4">
            <a href="{{ route('admin.dashboard') }}" class="bg-gray-600 text-white px-4 py-2 rounded hover:bg-gray-700">بازگشت به داشبورد</a>
        </div>
    </div>
</body>
</html>