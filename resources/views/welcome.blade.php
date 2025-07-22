<!DOCTYPE html>
<html lang="fa">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>تقسیم صفحه با Tailwind</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Vazirmatn:wght@100..900&display=swap" rel="stylesheet">
</head>

<style>
    body {
        font-family: "Vazirmatn", sans-serif;
    }
</style>

<body class="h-screen m-0 p-0">


<div class="flex h-full">

    <!-- نیمه چپ -->
    <div class="w-1/3 bg-blue-600 text-white flex items-center justify-center">
        <h2 class="text-2xl font-bold">نیمه چپ</h2>
    </div>

    <!-- نیمه راست -->
    <div class="w-2/3 bg-white p-6 overflow-auto">

        <!-- جستجوی محصولات -->
        <div class="mb-6 flex justify-end">
            <input type="text" placeholder="... جستجوی محصولات"
                   class="w-[350px] px-4 py-2 text-right rounded-md border border-gray-300 focus:outline-none focus:ring-2 transition focus:ring-blue-400" />
        </div>

        <!-- کارت‌ها -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-3">

            <!-- کارت -->
            <div class="bg-white rounded-lg shadow-md overflow-hidden transition-transform hover:scale-[1.02]">
                <img src="https://dkstatics-public.digikala.com/digikala-products/2cf0f972e5a665231a9116b9dca534425e3b9d29_1641642219.jpg?x-oss-process=image/resize,m_lfit,h_300,w_300/format,webp/quality,q_80"
                     alt="محصول" class="w-full h-auto object-cover">
                <div class="p-4 group">
                    <h3 class="text-lg font-semibold text-gray-800">OH AJ12</h3>
                    <p class="text-gray-600 mt-2 group-hover:text-red-600 transition-colors">۲۰٬۰۰۰٬۰۰۰ تومان</p>
                    <p class="text-gray-600 mt-2 group-hover:text-red-600 transition-colors">دسته بندی : صندلی اداری
                        - گیمینگ</p>

                </div>
            </div>

            <!-- کارت -->
            <div class="bg-white rounded-lg shadow-md overflow-hidden transition-transform hover:scale-[1.02]">
                <img src="https://dkstatics-public.digikala.com/digikala-products/3c7bba7d22b8a8725c329f6457aa230ce02c94f3_1744120492.jpg?x-oss-process=image/resize,m_lfit,h_300,w_300/format,webp/quality,q_80"
                     alt="محصول" class="w-full h-auto object-cover">
                <div class="p-4 group">
                    <h3 class="text-lg font-semibold text-gray-800">OH P321</h3>
                    <p class="text-gray-600 mt-2 group-hover:text-red-600 transition-colors">۲۰٬۰۰۰٬۰۰۰ تومان</p>
                    <p class="text-gray-600 mt-2 group-hover:text-red-600 transition-colors">دسته بندی : صندلی اداری
                        - گیمینگ</p>

                </div>
            </div>

            <!-- کارت -->
            <div class="bg-white rounded-lg shadow-md overflow-hidden transition-transform hover:scale-[1.02]">
                <img src="https://dkstatics-public.digikala.com/digikala-products/882681.jpg?x-oss-process=image/resize,m_lfit,h_300,w_300/format,webp/quality,q_80"
                     alt="محصول" class="w-full h-auto object-cover">
                <div class="p-4 group">
                    <h3 class="text-lg font-semibold text-gray-800">OH D6000</h3>
                    <p class="text-gray-600 mt-2 group-hover:text-red-600 transition-colors">۲۰٬۰۰۰٬۰۰۰ تومان</p>
                    <p class="text-gray-600 mt-2 group-hover:text-red-600 transition-colors">دسته بندی : صندلی اداری
                        - گیمینگ</p>

                </div>
            </div>

            {{-- cards --}}

            <div class="bg-white rounded-lg shadow-md overflow-hidden transition-transform hover:scale-[1.02]">
                <img src="https://dkstatics-public.digikala.com/digikala-products/2bfe48e1c8e6c2ba00517b1e3baca586777f4e32_1651288510.jpg?x-oss-process=image/resize,m_lfit,h_300,w_300/format,webp/quality,q_80"
                     alt="محصول" class="w-full h-auto object-cover">
                <div class="p-4 group">
                    <h3 class="text-lg font-semibold text-gray-800">روتر میکروتیک مدل 941Hap lite</h3>
                    <p class="text-gray-600 mt-2 group-hover:text-red-600 transition-colors">۲۰٬۰۰۰٬۰۰۰ تومان</p>
                    <p class="text-gray-600 mt-2 group-hover:text-red-600 transition-colors">تجهیزات شبکه</p>

                </div>
            </div>

            {{-- cards --}}

            <div class="bg-white rounded-lg shadow-md overflow-hidden transition-transform hover:scale-[1.02]">
                <img src="https://dkstatics-public.digikala.com/digikala-products/08200f2a1ed4ba988c09ee374747472b1d4c0fd5_1619950354.jpg?x-oss-process=image/resize,m_lfit,h_300,w_300/format,webp/quality,q_80"
                     alt="محصول" class="w-full h-auto object-cover">
                <div class="p-4 group">
                    <h3 class="text-lg font-semibold text-gray-800">رادیو وایرلس میکروتیک مدل LHG 5 ac </h3>
                    <p class="text-gray-600 mt-2 group-hover:text-red-600 transition-colors">۲۰٬۰۰۰٬۰۰۰ تومان</p>
                    <p class="text-gray-600 mt-2 group-hover:text-red-600 transition-colors">تجهیزات شبکه</p>

                </div>
            </div>

        </div>
    </div>

</div>

</body>

</html>
