<!DOCTYPE html>
<html lang="fa" dir="rtl">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>ثبت محصول</title>

    <!-- Tailwind CSS -->
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

    <!-- بخش اصلی -->
    <div class="max-w-7xl mx-auto p-6 space-y-8">
      <!-- دکمه ثبت محصول جدید -->
      <div class="flex justify-end">
        <button onclick="toggleForm()" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700 transition">
          افزودن محصول جدید
        </button>
      </div>

      <!-- لیست محصولات -->
      <section id="products" class="bg-white p-6 rounded shadow border">
        <h2 class="text-xl font-bold text-navy mb-4">محصولات ثبت شده</h2>
        <table class="w-full text-sm text-right table-auto">
          <thead class="bg-gray-100 font-bold">
            <tr>
              <th class="p-2">نام محصول</th>
              <th class="p-2">قیمت</th>
              <th class="p-2">دسته‌بندی</th>
              <th class="p-2">عملیات</th>
            </tr>
          </thead>
          <tbody>
            <tr class="border-b">
              <td class="p-2">لپتاپ ایسوس</td>
              <td class="p-2">45,000,000</td>
              <td class="p-2">کالای دیجیتال</td>
              <td class="p-2 flex gap-2">
                <button class="bg-golden text-navy px-3 py-1 rounded">ویرایش</button>
                <button class="bg-red-500 text-white px-3 py-1 rounded">حذف</button>
              </td>
            </tr>
          </tbody>
        </table>
      </section>

      <!-- فرم ثبت محصول -->
      <section id="productForm" class="bg-white p-6 rounded shadow border hidden">
        <h2 class="text-xl font-bold text-navy mb-4">فرم ثبت محصول جدید</h2>

        <form action="#" method="POST" class="space-y-4">
          <div>
            <label for="product_name" class="block mb-1 text-gray-700 font-medium">نام محصول:</label>
            <input
              type="text"
              name="product_name"
              id="product_name"
              required
              class="w-full border border-gray-300 rounded px-4 py-2 focus:ring-2 focus:ring-golden"
            />
          </div>

          <div>
            <label for="product_price" class="block mb-1 text-gray-700 font-medium">قیمت محصول (تومان):</label>
            <input
              type="number"
              name="product_price"
              id="product_price"
              min="0"
              required
              class="w-full border border-gray-300 rounded px-4 py-2 focus:ring-2 focus:ring-golden"
            />
          </div>

          <div>
            <label for="product_category" class="block mb-1 text-gray-700 font-medium">دسته‌بندی:</label>
            <select
              name="product_category"
              id="product_category"
              required
              class="w-full border border-gray-300 rounded px-4 py-2 focus:ring-2 focus:ring-golden"
            >
              <optgroup label="کالای خانگی">
                <option value="washing_machine">لباسشویی</option>
                <option value="laptop_home">لپتاپ</option>
              </optgroup>
              <optgroup label="کالای برقی">
                <option value="iron">اتو</option>
                <option value="laptop_electronic">لپ تاپ</option>
              </optgroup>
            </select>
          </div>

          <div class="flex justify-between">
            <button type="submit" class="bg-golden text-navy font-semibold px-6 py-2 rounded hover:bg-yellow-400 transition">ثبت</button>
            <button type="button" onclick="toggleForm()" class="bg-gray-300 px-4 py-2 rounded hover:bg-gray-400 transition">انصراف</button>
          </div>
        </form>
      </section>
    </div>
        <form method="POST" action="{{ route('logout') }}" class="m-0 p-0">
          @csrf
          <button type="submit"
            class="bg-red-600 text-white px-3 py-1 rounded hover:bg-red-700 transition text-sm whitespace-nowrap">
            خروج
          </button>
        </form>


    <!-- اسکریپت‌ها -->
    <script>
      function toggleForm() {
        const form = document.getElementById("productForm");
        const table = document.getElementById("products");
        form.classList.toggle("hidden");
        table.classList.toggle("hidden");
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