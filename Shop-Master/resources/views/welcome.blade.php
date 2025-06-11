s<!DOCTYPE html>
<html lang="fa" dir="rtl">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>صفحه فرود سرویس</title>
  <link href="https://fonts.googleapis.com/css2?family=Vazirmatn:wght@700&display=swap" rel="stylesheet" />
  <script src="https://cdn.tailwindcss.com"></script>
  <script>
    tailwind.config = {
      theme: {
        extend: {
          fontFamily: {
            vazir: ['Vazirmatn', 'sans-serif']
          },
          colors: {
            sky: '#87CEEB',
            navy: '#1e2a38'
          }
        }
      },
      darkMode: 'class'
    }
  </script>
  <style>
    * {
      font-family: 'Vazirmatn', sans-serif;
    }
  </style>
</head>

<body class="bg-white text-navy">
  <header class="bg-navy text-white p-6">
    <div class="container mx-auto flex justify-between items-center">
      <h1 class="text-2xl font-bold">ارائه دهنده خدمات دیجیتال</h1>
      <nav class="space-x-4 space-x-reverse">
        <a href="#services" class="hover:text-sky transition">خدمات</a>
        <a href="#about" class="hover:text-sky transition">درباره ما</a>
        <a href="#contact" class="hover:text-sky transition">تماس با ما</a>
      </nav>
    </div>
  </header>

  <section class="bg-sky text-navy text-center py-16 px-4">
    <h2 class="text-4xl font-bold mb-4">به خدمات حرفه‌ای ما خوش آمدید</h2>
    <p class="text-lg mb-6">ما راه‌حل‌های نوین برای کسب‌وکار دیجیتال شما ارائه می‌دهیم.</p>
    <button class="bg-navy text-white px-6 py-2 rounded-xl hover:bg-white hover:text-navy border transition">شروع کنید</button>
  </section>

  <section class="py-12 px-4 container mx-auto" id="services">
    <h3 class="text-3xl font-bold text-center mb-8">خدمات ما</h3>
    <div class="grid md:grid-cols-3 gap-6">
      <div class="bg-white rounded-2xl shadow-md p-6 text-center">
        <h4 class="text-xl font-bold mb-2">طراحی سایت</h4>
        <p>طراحی مدرن و ریسپانسیو برای تمام دستگاه‌ها.</p>
      </div>
      <div class="bg-white rounded-2xl shadow-md p-6 text-center">
        <h4 class="text-xl font-bold mb-2">سئو و بازاریابی</h4>
        <p>افزایش بازدید و بهبود رتبه گوگل.</p>
      </div>
      <div class="bg-white rounded-2xl shadow-md p-6 text-center">
        <h4 class="text-xl font-bold mb-2">مدیریت شبکه‌های اجتماعی</h4>
        <p>تولید محتوا و مدیریت پیج‌های کاری شما.</p>
      </div>
    </div>
  </section>

  <section class="py-12 bg-gray-100 px-4" id="about">
    <div class="container mx-auto grid md:grid-cols-2 gap-8 items-center">
      <div>
        <h3 class="text-3xl font-bold mb-4">درباره ما</h3>
        <p class="text-lg leading-relaxed">ما تیمی متشکل از طراحان، توسعه‌دهندگان و متخصصان بازاریابی هستیم که با هدف کمک به رشد کسب‌وکارهای دیجیتال فعالیت می‌کنیم.</p>
      </div>
      <div>
        <img src="https://via.placeholder.com/500x300" class="rounded-xl" alt="درباره ما">
      </div>
    </div>
  </section>

  <section class="py-12 px-4" id="contact">
    <div class="container mx-auto text-center">
      <h3 class="text-3xl font-bold mb-4">با ما تماس بگیرید</h3>
      <p class="mb-6">برای مشاوره رایگان و سفارش خدمات، با ما در ارتباط باشید.</p>
      <button class="bg-navy text-white px-6 py-3 rounded-2xl hover:bg-sky transition">فرم تماس</button>
    </div>
  </section>

  <footer class="bg-navy text-white text-center py-6">
    <p>© ۲۰۲۵ همه حقوق محفوظ است.</p>
  </footer>
</body>

</html>