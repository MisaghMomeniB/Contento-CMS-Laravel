<!DOCTYPE html>
<html lang="fa" dir="rtl">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>ورود</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/gh/rastikerdar/vazir-font/dist/font-face.css" rel="stylesheet" />
    <style>
        body {
            font-family: Vazir, sans-serif;
        }

        #slider-container {
            position: relative;
            overflow: hidden;
            width: 100%;
            max-width: 800px;
            border-radius: 1rem;
        }

        #slider {
            display: flex;
            transition: transform 0.7s ease-in-out;
            width: 100%;
            height: 100%;
        }

        #slider img {
            width: 100%;
            flex: 0 0 100%;
            object-fit: cover;
            border-radius: 1rem;
        }

        .nav-button {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            background: rgba(0, 0, 0, 0.5);
            color: white;
            padding: 10px;
            cursor: pointer;
            border-radius: 50%;
            user-select: none;
            z-index: 10;
        }

        .prev-button {
            right: 10px;
        }

        .next-button {
            left: 10px;
        }

        .indicators {
            position: absolute;
            bottom: 10px;
            left: 50%;
            transform: translateX(-50%);
            display: flex;
            gap: 8px;
            z-index: 10;
        }

        .indicator {
            width: 10px;
            height: 10px;
            background: rgba(255, 255, 255, 0.5);
            border-radius: 50%;
            cursor: pointer;
            transition: background 0.3s;
        }

        .indicator.active {
            background: white;
        }
    </style>
</head>

<body class="h-screen bg-gray-100 font-sans">
    <div class="h-full flex">

        <!-- سمت چپ: اسلایدر -->
        <div class="w-1/2 bg-[#77BEF0] flex items-center justify-center p-8 overflow-hidden relative">
            <div id="slider-container" class="w-full max-w-lg overflow-hidden rounded-xl">
                <div id="slider" class="flex">
                    <img src="https://images.unsplash.com/photo-1544380904-c686aad2fc40?w=800&auto=format&fit=crop&q=60&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8M3x8bmV0d29ya3xlbnwwfDJ8MHx8fDI%3D"
                        loading="eager" class="w-full flex-shrink-0 object-cover rounded-xl" />
                    <img src="https://images.unsplash.com/photo-1642160432858-8e6540b5e5c6?q=80&w=880&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                        loading="eager" class="w-full flex-shrink-0 object-cover rounded-xl" />
                    <img src="https://images.unsplash.com/photo-1656331797721-b593b8f00297?w=800&auto=format&fit=crop&q=60&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8N3x8bmV0d29ya3xlbnwwfDJ8MHx8fDI%3D"
                        loading="eager" class="w-full flex-shrink-0 object-cover rounded-xl" />
                </div>
                <!-- دکمه‌های ناوبری -->
                <div class="nav-button prev-button">❮</div>
                <div class="nav-button next-button">❯</div>
                <!-- اندیکاتورها -->
                <div class="indicators"></div>
            </div>
        </div>

        <!-- سمت راست: فرم ورود -->
        <div class="w-1/2 bg-gray-200 flex items-center justify-center p-10">
            <div class="bg-white w-full max-w-md p-8 rounded-xl shadow-lg">
                <h2 class="text-3xl font-bold mb-6 text-center text-blue-700">ورود</h2>
                <form action="{{ route('login') }}" method="POST" class="space-y-4">
                    @csrf
                    <div>
                        <label class="block text-gray-700 mb-1">شماره همراه</label>
                        <input name="mobile" type="tel" dir="rtl" placeholder="شماره همراه"
                            class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                            required />
                    </div>
                    <div>
                        <label class="block text-gray-700 mb-1">رمز عبور</label>
                        <input name="password" type="password" placeholder="رمز عبور"
                            class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                            required />
                    </div>
                    <button type="submit"
                        class="w-full bg-blue-600 text-white py-2 rounded-lg hover:bg-blue-700 transition">
                        ورود
                    </button>
                </form>
                <p class="text-center text-sm text-gray-600 mt-6">
                    حساب کاربری ندارید؟
                    <a href="{{ route('register.form') }}" class="text-blue-600 hover:underline">ثبت‌نام کنید</a>
                </p>
            </div>
        </div>

    </div>

    <!-- اسکریپت اسلایدر -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const slider = document.getElementById("slider");
            const sliderContainer = document.getElementById("slider-container");
            const slides = slider.querySelectorAll('img');
            const totalSlides = slides.length;
            let currentIndex = 0;
            const indicatorsContainer = document.querySelector(".indicators");
            const prevButton = document.querySelector(".prev-button");
            const nextButton = document.querySelector(".next-button");
            let autoSlideInterval;

            // تنظیم عرض اسلایدر و اسلایدها
            function setupSlider() {
                const containerWidth = sliderContainer.clientWidth;
                slider.style.width = `${totalSlides * 100}%`;

                slides.forEach(slide => {
                    slide.style.width = `${100 / totalSlides}%`;
                    slide.style.flex = `0 0 ${100 / totalSlides}%`;
                });
            }

            // ایجاد اندیکاتورها
            function createIndicators() {
                for (let i = 0; i < totalSlides; i++) {
                    const indicator = document.createElement("div");
                    indicator.classList.add("indicator");
                    if (i === 0) indicator.classList.add("active");
                    indicator.addEventListener("click", () => goToSlide(i));
                    indicatorsContainer.appendChild(indicator);
                }
            }

            // به‌روزرسانی اندیکاتورها
            function updateIndicators() {
                const indicators = document.querySelectorAll(".indicator");
                indicators.forEach((indicator, index) => {
                    indicator.classList.toggle("active", index === currentIndex);
                });
            }

            // رفتن به اسلاید خاص
            function goToSlide(index) {
                currentIndex = (index + totalSlides) % totalSlides;
                // برای RTL از translateX مثبت استفاده می‌کنیم
                slider.style.transform = `translateX(${currentIndex * (100 / totalSlides)}%)`;
                updateIndicators();
                resetAutoSlide();
            }

            // اسلاید بعدی
            function nextSlide() {
                goToSlide(currentIndex + 1);
            }

            // اسلاید قبلی
            function prevSlide() {
                goToSlide(currentIndex - 1);
            }

            // تنظیم اسلاید خودکار
            function startAutoSlide() {
                autoSlideInterval = setInterval(nextSlide, 3000);
            }

            // بازنشانی اسلاید خودکار
            function resetAutoSlide() {
                clearInterval(autoSlideInterval);
                startAutoSlide();
            }

            // راه‌اندازی اسلایدر
            setupSlider();
            createIndicators();
            startAutoSlide();

            // رویدادهای دکمه‌ها
            prevButton.addEventListener("click", prevSlide);
            nextButton.addEventListener("click", nextSlide);

            // تنظیم مجدد هنگام تغییر سایز پنجره
            window.addEventListener('resize', setupSlider);
        });
    </script>
</body>

</html>