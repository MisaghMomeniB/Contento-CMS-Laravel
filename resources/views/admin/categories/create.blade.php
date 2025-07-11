<!DOCTYPE html>
<html lang="fa">
<head>
    <meta charset="UTF-8">
    <title>ایجاد دسته‌بندی</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-6 font-sans">

    <div class="max-w-xl mx-auto bg-white rounded-lg shadow p-6">
        <h2 class="text-2xl font-bold mb-4 text-center">افزودن دسته‌بندی جدید</h2>

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

        <form action="{{ route('admin.categories.store') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label for="name" class="block font-medium mb-1">نام دسته‌بندی:</label>
                <input type="text" name="name" id="name" class="w-full border-gray-300 rounded p-2 focus:ring focus:ring-blue-200" required>
            </div>

            <div class="text-right">
                <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">ثبت</button>
                <a class="bg-blue-600 text-white p-2 px-4 py-2 mt-2 rounded hover:bg-blue-700" href="{{route("admin.dashboard")}}">بازگشت</a>
            </div>
        </form>
    </div>

</body>
</html>
