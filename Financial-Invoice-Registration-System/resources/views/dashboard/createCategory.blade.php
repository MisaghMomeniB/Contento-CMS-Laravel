<!DOCTYPE html>
<html lang="fa" dir="rtl">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>مدیریت دسته‌بندی</title>
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
    <link href="https://cdn.fontcdn.ir/Font/Persian/Vazirmatn/Vazirmatn.css" rel="stylesheet" />
  </head>

  <body class="bg-gray-100 font-sans">
    <!-- نوار بالا -->
    <header class="bg-navy text-white shadow">
      <div class="max-w-7xl mx-auto px-4 py-4 flex justify-between items-center">
        <h1 class="text-xl font-bold">سیستم مدیریت</h1>
        <nav class="flex gap-4 text-sm">
          <a href="dash.html" class="hover:text-golden">داشبورد</a>
          <a href="create_customer_haghighi.html" class="hover:text-golden">مشتریان حقیقی</a>
          <a href="create_customer_hoghughi.html" class="hover:text-golden">مشتریان حقوقی</a>
          <a href="create_product.html" class="hover:text-golden">محصولات</a>
          <a href="create_category.html" class="hover:text-golden">دسته‌بندی‌ها</a>
          <a href="create_invoice.html" class="hover:text-golden">فاکتورها</a>
        </nav>
      </div>
    </header>

    <!-- محتوای اصلی -->
    <div class="max-w-6xl mx-auto p-6 space-y-8">
      <!-- دکمه ثبت دسته‌بندی جدید -->
      <div class="flex justify-end">
        <button onclick="toggleForm()" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700 transition">
          ثبت دسته‌بندی جدید
        </button>
      </div>

      <!-- جدول دسته‌بندی‌ها -->
      <section id="category-list" class="bg-white p-6 rounded shadow border">
        <h2 class="text-xl font-bold text-navy mb-4">دسته‌بندی‌های ثبت شده</h2>
        <table class="w-full text-sm text-right table-auto">
          <thead class="bg-gray-100 font-bold">
            <tr>
              <th class="p-2">نام دسته‌بندی</th>
              <th class="p-2">عملیات</th>
            </tr>
          </thead>
          <tbody>
            <tr class="border-b">
              <td class="p-2">کالای برقی</td>
              <td class="p-2 flex gap-2">
                <button class="bg-golden text-navy px-3 py-1 rounded">ویرایش</button>
                <button class="bg-red-500 text-white px-3 py-1 rounded">حذف</button>
              </td>
            </tr>
          </tbody>
        </table>
      </section>

      <!-- فرم ثبت دسته‌بندی -->
      <section id="category-form" class="bg-white p-6 rounded shadow border hidden">
        <h2 class="text-xl font-bold text-navy mb-4">فرم ثبت دسته‌بندی</h2>
        <form onsubmit="return validateForm()">
          <div class="mb-4">
            <label for="category" class="block mb-1 text-gray-700 font-medium">نام دسته‌بندی:</label>
            <input
              type="text"
              id="category"
              name="category"
              class="w-full border border-gray-300 rounded px-4 py-2 focus:ring-2 focus:ring-golden"
            />
          </div>
          <div class="flex justify-between">
            <button type="submit" class="bg-golden text-navy font-semibold px-6 py-2 rounded hover:bg-yellow-400 transition">
              ثبت
            </button>
            <button type="button" onclick="toggleForm()" class="bg-gray-300 px-4 py-2 rounded hover:bg-gray-400 transition">
              انصراف
            </button>
          </div>
        </form>
      </section>
    </div>

    <!-- اسکریپت‌ها -->
    <script>
      function toggleForm() {
        const list = document.getElementById("category-list");
        const form = document.getElementById("category-form");
        list.classList.toggle("hidden");
        form.classList.toggle("hidden");
      }

      function validateForm() {
        const input = document.getElementById("category");
        if (!input.value.trim()) {
          alert("لطفاً نام دسته‌بندی را وارد کنید.");
          return false;
        }
        return true;
      }

      document.addEventListener("DOMContentLoaded", function () {
        const links = document.querySelectorAll("nav a");
        const currentPath = window.location.pathname;
        links.forEach((link) => {
          const linkPath = link.getAttribute("href");
          if (currentPath.endsWith(linkPath)) {
            link.classList.add("text-red-400", "font-bold");
          }
        });
      });
    </script>
  </body>
</html>