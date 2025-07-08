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

<div id="customer-list" class="hidden bg-white p-6 rounded-xl shadow-lg mt-6 border border-gray-200">
  <!-- اینجا AJAX محتوا رو وارد می‌کنه -->
  <div class="text-center text-gray-400">در حال بارگذاری...</div>
</div>


    <script>
      document.addEventListener("DOMContentLoaded", function () {
        const btnCustomers = document.getElementById("btn-customers");
        const customerList = document.getElementById("customer-list");

        let isLoaded = false;

        btnCustomers.addEventListener("click", function (e) {
          e.preventDefault();

          // اگر لیست قبلاً بارگذاری نشده، AJAX بفرست
          if (!isLoaded) {
            fetch("{{ route('admin.users.list') }}")
              .then(response => response.text())
              .then(html => {
                customerList.innerHTML = html;
                customerList.classList.remove("hidden");
                isLoaded = true;
              })
              .catch(error => {
                customerList.innerHTML = "<p class='text-red-500'>خطا در بارگذاری مشتریان.</p>";
                customerList.classList.remove("hidden");
              });
          } else {
            customerList.classList.toggle("hidden");
          }
        });
      });
    </script>


</body>

</html>