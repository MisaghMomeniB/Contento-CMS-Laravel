<!DOCTYPE html>
<html lang="fa">
<head>
    <meta charset="UTF-8">
    <title>ویرایش دسته‌بندی</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-6 font-sans">
    <div class="max-w-xl mx-auto bg-white rounded-lg shadow p-6">
        <h2 class="text-2xl font-bold mb-4 text-center">ویرایش دسته‌بندی</h2>

 @if(session('success'))
            <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-6 rounded">
                {{ session('success') }}
            </div>
        @endif

        @if($errors->any())
            <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-6 rounded">
                <ul class="list-disc list-inside">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('admin.categories.update', $category) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-4">
                <label for="name" class="block font-medium mb-1">نام دسته‌بندی:</label>
                <input type="text" name="name" id="name" value="{{ old('name', $category->name) }}" class="w-full border-gray-300 rounded p-2 focus:ring focus:ring-blue-200" required>
            </div>

            <div class="text-right space-x-2 space-x-reverse">
                <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">ثبت تغییرات</button>
                <a href="{{ route('admin.categories.index') }}" class="bg-gray-600 text-white px-4 py-2 rounded hover:bg-gray-700">بازگشت</a>
            </div>
        </form>
    </div>
</body>
</html>