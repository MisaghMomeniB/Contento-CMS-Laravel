<!DOCTYPE html>
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
    <section class="py-12 px-4 bg-white" id="login">
  <div class="container mx-auto max-w-md">
    <h3 class="text-3xl font-bold text-center mb-6">ورود</h3>
    <form class="bg-gray-100 p-6 rounded-2xl shadow-md">
      <div class="mb-4">
        <label class="block mb-1">رمز عبور</label>
        <input type="password" class="w-full p-3 rounded-xl border" required>
      </div>
      <div class="mb-4">
        <label class="block mb-1">رمز عبور</label>
        <input type="password" class="w-full p-3 rounded-xl border" required>
      </div>
      <button type="submit" class="w-full bg-navy text-white py-2 rounded-xl hover:bg-sky transition">
        ورود
      </button>
      <br>
      <br>
        <a class="px-auto text-blue-600 hover:underline" href="{{route('showRegister')}}">ثبت نام</a>
    </form>
  </div>
</section>

</body>

</html>