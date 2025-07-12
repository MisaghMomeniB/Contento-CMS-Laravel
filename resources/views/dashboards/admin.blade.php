<script src="https://cdn.tailwindcss.com"></script>

<body class="bg-gray-800 font-sans">

    <nav class="bg-gray-800 shadow-md py-4 px-6 flex justify-between items-center">
        <h1 class="text-white text-2xl font-bold text-gray-800">داشبورد ادمین</h1>
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="bg-red-600 text-white px-4 py-2 rounded hover:bg-red-700 transition">
                خروج
            </button>
        </form>
    </nav>

    <!-- Navbar -->
    <nav class="bg-gray-800 shadow px-6 py-4 flex justify-between items-center">
        <div class="flex gap-4">
            <a href="{{route("admin.products.create")}}" class="text-white bg-blue-600 rounded p-4 justify-between hover:bg-blue-700">ثبت محصول</a>
            <a href="{{route("admin.invoices.create")}}" class="text-white bg-yellow-600 rounded p-4 justify-between hover:bg-yellow-700">ثبت فاکتور</a>
            <a href="{{route("admin.categories.create")}}" class="text-white bg-green-600 rounded p-4 justify-between hover:bg-green-700">ثبت دسته بندی</a>
        </div>
    </nav>

    <main class="max-w-7xl mx-auto p-6 mt-8">
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-8">
            <div class="bg-gray-300 rounded-lg shadow-lg p-6 transition transform hover:scale-105">
                <h2 class="text-lg font-semibold text-gray-700 mb-3">تعداد مشتریان حقیقی</h2>
                <p class="text-4xl font-extrabold text-blue-600">{{ $realCount }}</p>
            </div>

            <div class="bg-gray-300 rounded-lg shadow-lg p-6 transition transform hover:scale-105">
                <h2 class="text-lg font-semibold text-gray-700 mb-3">تعداد مشتریان حقوقی</h2>
                <p class="text-4xl font-extrabold text-green-600">{{ $legalCount }}</p>
            </div>

            {{-- اگر خواستی باز فعال کن --}}
            {{-- <div class="bg-white rounded-lg shadow-lg p-6 transition transform hover:scale-105">
                <h2 class="text-lg font-semibold text-gray-700 mb-3">تعداد محصولات</h2>
                <p class="text-4xl font-extrabold text-purple-600">{{ $productCount }}</p>
            </div> --}}
        </div>

        {{-- بخش‌های بعدی رو هر وقت خواستی می‌تونیم اضافه کنیم --}}
    </main>
</body>