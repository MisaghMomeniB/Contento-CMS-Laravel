<!DOCTYPE html>
<html lang="fa" dir="rtl">

<head>
  <meta charset="UTF-8">
  <title>پنل مدیریت POS پیشرفته | iBrand</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Bootstrap 5 CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Bootstrap Icons -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
  <!-- Vazir Font -->
  <link href="https://cdn.jsdelivr.net/npm/vazirmatn@33.0.0/Vazirmatn-font-face.css" rel="stylesheet">
  <style>
    :root {
      --primary-color: #3a56d4;
      --primary-dark: #2f46b8;
      --secondary-color: #4c6ef5;
      --accent-color: #5c7cfa;
      --text-light: #f8f9fa;
      --text-muted: #adb5bd;
      --sidebar-width: 300px;
      --collapsed-width: 80px;
      --toggle-btn-size: 42px;
      --content-padding: 35px;
      --transition-speed: 0.45s;
      --easing: cubic-bezier(0.68, -0.55, 0.265, 1.55);
    }

    body {
      margin: 0;
      font-family: "Vazirmatn", sans-serif;
      background-color: #f8fafd;
      color: #2d3748;
      overflow-x: hidden;
      transition: margin-right var(--transition-speed) var(--easing);
    }

    /* Sidebar Styles */
    .sidebar {
      height: 100vh;
      width: var(--sidebar-width);
      position: fixed;
      right: 0;
      top: 0;
      background: linear-gradient(160deg, var(--primary-color), var(--secondary-color));
      color: var(--text-light);
      padding: 0;
      transition: all var(--transition-speed) var(--easing);
      z-index: 1050;
      box-shadow: -5px 0 25px rgba(0, 0, 0, 0.08);
      border-left: 1px solid rgba(255, 255, 255, 0.15);
      display: flex;
      flex-direction: column;
      overflow: hidden;
    }

    .sidebar.collapsed {
      width: var(--collapsed-width);
      box-shadow: -5px 0 25px rgba(0, 0, 0, 0.05);
    }

    /* Sidebar Header */
    .sidebar-header {
      padding: 28px 20px;
      background: rgba(0, 0, 0, 0.08);
      border-bottom: 1px solid rgba(255, 255, 255, 0.12);
      text-align: center;
      position: relative;
      transition: all var(--transition-speed) var(--easing);
      flex-shrink: 0;
    }

    .sidebar.collapsed .sidebar-header {
      padding: 20px 0;
      background: transparent;
      border-bottom: none;
    }

    .sidebar-logo {
      display: flex;
      flex-direction: column;
      align-items: center;
      transition: all var(--transition-speed) var(--easing);
      overflow: hidden;
    }

    .sidebar.collapsed .sidebar-logo {
      opacity: 0;
      height: 0;
      margin: 0;
    }

    .sidebar-title {
      font-size: 1.5rem;
      font-weight: 700;
      margin: 0;
      letter-spacing: -0.5px;
      transition: all var(--transition-speed) var(--easing);
    }

    .sidebar-subtitle {
      font-size: 0.8rem;
      color: rgba(255, 255, 255, 0.7);
      margin-top: 6px;
      transition: all var(--transition-speed) var(--easing);
    }

    /* Toggle Button */
    .sidebar-toggle {
      position: absolute;
      left: -21px;
      top: 50%;
      transform: translateY(-50%);
      background: var(--primary-color);
      color: white;
      border: none;
      border-radius: 50%;
      width: var(--toggle-btn-size);
      height: var(--toggle-btn-size);
      display: flex;
      align-items: center;
      justify-content: center;
      cursor: pointer;
      transition: all var(--transition-speed) var(--easing);
      box-shadow: -3px 0 12px rgba(0, 0, 0, 0.15);
      z-index: 1051;
      border: 2px solid rgba(255, 255, 255, 0.1);
    }

    .sidebar-toggle:hover {
      background: var(--primary-dark);
      transform: translateY(-50%) scale(1.08);
      box-shadow: -3px 0 15px rgba(0, 0, 0, 0.2);
    }

    .sidebar-toggle i {
      transition: transform var(--transition-speed) var(--easing);
    }

    .sidebar.collapsed .sidebar-toggle {
      left: 50%;
      transform: translate(-50%, -50%) rotate(180deg);
    }

    .sidebar.collapsed .sidebar-toggle:hover {
      transform: translate(-50%, -50%) rotate(180deg) scale(1.08);
    }

    /* Navigation */
    .sidebar-nav {
      flex-grow: 1;
      overflow-y: auto;
      padding: 15px 12px;
      transition: all var(--transition-speed) var(--easing);
    }

    .sidebar.collapsed .sidebar-nav {
      padding: 15px 5px;
    }

    .nav-item {
      position: relative;
      margin-bottom: 5px;
    }

    .nav-link {
      color: var(--text-light);
      font-size: 0.95rem;
      padding: 14px 16px;
      border-radius: 8px;
      display: flex;
      align-items: center;
      transition: all 0.25s ease;
      position: relative;
      overflow: hidden;
      white-space: nowrap;
    }

    .nav-link:hover,
    .nav-link.active {
      background: rgba(255, 255, 255, 0.12);
      transform: translateX(-3px);
    }

    .nav-link.active {
      background: rgba(255, 255, 255, 0.15);
    }

    .nav-icon {
      margin-left: 10px;
      font-size: 1.2rem;
      min-width: 26px;
      text-align: center;
      transition: all var(--transition-speed) var(--easing);
    }

    .sidebar.collapsed .nav-icon {
      margin-left: 0;
      font-size: 1.3rem;
    }

    .nav-text {
      transition: all var(--transition-speed) var(--easing);
      opacity: 1;
    }

    .sidebar.collapsed .nav-text {
      opacity: 0;
      width: 0;
      position: absolute;
      pointer-events: none;
    }

    /* Tooltip for collapsed state */
    .nav-item::after {
      content: attr(data-tooltip);
      position: absolute;
      right: 100%;
      top: 50%;
      transform: translateY(-50%);
      background: var(--primary-dark);
      color: white;
      padding: 6px 12px;
      border-radius: 4px;
      font-size: 0.85rem;
      white-space: nowrap;
      opacity: 0;
      pointer-events: none;
      transition: all 0.2s ease;
      margin-right: 15px;
      box-shadow: 2px 2px 8px rgba(0, 0, 0, 0.1);
    }

    .sidebar.collapsed .nav-item:hover::after {
      opacity: 1;
      margin-right: 10px;
    }

    /* Main Content */
    .main-content {
      padding: var(--content-padding);
      min-height: 100vh;
      margin-right: var(--sidebar-width);
      transition: margin-right var(--transition-speed) var(--easing);
    }

    .main-content.expanded {
      margin-right: var(--collapsed-width);
    }

    /* Category Navigation Bar */
    #category-tabs {
      flex-wrap: nowrap;
    }

    #category-tabs .nav-link {
      white-space: nowrap;
      padding: 8px 16px;
      border-radius: 20px;
      font-size: 0.9rem;
      transition: all 0.2s ease;
      margin: 0 3px;
    }

    #category-tabs .nav-link.active {
      background-color: var(--primary-color);
      color: white;
    }

    #category-tabs .nav-link:not(.active) {
      background-color: #f1f3f5;
      color: #495057;
    }

    #category-tabs .nav-link:not(.active):hover {
      background-color: #e9ecef;
    }

    .overflow-auto {
      overflow-x: auto;
      -webkit-overflow-scrolling: touch;
      scrollbar-width: thin;
    }

    .overflow-auto::-webkit-scrollbar {
      height: 6px;
    }

    .overflow-auto::-webkit-scrollbar-track {
      background: rgba(0, 0, 0, 0.05);
    }

    .overflow-auto::-webkit-scrollbar-thumb {
      background: rgba(0, 0, 0, 0.15);
      border-radius: 3px;
    }

    /* Responsive Design */
    @media (max-width: 992px) {
      .sidebar {
        transform: translateX(100%);
        width: var(--sidebar-width);
      }

      .sidebar.show-mobile {
        transform: translateX(0);
      }

      .sidebar.collapsed {
        transform: translateX(100%);
        width: var(--sidebar-width);
      }

      .main-content {
        margin-right: 0;
      }

      .main-content.expanded {
        margin-right: 0;
      }

      .sidebar-toggle {
        left: -21px;
        transform: translateY(-50%);
      }

      .sidebar.collapsed .sidebar-toggle {
        left: -21px;
        transform: translateY(-50%) rotate(180deg);
      }
    }

    /* Custom Scrollbar */
    ::-webkit-scrollbar {
      width: 6px;
    }

    ::-webkit-scrollbar-track {
      background: rgba(0, 0, 0, 0.1);
      border-radius: 3px;
    }

    ::-webkit-scrollbar-thumb {
      background: rgba(255, 255, 255, 0.3);
      border-radius: 3px;
    }

    ::-webkit-scrollbar-thumb:hover {
      background: rgba(255, 255, 255, 0.4);
    }
  </style>
</head>

<body>

<div class="sidebar" id="sidebar">
  <div class="sidebar-header">
    <button class="sidebar-toggle" id="sidebarToggle">
      <i class="bi bi-chevron-right"></i>
    </button>
    <div class="sidebar-logo">
      <h2 class="sidebar-title">سیستم مالی</h2>
      <span class="sidebar-subtitle">نسخه پیشرفته</span>
    </div>
  </div>
  <nav class="sidebar-nav">
    <div class="nav-item" data-tooltip="داشبورد">
      <a href="#" class="nav-link active">
        <i class="bi bi-braces nav-icon"></i>
        <span class="nav-text">POS</span>
      </a>
    </div>
    <div class="nav-item" data-tooltip="تراکنش‌ها">
      <a href="#" class="nav-link">
        <i class="bi bi-cash-stack nav-icon"></i>
        <span class="nav-text">تراکنش‌ها</span>
      </a>
    </div>
    <div class="nav-item" data-tooltip="گزارشات">
      <a href="#" class="nav-link">
        <i class="bi bi-graph-up nav-icon"></i>
        <span class="nav-text">گزارشات</span>
      </a>
    </div>
    <div class="nav-item" data-tooltip="مشتریان">
      <a href="#" class="nav-link">
        <i class="bi bi-people nav-icon"></i>
        <span class="nav-text">مشتریان</span>
      </a>
    </div>
    <div class="nav-item" data-tooltip="تنظیمات">
      <a href="#" class="nav-link">
        <i class="bi bi-gear nav-icon"></i>
        <span class="nav-text">تنظیمات</span>
      </a>
    </div>
  </nav>
</div>

<div class="main-content" id="mainContent">
  <div class="container mt-0">
    <!-- نوبار دسته‌بندی‌ها -->
    <div class="row mb-3">
      <div class="col-12">
        <div class="card shadow-sm">
          <div class="card-body p-2">
            <div class="d-flex flex-row-reverse overflow-auto">
              <div class="nav nav-pills" id="category-tabs" role="tablist">
                <button class="nav-link active mx-1" id="all-tab" data-bs-toggle="pill" data-bs-target="#all" type="button" role="tab">
                  همه محصولات
                </button>
                <button class="nav-link mx-1" id="suit-tab" data-bs-toggle="pill" data-bs-target="#suit" type="button" role="tab">
                  کت و شلوار
                </button>
                <button class="nav-link mx-1" id="shirt-tab" data-bs-toggle="pill" data-bs-target="#shirt" type="button" role="tab">
                  پیراهن
                </button>
                <button class="nav-link mx-1" id="pants-tab" data-bs-toggle="pill" data-bs-target="#pants" type="button" role="tab">
                  شلوار
                </button>
                <button class="nav-link mx-1" id="shoes-tab" data-bs-toggle="pill" data-bs-target="#shoes" type="button" role="tab">
                  کفش
                </button>
                <button class="nav-link mx-1" id="accessories-tab" data-bs-toggle="pill" data-bs-target="#accessories" type="button" role="tab">
                  اکسسوری
                </button>
                <button class="nav-link mx-1" id="winter-tab" data-bs-toggle="pill" data-bs-target="#winter" type="button" role="tab">
                  پاییزه
                </button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- محتوای محصولات -->
    <div class="row row-cols-2 row-cols-md-3 row-cols-lg-4 row-cols-xl-5 row-cols-xxl-6 g-4">
      <!-- Card 1 -->
      <div class="col">
        <div class="card h-100">
          <img src="https://lebasesabzz.com/storage/files/9/%D8%AC%DB%8C%D9%86/68826db736a0c.webp" class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title">کت و شلوار</h5>
            <p class="card-text"><i class="bi bi-tag"></i> قیمت : 1،200،000 تومان</p>
            <p class="card-text"><i class="bi bi-cart2"></i> دسته بندی : کت و شلوار</p>
            <p class="card-text"><i class="bi bi-list-ol"></i> موجودی : 10 عدد</p>
            <a href="#" class="btn btn-primary"><i class="bi bi-bag-plus-fill"></i> افزودن</a>
          </div>
        </div>
      </div>

      <!-- Card 2 -->
      <div class="col">
        <div class="card h-100">
          <img src="https://lebasesabzz.com/storage/files/9/%D8%AC%DB%8C%D9%86/68826db736a0c.webp" class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title">کت و شلوار</h5>
            <p class="card-text"><i class="bi bi-tag"></i> قیمت : 1،200،000 تومان</p>
            <p class="card-text"><i class="bi bi-cart2"></i> دسته بندی : کت و شلوار</p>
            <p class="card-text"><i class="bi bi-list-ol"></i> موجودی : 10 عدد</p>
            <a href="#" class="btn btn-primary"><i class="bi bi-bag-plus-fill"></i> افزودن</a>
          </div>
        </div>
      </div>

      <!-- Card 3 -->
      <div class="col">
        <div class="card h-100">
          <img src="https://lebasesabzz.com/storage/files/9/%D8%AC%DB%8C%D9%86/68826db736a0c.webp" class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title">کت و شلوار</h5>
            <p class="card-text"><i class="bi bi-tag"></i> قیمت : 1،200،000 تومان</p>
            <p class="card-text"><i class="bi bi-cart2"></i> دسته بندی : کت و شلوار</p>
            <p class="card-text"><i class="bi bi-list-ol"></i> موجودی : 10 عدد</p>
            <a href="#" class="btn btn-primary"><i class="bi bi-bag-plus-fill"></i> افزودن</a>
          </div>
        </div>
      </div>

      <!-- Card 4 -->
      <div class="col">
        <div class="card h-100">
          <img src="https://lebasesabzz.com/storage/files/9/%D8%AC%DB%8C%D9%86/68826db736a0c.webp" class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title">کت و شلوار</h5>
            <p class="card-text"><i class="bi bi-tag"></i> قیمت : 1،200،000 تومان</p>
            <p class="card-text"><i class="bi bi-cart2"></i> دسته بندی : کت و شلوار</p>
            <p class="card-text"><i class="bi bi-list-ol"></i> موجودی : 10 عدد</p>
            <a href="#" class="btn btn-primary"><i class="bi bi-bag-plus-fill"></i> افزودن</a>
          </div>
        </div>
      </div>

      <!-- Card 5 -->
      <div class="col">
        <div class="card h-100">
          <img src="https://lebasesabzz.com/storage/files/9/%D8%AC%DB%8C%D9%86/68826db736a0c.webp" class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title">کت و شلوار</h5>
            <p class="card-text"><i class="bi bi-tag"></i> قیمت : 1،200،000 تومان</p>
            <p class="card-text"><i class="bi bi-cart2"></i> دسته بندی : کت و شلوار</p>
            <p class="card-text"><i class="bi bi-list-ol"></i> موجودی : 10 عدد</p>
            <a href="#" class="btn btn-primary"><i class="bi bi-bag-plus-fill"></i> افزودن</a>
          </div>
        </div>
      </div>

      <!-- Card 6 -->
      <div class="col">
        <div class="card h-100">
          <img src="https://lebasesabzz.com/storage/files/9/%D8%AC%DB%8C%D9%86/68826db736a0c.webp" class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title">کت و شلوار</h5>
            <p class="card-text"><i class="bi bi-tag"></i> قیمت : 1،200،000 تومان</p>
            <p class="card-text"><i class="bi bi-cart2"></i> دسته بندی : کت و شلوار</p>
            <p class="card-text"><i class="bi bi-list-ol"></i> موجودی : 10 عدد</p>
            <a href="#" class="btn btn-primary"><i class="bi bi-bag-plus-fill"></i> افزودن</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<script>
  document.addEventListener('DOMContentLoaded', function() {
    const sidebar = document.getElementById('sidebar');
    const sidebarToggle = document.getElementById('sidebarToggle');
    const mainContent = document.getElementById('mainContent');

    // بررسی وضعیت ذخیره شده
    const isCollapsed = localStorage.getItem('sidebarCollapsed') === 'true';

    // اعمال وضعیت اولیه
    if (isCollapsed) {
      sidebar.classList.add('collapsed');
      mainContent.classList.add('expanded');
    }

    // رویداد کلیک برای دکمه toggle
    sidebarToggle.addEventListener('click', function() {
      sidebar.classList.toggle('collapsed');
      mainContent.classList.toggle('expanded');

      // ذخیره وضعیت
      localStorage.setItem('sidebarCollapsed', sidebar.classList.contains('collapsed'));
    });

    // مدیریت ریسپانسیو
    function handleResponsive() {
      if (window.innerWidth <= 992) {
        sidebar.classList.remove('show-mobile', 'collapsed');
        mainContent.classList.remove('expanded');
      } else {
        if (localStorage.getItem('sidebarCollapsed') === 'true') {
          sidebar.classList.add('collapsed');
          mainContent.classList.add('expanded');
        } else {
          sidebar.classList.remove('collapsed');
          mainContent.classList.remove('expanded');
        }
      }
    }

    // اجرای اولیه و رویداد resize
    handleResponsive();
    window.addEventListener('resize', handleResponsive);
  });
</script>

</body>
</html>
