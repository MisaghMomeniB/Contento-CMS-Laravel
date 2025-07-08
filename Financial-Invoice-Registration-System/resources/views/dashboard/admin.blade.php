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
        <a href="#" id="btn-customers" class="text-white block px-4 py-2 rounded hover:bg-blue-600">مشتریان</a>
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

    <!-- لیست مشتریان -->
    <main id="users-section" class="hidden flex-1 overflow-y-auto p-6">
      <section class="bg-white rounded shadow max-w-5xl mx-auto p-6">
        <h1 class="text-2xl font-bold mb-4 text-right">لیست مشتریان</h1>
        <table class="min-w-full bg-white shadow rounded text-right">
          <thead class="bg-gray-100">
            <tr>
              <th class="py-2 px-4">#</th>
              <th class="py-2 px-4">نام</th>
              <th class="py-2 px-4">نام خانوادگی</th>
              <th class="py-2 px-4">موبایل</th>
            </tr>
          </thead>
          <tbody>
            @foreach($users as $user)
        <tr class="border-b hover:bg-gray-50">
          <td class="py-2 px-4">{{ $loop->iteration }}</td>
          <td class="py-2 px-4">{{ $user->first_name }}</td>
          <td class="py-2 px-4">{{ $user->last_name }}</td>
          <td class="py-2 px-4">{{ $user->mobile }}</td>
        </tr>
      @endforeach
          </tbody>
        </table>
      </section>
    </main>

  </div>

  <script>
    document.addEventListener('DOMContentLoaded', function () {
      const btnCustomers = document.getElementById('btn-customers');
      const usersSection = document.getElementById('users-section');

      btnCustomers.addEventListener('click', function (e) {
        e.preventDefault();

        usersSection.classList.toggle('hidden');
      });
    });
  </script>

</body>

</html>