<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <title>ثبت تیکت جدید</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.fontcdn.ir/Font/Persian/Vazir/Vazir.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Vazir', sans-serif;
        }
    </style>
</head>
<body class="bg-blue-50 py-10 px-4">
    <div class="max-w-2xl mx-auto bg-white p-8 rounded-xl shadow-md">
        <h2 class="text-2xl font-bold text-blue-800 mb-6 text-center">🎫 ثبت تیکت جدید</h2>

        @if (session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                <ul class="list-disc list-inside">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('tickets.store') }}" method="POST" enctype="multipart/form-data" class="space-y-5">
            @csrf

            <div>
                <label class="block text-gray-700 font-medium mb-1">عنوان تیکت</label>
                <input type="text" name="title" placeholder="مثلاً مشکل در ثبت سفارش" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-500">
            </div>

            <div>
                <label class="block text-gray-700 font-medium mb-1">دسته‌بندی</label>
                <select name="category" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-500">
                    <option value="">-- انتخاب کنید --</option>
                    <option value="پشتیبانی فنی">پشتیبانی فنی</option>
                    <option value="مالی">مالی</option>
                    <option value="سایر">سایر</option>
                </select>
            </div>

            <div>
                <label class="block text-gray-700 font-medium mb-1">پیام</label>
                <textarea name="message" rows="5" placeholder="توضیحات کامل درباره مشکل خود را بنویسید..." class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-500"></textarea>
            </div>

            <div>
                <label class="block text-gray-700 font-medium mb-1">ضمیمه (اختیاری)</label>
                <input type="file" name="attachment" class="w-full text-gray-600 file:mr-4 file:py-2 file:px-4 file:rounded file:border-0 file:text-white file:bg-blue-600 hover:file:bg-blue-700">
            </div>

            <div class="flex justify-end">
                <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded-lg hover:bg-blue-700 transition">ارسال تیکت</button>
            </div>
        </form>
    </div>
</body>
</html>
