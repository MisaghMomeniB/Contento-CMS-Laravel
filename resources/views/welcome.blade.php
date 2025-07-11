<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>خدمات مالی پیشرفته</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/gh/rastikerdar/vazirmatn@v33.003/fonts.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    <style>
        body {
            font-family: Vazirmatn, sans-serif;
            background: linear-gradient(135deg, #0f172a 0%, #1e293b 100%);
            color: #e2e8f0;
        }
        
        .gradient-text {
            background: linear-gradient(90deg, #38bdf8 0%, #818cf8 50%, #c084fc 100%);
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
        }
        
        .card-glow:hover {
            box-shadow: 0 0 25px rgba(99, 102, 241, 0.3);
            transform: translateY(-5px);
        }
        
        .blob {
            position: absolute;
            filter: blur(60px);
            opacity: 0.2;
            z-index: -1;
        }
        
        .feature-icon {
            transition: all 0.3s ease;
        }
        
        .feature-card:hover .feature-icon {
            transform: scale(1.1) rotate(5deg);
        }
    </style>
</head>
<body class="min-h-screen">
    <!-- Blob backgrounds -->
    <div class="blob bg-blue-500 w-64 h-64 rounded-full animate__animated animate__pulse animate__infinite" style="top: 10%; left: 10%;"></div>
    <div class="blob bg-purple-500 w-72 h-72 rounded-full animate__animated animate__pulse animate__infinite animate__slower" style="bottom: 10%; right: 10%;"></div>
    
    <!-- Navbar -->
    <nav class="container mx-auto px-6 py-4">
        <div class="flex justify-between items-center">
            <div class="flex items-center">
                <span class="text-2xl font-bold gradient-text">مالیـــتو</span>
            </div>
            <div class="hidden md:flex space-x-8 space-x-reverse">
                <a href="#" class="hover:text-blue-400 transition">صفحه اصلی</a>
                <a href="{{route("login.form")}}" class="hover:text-blue-400 transition">ورود / ثبت نام</a>
                <a href="#" class="hover:text-blue-400 transition">خدمات</a>
                <a href="#" class="hover:text-blue-400 transition">درباره ما</a>
                <a href="#" class="hover:text-blue-400 transition">تماس با ما</a>
            </div>
            <button class="md:hidden focus:outline-none">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                </svg>
            </button>
        </div>
    </nav>
    
    <!-- Hero Section -->
    <section class="container mx-auto px-6 py-16 md:py-24 text-center">
        <h1 class="text-4xl md:text-6xl font-bold mb-6 animate__animated animate__fadeInDown">
            <span class="gradient-text">تحولی نوین</span> در مدیریت مالی شما
        </h1>
        <p class="text-lg md:text-xl text-gray-300 max-w-3xl mx-auto mb-10 animate__animated animate__fadeIn animate__delay-1s">
            با راهکارهای هوشمند مالی ما، کسب و کار خود را به سطح جدیدی از موفقیت برسانید. ترکیبی از تکنولوژی و تخصص مالی در خدمت شما.
        </p>
        <div class="flex flex-col sm:flex-row justify-center gap-4 animate__animated animate__fadeIn animate__delay-2s">
            <button class="bg-gradient-to-r from-blue-500 to-purple-600 hover:from-blue-600 hover:to-purple-700 text-white font-bold py-3 px-8 rounded-full transition-all transform hover:scale-105 shadow-lg">
                شروع کنید
            </button>
            <button class="bg-transparent border-2 border-blue-400 hover:bg-blue-900/30 text-blue-400 font-bold py-3 px-8 rounded-full transition-all transform hover:scale-105">
                بیشتر بدانید
            </button>
        </div>
        
        <div class="mt-20 relative">
            <div class="absolute inset-0 bg-gradient-to-r from-blue-500/20 to-purple-500/20 rounded-3xl blur-xl -z-10"></div>
            <div class="bg-gray-800/50 backdrop-blur-sm border border-gray-700 rounded-3xl p-1 animate__animated animate__fadeInUp animate__delay-3s">
                <img src="https://images.unsplash.com/photo-1554224155-6726b3ff858f?ixlib=rb-1.2.1&auto=format&fit=crop&w=1000&q=80" alt="Dashboard" class="rounded-2xl w-full h-auto shadow-2xl">
            </div>
        </div>
    </section>
    
    <!-- Features Section -->
    <section class="container mx-auto px-6 py-16">
        <div class="text-center mb-16">
            <h2 class="text-3xl md:text-4xl font-bold mb-4 animate__animated animate__fadeIn">خدمات <span class="gradient-text">اختصاصی</span> ما</h2>
            <p class="text-gray-300 max-w-2xl mx-auto animate__animated animate__fadeIn animate__delay-1s">راهکارهای مالی هوشمند برای نیازهای متنوع کسب و کار شما</p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <!-- Feature 1 -->
            <div class="feature-card bg-gray-800/50 backdrop-blur-sm border border-gray-700 rounded-2xl p-6 transition-all duration-300 hover:border-blue-400">
                <div class="feature-icon bg-blue-900/30 w-14 h-14 rounded-lg flex items-center justify-center mb-4">
                    <svg class="w-8 h-8 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
                <h3 class="text-xl font-bold mb-3">مدیریت سرمایه</h3>
                <p class="text-gray-300">بهینه‌سازی جریان نقدینگی و مدیریت حرفه‌ای دارایی‌های مالی با آخرین متدهای روز دنیا</p>
            </div>
            
            <!-- Feature 2 -->
            <div class="feature-card bg-gray-800/50 backdrop-blur-sm border border-gray-700 rounded-2xl p-6 transition-all duration-300 hover:border-purple-400">
                <div class="feature-icon bg-purple-900/30 w-14 h-14 rounded-lg flex items-center justify-center mb-4">
                    <svg class="w-8 h-8 text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path>
                    </svg>
                </div>
                <h3 class="text-xl font-bold mb-3">حسابداری هوشمند</h3>
                <p class="text-gray-300">سیستم‌های یکپارچه حسابداری با قابلیت گزارش‌گیری لحظه‌ای و تحلیل مالی</p>
            </div>
            
            <!-- Feature 3 -->
            <div class="feature-card bg-gray-800/50 backdrop-blur-sm border border-gray-700 rounded-2xl p-6 transition-all duration-300 hover:border-indigo-400">
                <div class="feature-icon bg-indigo-900/30 w-14 h-14 rounded-lg flex items-center justify-center mb-4">
                    <svg class="w-8 h-8 text-indigo-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path>
                    </svg>
                </div>
                <h3 class="text-xl font-bold mb-3">تحلیل بازار</h3>
                <p class="text-gray-300">پیش‌بینی روند بازار و ارائه راهکارهای سرمایه‌گذاری با استفاده از هوش مصنوعی</p>
            </div>
            
            <!-- Feature 4 -->
            <div class="feature-card bg-gray-800/50 backdrop-blur-sm border border-gray-700 rounded-2xl p-6 transition-all duration-300 hover:border-green-400">
                <div class="feature-icon bg-green-900/30 w-14 h-14 rounded-lg flex items-center justify-center mb-4">
                    <svg class="w-8 h-8 text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                    </svg>
                </div>
                <h3 class="text-xl font-bold mb-3">امنیت مالی</h3>
                <p class="text-gray-300">سیستم‌های پیشرفته امنیتی و نظارت لحظه‌ای برای حفاظت از دارایی‌های شما</p>
            </div>
            
            <!-- Feature 5 -->
            <div class="feature-card bg-gray-800/50 backdrop-blur-sm border border-gray-700 rounded-2xl p-6 transition-all duration-300 hover:border-red-400">
                <div class="feature-icon bg-red-900/30 w-14 h-14 rounded-lg flex items-center justify-center mb-4">
                    <svg class="w-8 h-8 text-red-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
                <h3 class="text-xl font-bold mb-3">مدیریت زمان</h3>
                <p class="text-gray-300">بهینه‌سازی فرآیندهای مالی و کاهش زمان انجام تراکنش‌ها و عملیات بانکی</p>
            </div>
            
            <!-- Feature 6 -->
            <div class="feature-card bg-gray-800/50 backdrop-blur-sm border border-gray-700 rounded-2xl p-6 transition-all duration-300 hover:border-yellow-400">
                <div class="feature-icon bg-yellow-900/30 w-14 h-14 rounded-lg flex items-center justify-center mb-4">
                    <svg class="w-8 h-8 text-yellow-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                    </svg>
                </div>
                <h3 class="text-xl font-bold mb-3">مشاوره تخصصی</h3>
                <p class="text-gray-300">تیم متخصص مشاوره مالی برای ارائه راهکارهای شخصی‌سازی شده متناسب با نیاز شما</p>
            </div>
        </div>
    </section>
    
    <!-- Stats Section -->
    <section class="bg-gray-900/50 border-y border-gray-800 py-16">
        <div class="container mx-auto px-6">
            <div class="grid grid-cols-2 md:grid-cols-4 gap-8 text-center">
                <div class="animate__animated animate__fadeInUp">
                    <div class="text-4xl md:text-5xl font-bold gradient-text mb-2">+۱۵۰</div>
                    <div class="text-gray-300">شرکت همکار</div>
                </div>
                <div class="animate__animated animate__fadeInUp animate__delay-1s">
                    <div class="text-4xl md:text-5xl font-bold gradient-text mb-2">۹۹.۹٪</div>
                    <div class="text-gray-300">رضایت مشتریان</div>
                </div>
                <div class="animate__animated animate__fadeInUp animate__delay-2s">
                    <div class="text-4xl md:text-5xl font-bold gradient-text mb-2">۲۴/۷</div>
                    <div class="text-gray-300">پشتیبانی</div>
                </div>
                <div class="animate__animated animate__fadeInUp animate__delay-3s">
                    <div class="text-4xl md:text-5xl font-bold gradient-text mb-2">+۵۰</div>
                    <div class="text-gray-300">متخصص مالی</div>
                </div>
            </div>
        </div>
    </section>
    
    <!-- CTA Section -->
    <section class="container mx-auto px-6 py-24 text-center">
        <div class="max-w-4xl mx-auto bg-gradient-to-r from-blue-900/30 to-purple-900/30 border border-gray-700 rounded-3xl p-12 backdrop-blur-sm animate__animated animate__fadeIn">
            <h2 class="text-3xl md:text-4xl font-bold mb-6">آماده تحول در مدیریت مالی خود هستید؟</h2>
            <p class="text-lg text-gray-300 mb-8">همین حالا با ما همراه شوید و از خدمات حرفه‌ای مالی ما بهره‌مند شوید.</p>
            <button class="bg-gradient-to-r from-blue-500 to-purple-600 hover:from-blue-600 hover:to-purple-700 text-white font-bold py-4 px-10 rounded-full transition-all transform hover:scale-105 shadow-lg animate__animated animate__pulse animate__infinite animate__slower">
                درخواست مشاوره رایگان
            </button>
        </div>
    </section>
    
    <!-- Footer -->
    <footer class="bg-gray-900/50 border-t border-gray-800 py-12">
        <div class="container mx-auto px-6">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                <div>
                    <h3 class="text-xl font-bold gradient-text mb-4">مالیـــتو</h3>
                    <p class="text-gray-300">ارائه دهنده راهکارهای نوین مالی و سرمایه‌گذاری برای کسب و کارهای کوچک و بزرگ</p>
                </div>
                <div>
                    <h4 class="text-lg font-bold mb-4">لینک‌های سریع</h4>
                    <ul class="space-y-2">
                        <li><a href="#" class="text-gray-300 hover:text-blue-400 transition">صفحه اصلی</a></li>
                        <li><a href="#" class="text-gray-300 hover:text-blue-400 transition">خدمات</a></li>
                        <li><a href="#" class="text-gray-300 hover:text-blue-400 transition">درباره ما</a></li>
                        <li><a href="#" class="text-gray-300 hover:text-blue-400 transition">تماس با ما</a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="text-lg font-bold mb-4">خدمات</h4>
                    <ul class="space-y-2">
                        <li><a href="#" class="text-gray-300 hover:text-blue-400 transition">مشاوره مالی</a></li>
                        <li><a href="#" class="text-gray-300 hover:text-blue-400 transition">مدیریت سرمایه</a></li>
                        <li><a href="#" class="text-gray-300 hover:text-blue-400 transition">تحلیل بازار</a></li>
                        <li><a href="#" class="text-gray-300 hover:text-blue-400 transition">حسابداری هوشمند</a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="text-lg font-bold mb-4">تماس با ما</h4>
                    <ul class="space-y-2 text-gray-300">
                        <li class="flex items-center">
                            <svg class="w-5 h-5 mr-2 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                            </svg>
                            ۰۲۱-۱۲۳۴۵۶۷۸
                        </li>
                        <li class="flex items-center">
                            <svg class="w-5 h-5 mr-2 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                            </svg>
                            info@malito.com
                        </li>
                        <li class="flex items-center">
                            <svg class="w-5 h-5 mr-2 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            </svg>
                            تهران، خیابان ولیعصر
                        </li>
                    </ul>
                </div>
            </div>
            <div class="border-t border-gray-800 mt-12 pt-8 flex flex-col md:flex-row justify-between items-center">
                <p class="text-gray-400">میثاق مومنی بشیوسقه</p>
                <div class="flex space-x-4 space-x-reverse mt-4 md:mt-0">
                    <a href="#" class="text-gray-400 hover:text-blue-400 transition">
                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z"></path>
                        </svg>
                    </a>
                    <a href="#" class="text-gray-400 hover:text-blue-400 transition">
                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path d="M12.315 2c2.43 0 2.784.013 3.808.06 1.064.049 1.791.218 2.427.465a4.902 4.902 0 011.772 1.153 4.902 4.902 0 011.153 1.772c.247.636.416 1.363.465 2.427.048 1.067.06 1.407.06 4.123v.08c0 2.643-.012 2.987-.06 4.043-.049 1.064-.218 1.791-.465 2.427a4.902 4.902 0 01-1.153 1.772 4.902 4.902 0 01-1.772 1.153c-.636.247-1.363.416-2.427.465-1.067.048-1.407.06-4.123.06h-.08c-2.643 0-2.987-.012-4.043-.06-1.064-.049-1.791-.218-2.427-.465a4.902 4.902 0 01-1.772-1.153 4.902 4.902 0 01-1.153-1.772c-.247-.636-.416-1.363-.465-2.427-.047-1.024-.06-1.379-.06-3.808v-.63c0-2.43.013-2.784.06-3.808.049-1.064.218-1.791.465-2.427a4.902 4.902 0 011.153-1.772A4.902 4.902 0 015.45 2.525c.636-.247 1.363-.416 2.427-.465C8.901 2.013 9.256 2 11.685 2h.63zm-.081 1.802h-.468c-2.456 0-2.784.011-3.807.058-.975.045-1.504.207-1.857.344-.467.182-.8.398-1.15.748-.35.35-.566.683-.748 1.15-.137.353-.3.882-.344 1.857-.047 1.023-.058 1.351-.058 3.807v.468c0 2.456.011 2.784.058 3.807.045.975.207 1.504.344 1.857.182.466.399.8.748 1.15.35.35.683.566 1.15.748.353.137.882.3 1.857.344 1.054.048 1.37.058 4.041.058h.08c2.597 0 2.917-.01 3.96-.058.976-.045 1.505-.207 1.858-.344.466-.182.8-.398 1.15-.748.35-.35.566-.683.748-1.15.137-.353.3-.882.344-1.857.048-1.055.058-1.37.058-4.041v-.08c0-2.597-.01-2.917-.058-3.96-.045-.976-.207-1.505-.344-1.858a3.097 3.097 0 00-.748-1.15 3.098 3.098 0 00-1.15-.748c-.353-.137-.882-.3-1.857-.344-1.023-.047-1.351-.058-3.807-.058zM12 6.865a5.135 5.135 0 110 10.27 5.135 5.135 0 010-10.27zm0 1.802a3.333 3.333 0 100 6.666 3.333 3.333 0 000-6.666zm5.338-3.205a1.2 1.2 0 110 2.4 1.2 1.2 0 010-2.4z"></path>
                        </svg>
                    </a>
                    <a href="#" class="text-gray-400 hover:text-blue-400 transition">
                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path d="M8.29 20.251c7.547 0 11.675-6.253 11.675-11.675 0-.178 0-.355-.012-.53A8.348 8.348 0 0022 5.92a8.19 8.19 0 01-2.357.646 4.118 4.118 0 001.804-2.27 8.224 8.224 0 01-2.605.996 4.107 4.107 0 00-6.993 3.743 11.65 11.65 0 01-8.457-4.287 4.106 4.106 0 001.27 5.477A4.072 4.072 0 012.8 9.713v.052a4.105 4.105 0 003.292 4.022 4.095 4.095 0 01-1.853.07 4.108 4.108 0 003.834 2.85A8.233 8.233 0 012 18.407a11.616 11.616 0 006.29 1.84"></path>
                        </svg>
                    </a>
                    <a href="#" class="text-gray-400 hover:text-blue-400 transition">
                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path d="M19.615 3.184c-3.604-.246-11.631-.245-15.23 0-3.897.266-4.356 2.62-4.385 8.816.029 6.185.484 8.549 4.385 8.816 3.6.245 11.626.246 15.23 0 3.897-.266 4.356-2.62 4.385-8.816-.029-6.185-.484-8.549-4.385-8.816zm-10.615 12.816v-8l8 3.993-8 4.007z"></path>
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </footer>
    
    <script>
        // Animation on scroll
        document.addEventListener('DOMContentLoaded', function() {
            const animateElements = document.querySelectorAll('.animate__animated');
            
            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        const animation = entry.target.getAttribute('data-animate');
                        entry.target.classList.add(animation);
                        observer.unobserve(entry.target);
                    }
                });
            }, {
                threshold: 0.1
            });
            
            animateElements.forEach(element => {
                observer.observe(element);
            });
            
            // Button hover effect
            const buttons = document.querySelectorAll('button');
            buttons.forEach(button => {
                button.addEventListener('mousemove', function(e) {
                    const x = e.pageX - button.offsetLeft;
                    const y = e.pageY - button.offsetTop;
                    
                    button.style.setProperty('--x', x + 'px');
                    button.style.setProperty('--y', y + 'px');
                });
            });
        });
    </script>
</body>
</html>