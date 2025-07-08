<!DOCTYPE html>
<html lang="fa" dir="rtl">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>پنل ادمین</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 text-gray-800">

  <div class="flex h-screen">

    <!-- Sidebar -->
    <aside class="w-64 bg-blue-800 shadow-lg">
      <div class="p-6 text-xl text-white font-bold">پنل مدیریت</div>
      <nav class="p-4 space-y-2">
        <a href="{{ route('users.index') }}" class="text-white block px-4 py-2 rounded hover:bg-blue-600">مشتریان</a>
        <a href="#" class="text-white block px-4 py-2 rounded hover:bg-blue-600">محصولات</a>
        <a href="#" class="text-white block px-4 py-2 rounded hover:bg-blue-600">دسته بندی ها</a>
        <a href="#" class="text-white block px-4 py-2 rounded hover:bg-blue-600">فاکتور ها</a>
      </nav>

      <form id="logout-form" action="{{ route('logout') }}" method="POST" class="mt-6 px-4">
        @csrf
        <button type="submit"
          class="w-full bg-red-600 hover:bg-red-700 text-white font-semibold py-2 rounded transition duration-200">
          خروج
        </button>
      </form>
    </aside>
  </div>


</body>

</html>