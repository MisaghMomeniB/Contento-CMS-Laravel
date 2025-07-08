<!DOCTYPE html>
<html lang="fa" dir="rtl">

<head>
  <meta charset="UTF-8" />
  <title>لیست مشتریان</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <script src="https://cdn.tailwindcss.com"></script>
  <script>
    tailwind.config = {
      theme: {
        extend: {
          colors: {
            navy: "#1e293b",
            golden: "#facc15",
          },
          fontFamily: {
            sans: ["Vazirmatn", "sans-serif"],
          },
        },
      },
    };
  </script>
  <style>
    .form-popup {
      display: none;
      position: fixed;
      top: 30%;
      left: 50%;
      transform: translate(-50%, -30%);
      background-color: #fff;
      padding: 20px;
      border: 2px solid #ccc;
      border-radius: 10px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
      z-index: 9999;
      text-align: center;
      width: 320px;
      max-width: 90vw;
    }

    .form-popup button {
      margin: 10px 5px;
      padding: 10px 20px;
      cursor: pointer;
    }
  </style>
</head>

<body class="bg-gray-100 font-sans p-6">
  <!-- نوار بالا -->
  <header class="bg-navy text-white shadow mb-6">
    <div class="max-w-7xl mx-auto px-6 py-4 flex justify-between items-center">
      <h1 class="text-xl font-bold select-none">سیستم مدیریت</h1>
      <nav class="flex gap-5 text-sm items-center">
        <a href="dash.html" class="hover:text-golden transition">داشبورد</a>
        <a href="create_customer_haghighi.html" class="hover:text-golden transition">مشتریان</a>
        <a href="create_product.html" class="hover:text-golden transition">محصولات</a>
        <a href="create_category.html" class="hover:text-golden transition">دسته‌بندی‌ها</a>
        <a href="create_invoice.html" class="hover:text-golden transition">فاکتورها</a>

        <form method="POST" action="{{ route('logout') }}" class="m-0 p-0">
          @csrf
          <button type="submit"
            class="bg-red-600 text-white px-3 py-1 rounded hover:bg-red-700 transition text-sm whitespace-nowrap">
            خروج
          </button>
        </form>
      </nav>
    </div>
  </header>

  <!-- محتوای صفحه -->
  <div class="max-w-6xl mx-auto bg-white p-6 rounded shadow border">
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between mb-6 gap-4">
      <h1 class="text-2xl font-bold text-navy">لیست مشتریان</h1>
      <button onclick="showForm()"
        class="bg-blue-600 text-white px-5 py-2 rounded hover:bg-blue-700 transition whitespace-nowrap">
        ثبت مشتری
      </button>
    </div>

    <!-- فرم پاپ‌آپ انتخاب نوع مشتری -->
    <div class="form-popup" id="myForm">
      <p class="mb-5 font-bold text-lg">به کدام صفحه می‌خواهید بروید؟</p>
      <button onclick="goToPage('create_hoghughi.html')"
        class="bg-green-600 text-white px-6 py-2 rounded hover:bg-green-700 transition w-full mb-3">
        ثبت مشتری حقوقی
      </button>
      <button onclick="goToPage('create_haghighi.html')"
        class="bg-yellow-500 text-white px-6 py-2 rounded hover:bg-yellow-600 transition w-full mb-3">
        ثبت مشتری حقیقی
      </button>
      <button onclick="closeForm()"
        class="bg-gray-400 text-white px-6 py-2 rounded hover:bg-gray-500 transition w-full">
        انصراف
      </button>
    </div>

    <!-- فیلتر -->
    <div class="mb-6 flex flex-col sm:flex-row items-center gap-4">
      <label for="statusFilter" class="text-sm font-medium text-gray-700 whitespace-nowrap">فیلتر بر اساس مشتری:</label>
      <select id="statusFilter" class="border rounded px-3 py-2 text-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-400">
        <option value="all">همه</option>
        <option value="hoghughi">حقوقی</option>
        <option value="haghighi">حقیقی</option>
      </select>
    </div>

    <!-- جدول -->
    <div id="boxToRemove" class="overflow-x-auto">
      <table class="min-w-full text-sm text-right table-auto border border-gray-300 rounded">
        <thead class="bg-gray-100 text-gray-700 font-semibold">
          <tr>
            <th class="p-3 border border-gray-300">#</th>
            <th class="p-3 border border-gray-300">نام مشتری</th>
            <th class="p-3 border border-gray-300">شرکت / فروشگاه</th>
            <th class="p-3 border border-gray-300">نوع مشتری</th>
            <th class="p-3 border border-gray-300">شماره تماس</th>
            <th class="p-3 border border-gray-300">عملیات</th>
          </tr>
        </thead>
        <tbody class="text-gray-800">
          <tr class="border-b hover:bg-gray-50" data-status="haghighi">
            <td class="p-3 border border-gray-300">1</td>
            <td class="p-3 border border-gray-300">میثاق مومنی</td>
            <td class="p-3 border border-gray-300">آی برند</td>
            <td class="p-3 border border-gray-300">
              <span class="px-2 py-1 rounded text-green-700 bg-green-100 text-xs">حقیقی</span>
            </td>
            <td class="p-3 border border-gray-300">09123456789</td>
            <td class="p-3 border border-gray-300 flex flex-wrap gap-2 justify-end">
              <button class="bg-golden text-navy px-3 py-1 rounded hover:shadow transition whitespace-nowrap">ویرایش</button>
              <button class="delete-btn bg-red-500 text-white px-3 py-1 rounded hover:shadow transition whitespace-nowrap">حذف</button>
              <button class="bg-blue-300 text-navy px-3 py-1 rounded hover:shadow transition whitespace-nowrap">جزئیات</button>
            </td>
          </tr>

          <tr class="border-b hover:bg-gray-50" data-status="hoghughi">
            <td class="p-3 border border-gray-300">2</td>
            <td class="p-3 border border-gray-300">شرکت توسعه‌گران</td>
            <td class="p-3 border border-gray-300">توسعه‌گران</td>
            <td class="p-3 border border-gray-300">
              <span class="px-2 py-1 rounded text-blue-700 bg-blue-100 text-xs">حقوقی</span>
            </td>
            <td class="p-3 border border-gray-300">02188887777</td>
            <td class="p-3 border border-gray-300 flex flex-wrap gap-2 justify-end">
              <button class="bg-golden text-navy px-3 py-1 rounded hover:shadow transition whitespace-nowrap">ویرایش</button>
              <button class="delete-btn bg-red-500 text-white px-3 py-1 rounded hover:shadow transition whitespace-nowrap">حذف</button>
              <button class="bg-blue-300 text-navy px-3 py-1 rounded hover:shadow transition whitespace-nowrap">جزئیات</button>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>

  <!-- اسکریپت -->
  <script>
    function showForm() {
      document.getElementById("myForm").style.display = "block";
    }

    function closeForm() {
      document.getElementById("myForm").style.display = "none";
    }

    function goToPage(pageUrl) {
      window.location.href = pageUrl;
    }

    // بستن فرم با کلیک بیرون از آن
    window.addEventListener("click", function (e) {
      const form = document.getElementById("myForm");
      const trigger = document.querySelector("button[onclick='showForm()']");
      if (form.style.display === "block" && !form.contains(e.target) && e.target !== trigger) {
        closeForm();
      }
    });

    // حذف با delegation
    document.addEventListener("click", function (e) {
      if (e.target.classList.contains("delete-btn")) {
        const confirmed = confirm("آیا از تصمیم خود مطمئن هستید؟");
        if (confirmed) {
          const row = e.target.closest("tr");
          if (row) row.remove();
        }
      }
    });

    // فیلتر جدول
    document.getElementById("statusFilter").addEventListener("change", function () {
      const selected = this.value;
      const rows = document.querySelectorAll("tbody tr");

      rows.forEach(function (row) {
        const status = row.getAttribute("data-status");
        row.style.display = (selected === "all" || status === selected) ? "" : "none";
      });
    });
  </script>
</body>

</html>
