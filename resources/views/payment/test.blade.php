<!DOCTYPE html>
<html lang="fa" dir="rtl">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>فاکتور ثبت سفارش</title>
    <script src="https://cdn.tailwindcss.com"></script>

    <style>
      body {
        font-family: "Arial", sans-serif;
      }
    </style>
  </head>
  <body class="bg-gray-100 p-4 text-sm">
    <div class="max-w-5xl mx-auto bg-white shadow-lg rounded-lg p-6">
      <!-- Header -->
      <div class="flex justify-between items-center mb-6">
        <a href="{{route("payment.verify")}}"><button class="bg-gray-600 text-white px-4 py-2 rounded text-sm">
          پرداخت فاکتور
        </button></a>
        <!-- <img src="https://via.placeholder.com/100" alt="لوگو دیجی‌کالا" class="w-24 h-auto"> -->
      </div>

      <h1 class="text-center text-2xl font-bold mb-6">فاکتور ثبت سفارش</h1>

      <!-- فروشنده و خریدار -->
      <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-6">
        <!-- فروشنده -->
        <div class="border rounded-lg p-4 bg-gray-50">
          <h2 class="font-semibold mb-2">فروشنده</h2>
          <p>نام: دیجی‌کالا</p>
          <p>آدرس: تهران، خیابان اصلی، پلاک 50</p>
          <p>شماره تماس: 02112345678</p>
          <p>شناسه ملی: 1234567890</p>
        </div>
        <!-- خریدار -->
        <div class="border rounded-lg p-4 bg-gray-50">
          <h2 class="font-semibold mb-2">خریدار</h2>
          <p>نام: احمد محمدی</p>
          <p>شماره سفارش: FIIFIPM-01</p>
          <p>تاریخ سفارش: 1404/04/09</p>
          <p>شماره تلفن: 09123456789</p>
          <p>کد رهگیری: PA - 5X - پ-۵-۹۵-۵-۴۵</p>
          <p>وضعیت سفارش: در حال پردازش</p>
        </div>
      </div>

      <!-- آدرس ارسال -->
      <div class="border rounded-lg p-4 bg-gray-50 mb-6">
        <p>
          <strong>آدرس ارسال:</strong> تهران، خیابان ولیعصر، کوچه سوم، پلاک ۱۲
        </p>
      </div>

      <!-- جدول کالاها -->
      <div class="overflow-x-auto mb-6">
        <table class="w-full border border-gray-300 text-right table-auto">
          <thead class="bg-gray-100 font-bold">
            <tr>
              <th class="border border-gray-300 px-4 py-2">شرح کالا و خدمات</th>
              <th class="border border-gray-300 px-4 py-2">شناسه کالا</th>
              <th class="border border-gray-300 px-4 py-2">تعداد</th>
              <th class="border border-gray-300 px-4 py-2">مبلغ (تومان)</th>
              <th class="border border-gray-300 px-4 py-2">تخفیف (تومان)</th>
            </tr>
          </thead>
          <tbody>
            <tr class="hover:bg-gray-50">
              <td class="border px-4 py-2">لپتاپ Dell XPS 13</td>
              <td class="border px-4 py-2">ABC123</td>
              <td class="border px-4 py-2">1</td>
              <td class="border px-4 py-2">25,000,000</td>
              <td class="border px-4 py-2">0</td>
            </tr>
            <tr class="hover:bg-gray-50">
              <td class="border px-4 py-2">موس بیسیم Logitech</td>
              <td class="border px-4 py-2">DEF456</td>
              <td class="border px-4 py-2">2</td>
              <td class="border px-4 py-2">800,000</td>
              <td class="border px-4 py-2">100,000</td>
            </tr>
            <tr class="hover:bg-gray-50">
              <td class="border px-4 py-2">کیبورد مکانیکی</td>
              <td class="border px-4 py-2">GHI789</td>
              <td class="border px-4 py-2">1</td>
              <td class="border px-4 py-2">2,500,000</td>
              <td class="border px-4 py-2">200,000</td>
            </tr>
          </tbody>
          <tfoot class="font-bold bg-gray-50">
            <tr>
              <td colspan="4" class="border px-4 py-2 text-right">جمع کل</td>
              <td class="border px-4 py-2">29,100,000</td>
            </tr>
            <tr>
              <td colspan="4" class="border px-4 py-2 text-right">
                هزینه ارسال
              </td>
              <td class="border px-4 py-2">150,000</td>
            </tr>
            <tr>
              <td colspan="4" class="border px-4 py-2 text-right">
                تخفیف اعمال شده
              </td>
              <td class="text-red-600 border px-4 py-2">40%</td>
            </tr>
            <tr>
              <td
                colspan="4"
                class="border px-4 py-2 text-right text-green-700"
              >
                مبلغ قابل پرداخت
              </td>
              <td class="border px-4 py-2 text-green-700">29,250,000</td>
            </tr>
          </tfoot>
        </table>
      </div>

      <!-- Footer -->
      <div class="text-center text-xs text-gray-700">
        <!-- <img src="https://via.placeholder.com/100" alt="QR Code" class="mx-auto mb-2"> -->
        <p>شماره پیگیری: <strong>C5B22B</strong></p>
        <p>تاریخ صدور: 1404/04/09</p>
        <p>شماره فاکتور: 123456</p>

        <div class="mt-4 border-t pt-4 border-black text-sm">
          <strong>مهر و امضای فروشنده:</strong>
          <div class="mt-2">_________________________</div>
        </div>

        <p class="mt-4">
          با تشکر از شما برای خرید از دیجی‌کالا. در صورت بروز هرگونه مشکل با
          پشتیبانی تماس بگیرید.
        </p>
      </div>
    </div>
  </body>
</html>