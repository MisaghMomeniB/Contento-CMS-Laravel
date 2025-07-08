<!DOCTYPE html>
<html lang="fa" dir="rtl">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>ثبت فاکتور</title>

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
  </head>

  <body class="bg-gray-100 font-sans">
    <!-- نوار بالا -->
    <header class="bg-navy text-white shadow">
      <div
        class="max-w-7xl mx-auto px-4 py-4 flex justify-between items-center flex-wrap gap-6"
      >
        <h1 class="text-xl font-bold">پنل مدیریت</h1>

        <!-- فرم فیلتر -->
        <form id="filterForm" class="flex gap-4 items-end flex-wrap">
          <div class="flex flex-col">
            <label for="fromDate" class="text-sm mb-1">از تاریخ:</label>
            <input
              type="date"
              id="fromDate"
              class="border rounded px-3 py-1 text-black"
            />
          </div>
          <div class="flex flex-col">
            <label for="toDate" class="text-sm mb-1">تا تاریخ:</label>
            <input
              type="date"
              id="toDate"
              class="border rounded px-3 py-1 text-black"
            />
          </div>
          <button
            type="submit"
            class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition"
          >
            فیلتر
          </button>
        </form>

        <!-- فرم جستجو -->
        <form id="searchForm" class="flex gap-2 w-full max-w-sm">
          <input
            type="text"
            name="search"
            id="search"
            placeholder="جستجو در فاکتورها..."
            class="rounded p-2 border border-gray-300 w-full text-black"
          />
          <button
            type="submit"
            class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition"
          >
            جستجو
          </button>
        </form>

        <!-- ناوبری -->
        <nav class="flex gap-4 text-sm mt-4">
          <a href="dash.html" class="text-golden font-bold">داشبورد</a>
          <a
            href="customer/create_customer_haghighi.html"
            class="hover:text-golden"
            >مشتریان حقیقی</a
          >
          <a
            href="customer/create_customer_hoghughi.html"
            class="hover:text-golden"
            >مشتریان حقوقی</a
          >
          <a href="product/create_product.html" class="hover:text-golden"
            >محصولات</a
          >
          <a href="category/create_category.html" class="hover:text-golden"
            >دسته‌بندی‌ها</a
          >
          <a href="invoice/create_invoice.html" class="hover:text-golden"
            >فاکتورها</a
          >
        </nav>
      </div>
    </header>

    <main class="max-w-7xl mx-auto p-6 space-y-8">
      <!-- دکمه نمایش فرم -->
      <div class="flex justify-end">
        <button
          onclick="toggleInvoiceForm()"
          class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700 transition"
        >
          ثبت فاکتور جدید
        </button>
      </div>

      <!-- لیست فاکتورها -->
      <section class="bg-white p-6 rounded shadow border" id="invoice-list">
        <h2 class="text-xl font-bold text-navy mb-4">فاکتورهای ثبت شده</h2>
        <div class="overflow-x-auto">
          <table class="min-w-full text-sm text-right table-auto">
            <thead class="bg-gray-100 font-bold">
              <tr>
                <th class="p-2">فروشنده</th>
                <th class="p-2">محصول</th>
                <th class="p-2">تاریخ</th>
                <th class="p-2">مبلغ</th>
                <th class="p-2">تخفیف</th>
                <th class="p-2">توضیحات</th>
                <th class="p-2">وضعیت پرداخت</th>
                <th class="p-2">وضعیت فاکتور</th>
                <th class="p-2">عملیات</th>
              </tr>
            </thead>
            <tbody>
              <tr class="border-b hover:bg-gray-50">
                <td class="p-2">فروشنده 1</td>
                <td class="p-2">لپتاپ</td>
                <td class="p-2">2025/1/1</td>
                <td class="p-2" dir="ltr">45,000,000</td>
                <td class="p-2">5%</td>
                <td class="p-2">خرید نقدی</td>
                <td class="p-2">
                  <span
                    class="text-xs px-2 py-1 rounded bg-red-100 text-red-600 font-semibold"
                  >
                    پرداخت نشده
                  </span>
                </td>
                <td class="p-2 text-green-600">فعال</td>
                <td class="p-2">
                  <button
                    class="bg-golden text-navy px-3 py-1 rounded hover:shadow transition"
                  >
                    ویرایش
                  </button>
                  <a href="./show-invoice.html"
                    ><button
                      class="bg-blue-300 text-navy px-3 py-1 rounded hover:shadow transition"
                    >
                      نمایش
                    </button>
                  </a>
                </td>
              </tr>
              <tr class="border-b hover:bg-gray-50">
                <td class="p-2">میثاق</td>
                <td class="p-2">لپتاپ</td>
                <td class="p-2" data-jdate="1403/04/07">1403/04/07</td>
                <td class="p-2" dir="ltr">45,000,000</td>
                <td class="p-2">5%</td>
                <td class="p-2">خرید نقدی</td>
                <td class="p-2">
                  <span
                    class="text-xs px-2 py-1 rounded bg-red-100 text-red-600 font-semibold"
                  >
                    پرداخت نشده
                  </span>
                </td>
                <td class="p-2 text-red-400">غیرفعال</td>
                <td class="p-2">
                  <button
                    class="bg-golden text-navy px-3 py-1 rounded hover:shadow transition"
                  >
                    ویرایش
                  </button>
                  <button
                    class="bg-blue-300 text-navy px-3 py-1 rounded hover:shadow transition"
                  >
                    نمایش
                  </button>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </section>

      <!-- فرم ثبت فاکتور -->
      <section
        class="bg-white p-6 rounded shadow border hidden"
        id="invoice-form"
      >
        <h2 class="text-xl font-bold text-navy mb-4">فرم ثبت فاکتور</h2>
        <form method="POST" class="space-y-4">
          <div>
            <label
              for="invoice_date"
              class="block mb-1 text-gray-700 font-medium"
              >تاریخ فاکتور:</label
            >
            <input
              type="text"
              id="invoice_date"
              name="invoice_date"
              autocomplete="off"
              class="datepicker w-full border rounded px-4 py-2 focus:ring-2 focus:ring-golden"
              placeholder="تاریخ را انتخاب کنید"
            />
          </div>

          <div>
            <label for="customers" class="block mb-1 text-gray-700 font-medium"
              >فروشنده:</label
            >
            <select
              id="customers"
              name="customers"
              class="w-full border rounded px-4 py-2 focus:ring-2 focus:ring-golden"
            >
              <option value="1">فروشنده 1</option>
              <option value="2">فروشنده 2</option>
              <option value="3">فروشنده 3</option>
              <option value="4">فروشنده 4</option>
            </select>
          </div>

          <div>
            <label for="products" class="block mb-1 text-gray-700 font-medium"
              >انتخاب محصولات:</label
            >
            <select
              id="products"
              name="products[]"
              multiple
              class="w-full border rounded px-2 py-2"
            ></select>
          </div>

          <div id="selected-products" class="mt-4 space-y-3"></div>

          <div>
            <label for="discount" class="block mb-1 text-gray-700 font-medium"
              >تخفیف (درصد):</label
            >
            <input
              type="number"
              id="discount"
              name="discount"
              placeholder="مثلاً 10"
              class="w-full border rounded px-4 py-2 focus:ring-2 focus:ring-golden"
            />
          </div>

          <div>
            <label
              for="description"
              class="block mb-1 text-gray-700 font-medium"
              >توضیحات:</label
            >
            <textarea
              id="description"
              name="description"
              rows="4"
              class="w-full border rounded px-4 py-2 focus:ring-2 focus:ring-golden resize-y"
            ></textarea>
          </div>

          <div class="flex justify-between">
            <button
              type="submit"
              class="bg-golden text-navy font-semibold px-6 py-2 rounded hover:bg-yellow-400 transition"
            >
              ثبت
            </button>
            <button
              type="button"
              onclick="toggleInvoiceForm()"
              class="bg-gray-300 px-4 py-2 rounded hover:bg-gray-400 transition"
            >
              انصراف
            </button>
          </div>
        </form>
      </section>
    </main>

    <script src="./app.js"></script>
  </body>
</html>