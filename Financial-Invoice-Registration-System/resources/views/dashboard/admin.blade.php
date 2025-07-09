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
        <ul class="space-y-2">

          <li class="group relative">
            <a href="#" class="transition text-white block px-4 py-2 rounded hover:bg-blue-600">مشتریان</a>
            <ul
              class="absolute right-full top-0 mt-2 hidden group-hover:block bg-white text-gray-800 rounded shadow-lg min-w-[180px] space-y-1 z-10">
              <li><a href="{{route("admin.users.index")}}" class="transition block px-4 py-2 hover:bg-gray-100">لیست
                  مشتریان</a></li>
              <li><a href="#" class="transition block px-4 py-2 hover:bg-gray-100">ثبت مشتری حقیقی</a></li>
              <li><a href="#" class="transition block px-4 py-2 hover:bg-gray-100">ثبت مشتری حقوقی</a></li>
            </ul>
          </li>

          <li class="group relative">
            <a href="#" class="transition text-white block px-4 py-2 rounded hover:bg-blue-600">محصولات</a>
            <ul
              class="absolute right-full top-0 mt-2 hidden group-hover:block bg-white text-gray-800 rounded shadow-lg min-w-[180px] space-y-1 z-10">
              <li><a href="#" class="transition block px-4 py-2 hover:bg-gray-100">لیست محصولات</a></li>
              <li><a href="#" class="transition block px-4 py-2 hover:bg-gray-100">ثبت محصول</a></li>
            </ul>
          </li>

          <li class="group relative">
            <a href="#" class="transition text-white block px-4 py-2 rounded hover:bg-blue-600">دسته‌بندی‌ها</a>
            <ul
              class="absolute right-full top-0 mt-2 hidden group-hover:block bg-white text-gray-800 rounded shadow-lg min-w-[180px] space-y-1 z-10">
              <li><a href="#" class="block px-4 py-2 transition hover:bg-gray-100">ساخت دسته‌بندی</a></li>
            </ul>
          </li>

          <li class="group relative">
            <a href="#" class="text-white block px-4 py-2 transition rounded hover:bg-blue-600">فاکتورها</a>
            <ul
              class="absolute right-full top-0 mt-2 hidden group-hover:block bg-white text-gray-800 rounded shadow-lg min-w-[180px] space-y-1 z-10">
              <li><a href="#" class="block px-4 py-2 transition hover:bg-gray-100">لیست فاکتور ها</a></li>
              <li><a href="#" class="block px-4 py-2 transition hover:bg-gray-100">ثبت فاکتور</a></li>
            </ul>
          </li>

        </ul>
      </nav>

      <form id="logout-form" action="{{ route('logout') }}" method="POST" class="mt-6 px-4">
        @csrf
        <button type="submit"
          class="w-full bg-red-600 hover:bg-red-700 text-white font-semibold py-2 rounded transition duration-200">
          خروج
        </button>
      </form>
    </aside>


</body>

</html>