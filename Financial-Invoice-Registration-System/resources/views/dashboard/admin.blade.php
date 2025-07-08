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
    </aside>
  </div>

  <!-- لیست کاربران -->
  {{-- <section id="users-section" class="hidden">
    <h1 class="text-2xl font-bold mb-4">لیست مشتریان</h1>
    <table class="min-w-full bg-white shadow rounded">
      <thead class="bg-gray-100">
        <tr class="text-right">
          <th class="py-2 px-4">#</th>
          <th class="py-2 px-4">نام</th>
          <th class="py-2 px-4">ایمیل</th>
        </tr>
      </thead>
      <tbody>
        @foreach($users as $user)
      <tr class="border-b hover:bg-gray-50">
        <td class="py-2 px-4">{{ $loop->iteration }}</td>
        <td class="py-2 px-4">{{ $user->first_name }}</td>
        <td class="py-2 px-4">{{ $user->mobile }}</td>
      </tr>
    @endforeach
      </tbody>
    </table>
  </section> --}}


</body>

</html>