<!DOCTYPE html>
<html lang="fa" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ثبت فاکتور مالی</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        /* انیمیشن برای فید شدن محتوا */
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .animate-fadeInUp {
            animation: fadeInUp 0.8s ease-out forwards;
        }

        /* انیمیشن برای نوبار */
        .navbar {
            transition: all 0.3s ease-in-out;
        }

        .navbar.scrolled {
            background-color: rgba(17, 24, 39, 0.95);
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
        }

        /* استایل برای دکمه‌ها */
        .btn {
            transition: all 0.3s ease;
        }

        .btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>

<body class="bg-gray-900 text-white font-sans">
    <!-- نوبار -->
    <nav class="navbar fixed top-0 w-full z-50 bg-gray-900/80 backdrop-blur-sm">
        <div class="container mx-auto px-4 py-4 flex justify-between items-center">
            <div class="text-2xl font-bold text-blue-400">سیستم ثبت فاکتور مالی</div>
            <div class="hidden md:flex space-x-6 space-x-reverse">
                <a href="#home" class="hover:text-blue-400 transition-colors">خانه</a>
                <a href="#about" class="hover:text-blue-400 transition-colors">درباره</a>
                <a href="#services" class="hover:text-blue-400 transition-colors">خدمات</a>
                <a href="#contact" class="hover:text-blue-400 transition-colors">تماس</a>
                <a href="{{route("login.form")}}" class="hover:text-blue-400 transition-colors">ورود / ثبت نام</a>

            </div>
            <button class="md:hidden text-blue-400 focus:outline-none" onclick="toggleMenu()">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7">
                    </path>
                </svg>
            </button>
        </div>
        <!-- منوی موبایل -->
        <div id="mobileMenu" class="hidden md:hidden bg-gray-800">
            <a href="#home" class="block py-2 px-4 hover:bg-gray-700">خانه</a>
            <a href="#about" class="block py-2 px-4 hover:bg-gray-700">درباره</a>
            <a href="#services" class="block py-2 px-4 hover:bg-gray-700">خدمات</a>
            <a href="#contact" class="block py-2 px-4 hover:bg-gray-700">تماس</a>
            <a href="#contact" class="hover:text-blue-400 transition-colors">ورود / ثبت نام</a>

        </div>
    </nav>

    <!-- بخش هیرو -->
    <section id="home" class="min-h-screen flex items-center justify-center bg-gradient-to-b from-gray-900 to-blue-900">
        <div class="container mx-auto px-4 text-center animate-fadeInUp">
            <h1 class="text-4xl md:text-6xl font-bold mb-6">به وبسایت ما خوش آمدید</h1>
            <p class="text-lg md:text-xl mb-8 text-gray-300 max-w-2xl mx-auto">
                ما راه‌حل‌های مدرن و خلاقانه‌ای برای نیازهای دیجیتال شما ارائه می‌دهیم. با ما همراه شوید تا آینده را
                بسازیم.
            </p>
            <a href="#contact" class="btn inline-block bg-blue-600 text-white px-6 py-3 rounded-lg hover:bg-blue-700">
                تماس با ما
            </a>
        </div>
    </section>

    <!-- بخش درباره -->
    <section id="about" class="py-20 bg-gray-800">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl md:text-4xl font-bold text-center mb-12 animate-fadeInUp">درباره ما</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <div class="animate-fadeInUp" style="animation-delay: 0.2s;">
                    <h3 class="text-xl font-semibold mb-4">ما کی هستیم</h3>
                    <p class="text-gray-300">
                        ما تیمی از افراد خلاق و متعهد هستیم که به ارائه راه‌حل‌های دیجیتال با کیفیت بالا افتخار می‌کنیم.
                    </p>
                </div>
                <div class="animate-fadeInUp" style="animation-delay: 0.4s;">
                    <h3 class="text-xl font-semibold mb-4">چشم‌انداز ما</h3>
                    <p class="text-gray-300">
                        ایجاد جهانی که در آن فناوری به ساده‌سازی و بهبود زندگی کمک کند.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- بخش خدمات -->
    <section id="services" class="py-20 bg-gray-900">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl md:text-4xl font-bold text-center mb-12 animate-fadeInUp">خدمات ما</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="p-6 bg-gray-800 rounded-lg animate-fadeInUp" style="animation-delay: 0.2s;">
                    <h3 class="text-xl font-semibold mb-4">طراحی وب</h3>
                    <p class="text-gray-300">طراحی سایت‌های مدرن و واکنش‌گرا با تمرکز بر تجربه کاربری.</p>
                </div>
                <div class="p-6 bg-gray-800 rounded-lg animate-fadeInUp" style="animation-delay: 0.4s;">
                    <h3 class="text-xl font-semibold mb-4">توسعه اپلیکیشن</h3>
                    <p class="text-gray-300">ساخت اپلیکیشن‌های قدرتمند برای پلتفرم‌های مختلف.</p>
                </div>
                <div class="p-6 bg-gray-800 rounded-lg animate-fadeInUp" style="animation-delay: 0.6s;">
                    <h3 class="text-xl font-semibold mb-4">مشاوره دیجیتال</h3>
                    <p class="text-gray-300">ارائه راهکارهای دیجیتال برای رشد کسب‌وکار شما.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- بخش تماس -->
    <section id="contact" class="py-20 bg-blue-900">
        <div class="container mx-auto px-4 text-center">
            <h2 class="text-3xl md:text-4xl font-bold mb-12 animate-fadeInUp">با ما در تماس باشید</h2>
            <p class="text-gray-300 mb-8 max-w-2xl mx-auto">
                سوالی دارید؟ با ما تماس بگیرید تا در مورد نیازهای شما صحبت کنیم.
            </p>
            <a href="mailto:info@example.com"
                class="btn inline-block bg-blue-600 text-white px-6 py-3 rounded-lg hover:bg-blue-700">
                ارسال ایمیل
            </a>
        </div>
    </section>

    <!-- فوتر -->
    <footer class="bg-gray-800 py-8">
        <div class="container mx-auto px-4 text-center">
            <p class="text-gray-300 mb-4">میثاق مومنی بشیوسقه</p>
            <div class="flex justify-center space-x-4 space-x-reverse">
                <a target="_blank" href="https://x.com/MisaghMomeniB" class="hover:text-blue-400">توییتر</a>
                <a target="_blank" href="https://github.com/MisaghMomeniB" class="hover:text-blue-400">گیت هاب</a>
                <a target="_blank" href="https://t.me/MisaghMomeniB" class="hover:text-blue-400">تلگرام</a>
                <a target="_blank" href="https://instagram.com/misaghmomenib" class="hover:text-blue-400">اینستاگرام</a>
                <a target="_blank" href="https://www.linkedin.com/in/misaghmomenib/" class="hover:text-blue-400">لینکداین</a>
                <a target="_blank" href="https://ibrandagency.ir/" class="hover:text-blue-400">آی برند</a>
            </div>
        </div>
    </footer>

    <script>
        // تابع برای منوی موبایل
        function toggleMenu() {
            const menu = document.getElementById('mobileMenu');
            menu.classList.toggle('hidden');
        }

        // انیمیشن اسکرول برای نوبار
        window.addEventListener('scroll', () => {
            const navbar = document.querySelector('.navbar');
            if (window.scrollY > 50) {
                navbar.classList.add('scrolled');
            } else {
                navbar.classList.remove('scrolled');
            }
        });

        // انیمیشن برای المان‌های قابل مشاهده در ویوپورت
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('animate-fadeInUp');
                    observer.unobserve(entry.target);
                }
            });
        }, { threshold: 0.1 });

        document.querySelectorAll('.animate-fadeInUp').forEach(element => {
            observer.observe(element);
        });
    </script>
</body>

</html>