<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
  <meta charset="UTF-8">
  <title>پنل مدیریت</title>
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
      --bg-light: #f8fafd;
      --text-dark: #2d3748;
      --sidebar-width: 300px;
      --collapsed-width: 80px;
      --toggle-btn-size: 42px;
      --content-padding: 35px;
      --cart-width: 350px;
      --transition-speed: 0.45s;
      --easing: cubic-bezier(0.68, -0.55, 0.265, 1.55);
      --shadow-sm: 0 1px 3px rgba(0, 0, 0, 0.1);
      --shadow-md: 0 4px 6px rgba(0, 0, 0, 0.1);
      --shadow-lg: 0 10px 15px rgba(0, 0, 0, 0.1);
    }

    body {
      margin: 0;
      font-family: "Vazirmatn", sans-serif;
      background-color: var(--bg-light);
      color: var(--text-dark);
      overflow-x: hidden;
      transition: margin-right var(--transition-speed) var(--easing);
    }

    .card-text {
      font-size: 20px;
      font-weight: bold;
    }

    .search-bar {
      max-width: 500px;
      margin: auto;
    }

    .dropdown-menu {
      padding: 5px;
      text-align: center;
    }

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
      box-shadow: var(--shadow-lg);
      border-left: 1px solid rgba(255, 255, 255, 0.15);
      display: flex;
      flex-direction: column;
      overflow: hidden;
    }

    .sidebar.collapsed {
      width: var(--collapsed-width);
      box-shadow: var(--shadow-md);
    }

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

    .sidebar-toggle {
      position: absolute;
      left: -21px;
      top: 50%;
      transform: translateY(-50%);
      background: var(--primary-color);
      color: white;
      border-radius: 50%;
      width: var(--toggle-btn-size);
      height: var(--toggle-btn-size);
      display: flex;
      align-items: center;
      justify-content: center;
      cursor: pointer;
      transition: all var(--transition-speed) var(--easing);
      box-shadow: var(--shadow-md);
      z-index: 1051;
      border: 2px solid rgba(255, 255, 255, 0.1);
    }

    .sidebar-toggle:hover {
      background: var(--primary-dark);
      transform: translateY(-50%) scale(1.08);
      box-shadow: var(--shadow-lg);
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
      box-shadow: var(--shadow-sm);
    }

    .sidebar.collapsed .nav-item:hover::after {
      opacity: 1;
      margin-right: 10px;
    }

    .main-content {
      padding: var(--content-padding);
      min-height: 100vh;
      margin-right: calc(var(--sidebar-width) + var(--cart-width));
      transition: margin-right var(--transition-speed) var(--easing);
    }

    .main-content.expanded {
      margin-right: calc(var(--collapsed-width) + var(--cart-width));
    }

    .category-dropdown .dropdown-toggle {
      background-color: var(--primary-color);
      color: white;
      border: none;
      border-radius: 20px;
      padding: 12px 16px;
      font-size: 0.9rem;
      transition: all 0.2s ease;
    }

    .category-dropdown .dropdown-toggle:hover {
      background-color: var(--primary-dark);
    }

    .category-dropdown .dropdown-menu {
      border-radius: 10px;
      box-shadow: var(--shadow-lg);
      border: none;
      padding: 5px;
    }

    .category-dropdown .dropdown-item {
      border-radius: 6px;
      padding: 8px 12px;
      margin: 2px 0;
      font-size: 0.9rem;
      transition: all 0.2s ease;
    }

    .category-dropdown .dropdown-item.active,
    .category-dropdown .dropdown-item:active {
      background-color: var(--primary-color);
    }

    .category-dropdown .dropdown-item:not(.active):hover {
      background-color: #f1f3f5;
    }

    .product-card {
      transition: transform 0.2s ease, box-shadow 0.2s ease;
    }

    .product-card:hover {
      transform: translateY(-5px);
      box-shadow: var(--shadow-md);
    }

    .product-card .btn {
      transition: all 0.2s ease;
    }

    .cart-sidebar {
      height: 100vh;
      width: var(--cart-width);
      position: fixed;
      right: var(--sidebar-width);
      top: 0;
      background: var(--bg-light);
      border-left: 1px solid var(--text-muted);
      padding: 20px;
      transition: all var(--transition-speed) var(--easing);
      z-index: 1049;
      box-shadow: var(--shadow-lg);
      transform: translateX(0);
    }

    .sidebar.collapsed ~ .cart-sidebar {
      right: var(--collapsed-width);
    }

    .cart-header {
      display: flex;
      justify-content: space-between;
      align-items: center;
      border-bottom: 1px solid var(--text-muted);
      padding-bottom: 15px;
      margin-bottom: 15px;
    }

    .cart-item {
      display: flex;
      align-items: center;
      padding: 10px;
      border-bottom: 1px solid var(--text-muted);
      margin-bottom: 10px;
    }

    .cart-item img {
      width: 60px;
      height: 60px;
      object-fit: cover;
      margin-left: 10px;
      border-radius: 5px;
    }

    .cart-item-details {
      flex-grow: 1;
    }

    .cart-item-remove {
      cursor: pointer;
      color: #dc3545;
    }

    .cart-total {
      margin-top: 20px;
      font-weight: bold;
    }

    .barcode-btn {
      background-color: var(--primary-color);
      color: white;
      border: none;
      border-radius: 20px;
      padding: 12px 16px;
      font-size: 0.9rem;
      transition: background-color 0.2s ease;
    }

    .barcode-btn:hover {
      background-color: var(--primary-dark);
      color: white;
    }

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
        padding: 20px;
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

      .cart-sidebar {
        width: 100%;
        right: 0;
      }

      .sidebar.collapsed ~ .cart-sidebar {
        right: 0;
      }
    }

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
    <button class="sidebar-toggle" id="sidebarToggle" aria-label="بستن/باز کردن منو">
      <i class="bi bi-chevron-right"></i>
    </button>
    <div class="sidebar-logo">
      <h2 class="sidebar-title">پایانه فروش</h2>
      <span class="sidebar-subtitle">پنل مدیریت</span>
    </div>
  </div>
  <nav class="sidebar-nav">
    <div class="nav-item" data-tooltip="ثبت سفارش">
      <a href="#" class="nav-link active" aria-current="page">
        <i class="bi bi-bag-check nav-icon"></i>
        <span class="nav-text">ثبت سفارش</span>
      </a>
    </div>
    <div class="nav-item" data-tooltip="محصولات و انبار">
      <a href="#" class="nav-link">
        <i class="bi bi-shop-window nav-icon"></i>
        <span class="nav-text">محصولات و انبار</span>
      </a>
    </div>
    <div class="nav-item" data-tooltip="پرداخت و فاکتور">
      <a href="#" class="nav-link">
        <i class="bi bi-credit-card-fill nav-icon"></i>
        <span class="nav-text">پرداخت و فاکتور</span>
      </a>
    </div>
    <div class="nav-item" data-tooltip="گزارش ها">
      <a href="#" class="nav-link">
        <i class="bi bi-stickies nav-icon"></i>
        <span class="nav-text">گزارش ها</span>
      </a>
    </div>
    <div class="nav-item" data-tooltip="کاربران و نقش ها">
      <a href="#" class="nav-link">
        <i class="bi bi-people nav-icon"></i>
        <span class="nav-text">کاربران و نقش ها</span>
      </a>
    </div>
  </nav>
</div>

<!-- Shopping Cart Sidebar -->
<div class="cart-sidebar" id="cartSidebar">
  <div class="cart-header">
    <h3>سبد خرید</h3>
  </div>
  <div id="cartItems"></div>
  <div class="cart-total" id="cartTotal">جمع کل: ۰ تومان</div>
</div>

<div class="main-content" id="mainContent">
  <div class="container mt-0">
    <!-- نوبار دسته‌بندی‌ها -->
    <div class="row mb-3">
      <div class="col-12">
        <div class="card shadow-sm">
          <div class="card-body p-2">
            <div class="d-flex flex-row-reverse align-items-center">
              <div class="dropdown category-dropdown me-2">
                <button class="btn dropdown-toggle" type="button" id="categoryDropdown" data-bs-toggle="dropdown"
                        aria-expanded="false" aria-haspopup="true">
                  <i class="bi bi-list-ul me-2"></i> دسته‌بندی محصولات
                </button>
                <ul class="dropdown-menu" aria-labelledby="categoryDropdown">
                  <li><a class="dropdown-item active" href="#" role="button">شومیز</a></li>
                  <li><a class="dropdown-item" href="#" role="button">مانتو</a></li>
                  <li><a class="dropdown-item" href="#" role="button">شلوار</a></li>
                  <li><a class="dropdown-item" href="#" role="button">کت و شلوار</a></li>
                  <li><a class="dropdown-item" href="#" role="button">شال و روسری</a></li>
                  <li><a class="dropdown-item" href="#" role="button">کیف</a></li>
                  <li><a class="dropdown-item" href="#" role="button">لباس خانگی</a></li>
                </ul>
              </div>
              <button class="btn barcode-btn" id="barcodeBtn">
                <i class="bi bi-upc-scan me-2"></i> اسکن بارکد
              </button>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- محتوای محصولات -->
    <div class="row row-cols-2 row-cols-md-3 row-cols-lg-4 row-cols-xl-5 row-cols-xxl-6 g-4" id="productsContainer">
      <div class="col" data-category="شومیز">
        <div class="card h-100 product-card" data-barcode="123456789012">
          <img src="https://lebasesabzz.com/storage/files/9/jiji/68726c7a086ff.webp" class="card-img-top" alt="شومیز">
          <div class="card-body">
            <h5 class="card-title">شومیز</h5>
            <p class="card-text"><i class="bi bi-tag"></i> قیمت : 1،200،000 تومان</p>
            <a href="#" class="btn btn-primary add-to-cart" role="button"><i class="bi bi-bag-plus-fill"></i> افزودن</a>
          </div>
        </div>
      </div>
      <div class="col" data-category="مانتو">
        <div class="card h-100 product-card" data-barcode="234567890123">
          <img src="https://lebasesabzz.com/storage/files/9/%D8%AC%DB%8C%D9%86/688118aa2d5a2.webp" class="card-img-top"
               alt="مانتو">
          <div class="card-body">
            <h5 class="card-title">مانتو</h5>
            <p class="card-text"><i class="bi bi-tag"></i> قیمت : 1،550،000 تومان</p>
            <a href="#" class="btn btn-primary add-to-cart" role="button"><i class="bi bi-bag-plus-fill"></i> افزودن</a>
          </div>
        </div>
      </div>
      <div class="col" data-category="شلوار">
        <div class="card h-100 product-card" data-barcode="345678901234">
          <img src="https://lebasesabzz.com/storage/files/9/%D8%AC%DB%8C%D9%86/68834b459107b.webp" class="card-img-top"
               alt="شلوار">
          <div class="card-body">
            <h5 class="card-title">شلوار</h5>
            <p class="card-text"><i class="bi bi-tag"></i> قیمت : 2،200،000 تومان</p>
            <a href="#" class="btn btn-primary add-to-cart" role="button"><i class="bi bi-bag-plus-fill"></i> افزودن</a>
          </div>
        </div>
      </div>
      <div class="col" data-category="کت و شلوار">
        <div class="card h-100 product-card" data-barcode="456789012345">
          <img src="https://lebasesabzz.com/storage/files/9/%D8%B3%D8%A7%D8%AF%D9%87/68826e9a02322.webp"
               class="card-img-top" alt="کت و شلوار">
          <div class="card-body">
            <h5 class="card-title">کت و شلوار</h5>
            <p class="card-text"><i class="bi bi-tag"></i> قیمت : 3،000،000 تومان</p>
            <a href="#" class="btn btn-primary add-to-cart" role="button"><i class="bi bi-bag-plus-fill"></i> افزودن</a>
          </div>
        </div>
      </div>
      <div class="col" data-category="کیف">
        <div class="card h-100 product-card" data-barcode="567890123456">
          <img src="https://bagpanizz.ir/wp-content/uploads/2024/05/IMG_9387-600x720.jpeg" class="card-img-top"
               alt="کیف">
          <div class="card-body">
            <h5 class="card-title">کیف</h5>
            <p class="card-text"><i class="bi bi-tag"></i> قیمت : 3،000،000 تومان</p>
            <a href="#" class="btn btn-primary add-to-cart" role="button"><i class="bi bi-bag-plus-fill"></i> افزودن</a>
          </div>
        </div>
      </div>
      <div class="col" data-category="لباس خانگی">
        <div class="card h-100 product-card" data-barcode="678901234567">
          <img src="https://ibolak.com/storage/image/2025/6/optimized/1749618907-YQZv1LxYECfc0VbH.webp"
               class="card-img-top" alt="لباس خانگی">
          <div class="card-body">
            <h5 class="card-title">لباس خانگی</h5>
            <p class="card-text"><i class="bi bi-tag"></i> قیمت : 3،000،000 تومان</p>
            <a href="#" class="btn btn-primary add-to-cart" role="button"><i class="bi bi-bag-plus-fill"></i> افزودن</a>
          </div>
        </div>
      </div>
      <div class="col" data-category="شال و روسری">
        <div class="card h-100 product-card" data-barcode="789012345678">
          <img src="https://lebasesabzz.com/storage/files/9/%D8%AF%D8%A8%D9%84%20%D9%81%DB%8C%D8%B3/68753c61d9b10.webp"
               class="card-img-top" alt="شال و روسری">
          <div class="card-body">
            <h5 class="card-title">شال و روسری</h5>
            <p class="card-text"><i class="bi bi-tag"></i> قیمت : 750،000 تومان</p>
            <a href="#" class="btn btn-primary add-to-cart" role="button"><i class="bi bi-bag-plus-fill"></i> افزودن</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Modal for Size and Color Selection -->
<div class="modal fade" id="productModal" tabindex="-1" aria-labelledby="productModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="productModalLabel">انتخاب مشخصات محصول</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="بستن"></button>
      </div>
      <div class="modal-body">
        <form id="productForm">
          <div class="mb-3">
            <label for="sizeSelect" class="form-label">سایز</label>
            <select class="form-select" id="sizeSelect" required>
              <option value="" disabled selected>انتخاب سایز</option>
              <option value="S">S</option>
              <option value="M">M</option>
              <option value="L">L</option>
              <option value="XL">XL</option>
            </select>
          </div>
          <div class="mb-3">
            <label for="colorSelect" class="form-label">رنگ</label>
            <select class="form-select" id="colorSelect" required>
              <option value="" disabled selected>انتخاب رنگ</option>
              <option value="قرمز">قرمز</option>
              <option value="آبی">آبی</option>
              <option value="مشکی">مشکی</option>
              <option value="سفید">سفید</option>
            </select>
          </div>
          <div class="mb-3">
            <label for="quantityInput" class="form-label">تعداد</label>
            <p id="stockInfo" class="text-muted mb-2"></p>
            <input type="number" class="form-control" id="quantityInput" min="1" required>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">بستن</button>
        <button type="button" class="btn btn-primary" id="confirmAddToCart">افزودن به سبد خرید</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal for Barcode Scanning -->
<div class="modal fade" id="barcodeModal" tabindex="-1" aria-labelledby="barcodeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="barcodeModalLabel">اسکن بارکد</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="بستن"></button>
      </div>
      <div class="modal-body">
        <form id="barcodeForm">
          <div class="mb-3 text-center">
            <button type="button" class="btn btn-primary" id="scanBarcodeBtn">اسکن بارکد</button>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">بستن</button>
      </div>
    </div>
  </div>
</div>

<!-- Bootstrap JS Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<script>
  document.addEventListener('DOMContentLoaded', function () {
    try {
      // عناصر اصلی
      const sidebar = document.getElementById('sidebar');
      const sidebarToggle = document.getElementById('sidebarToggle');
      const mainContent = document.getElementById('mainContent');
      const productsContainer = document.getElementById('productsContainer');
      const cartSidebar = document.getElementById('cartSidebar');
      const barcodeBtn = document.getElementById('barcodeBtn');
      const cartItems = document.getElementById('cartItems');
      const cartTotal = document.getElementById('cartTotal');
      const productModal = new bootstrap.Modal(document.getElementById('productModal'));
      const barcodeModal = new bootstrap.Modal(document.getElementById('barcodeModal'));
      const productForm = document.getElementById('productForm');
      const barcodeForm = document.getElementById('barcodeForm');
      const sizeSelect = document.getElementById('sizeSelect');
      const colorSelect = document.getElementById('colorSelect');
      const quantityInput = document.getElementById('quantityInput');
      const stockInfo = document.getElementById('stockInfo');
      const scanBarcodeBtn = document.getElementById('scanBarcodeBtn');
      const confirmAddToCart = document.getElementById('confirmAddToCart');
      let currentProduct = null;
      let cart = JSON.parse(localStorage.getItem('cart')) || [];
      let currentStock = 0;

      // بررسی وضعیت ذخیره شده در localStorage
      const isCollapsed = localStorage.getItem('sidebarCollapsed') === 'true';

      // اعمال وضعیت اولیه
      if (isCollapsed) {
        sidebar.classList.add('collapsed');
        mainContent.classList.add('expanded');
      }

      // نمایش سبد خرید اولیه
      updateCart();

      // مدیریت رویداد کلیک برای دکمه‌های toggle
      sidebarToggle.addEventListener('click', toggleSidebar);
      barcodeBtn.addEventListener('click', () => barcodeModal.show());

      // مدیریت رویدادهای منوی آبشاری و افزودن محصول
      document.addEventListener('click', function (e) {
        if (e.target.classList.contains('dropdown-item')) {
          handleCategorySelection(e.target);
        }
        if (e.target.closest('.add-to-cart')) {
          e.preventDefault();
          showProductModal(e.target.closest('.product-card'));
        }
      });

      // مدیریت افزودن به سبد خرید از مودال
      confirmAddToCart.addEventListener('click', function () {
        if (productForm.checkValidity()) {
          const quantity = parseInt(quantityInput.value);
          if (quantity > currentStock) {
            alert(`تعداد انتخاب شده بیشتر از موجودی (${currentStock}) است!`);
            return;
          }
          addToCart();
          productModal.hide();
          productForm.reset();
        } else {
          productForm.reportValidity();
        }
      });

      // مدیریت اسکن بارکد
      scanBarcodeBtn.addEventListener('click', function () {
        // شبیه‌سازی اسکن بارکد با انتخاب تصادفی محصول
        const productCards = document.querySelectorAll('.product-card');
        const randomIndex = Math.floor(Math.random() * productCards.length);
        const productCard = productCards[randomIndex];
        if (productCard) {
          alert('بارکد اسکن شد');
          barcodeModal.hide();
          showProductModal(productCard);
        } else {
          alert('هیچ محصولی یافت نشد.');
        }
      });

      // حذف آیتم از سبد خرید
      cartItems.addEventListener('click', function (e) {
        if (e.target.classList.contains('cart-item-remove')) {
          const index = e.target.dataset.index;
          cart.splice(index, 1);
          localStorage.setItem('cart', JSON.stringify(cart));
          updateCart();
        }
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

      // توابع کمکی
      function toggleSidebar() {
        sidebar.classList.toggle('collapsed');
        mainContent.classList.toggle('expanded');
        localStorage.setItem('sidebarCollapsed', sidebar.classList.contains('collapsed'));
      }

      function handleCategorySelection(selectedItem) {
        const dropdownItems = document.querySelectorAll('.category-dropdown .dropdown-item');
        const selectedCategory = selectedItem.textContent.trim();
        const productCards = document.querySelectorAll('#productsContainer .col');
        dropdownItems.forEach(item => item.classList.remove('active'));
        selectedItem.classList.add('active');

        const dropdownToggle = document.getElementById('categoryDropdown');
        dropdownToggle.innerHTML = `<i class="bi bi-list-ul me-2"></i> ${selectedCategory}`;

        productCards.forEach(card => {
          const category = card.getAttribute('data-category');
          if (category === selectedCategory) {
            card.style.display = 'block';
          } else {
            card.style.display = 'none';
          }
        });
      }

      function showProductModal(productCard) {
        currentProduct = productCard;
        const productName = productCard.querySelector('.card-title').textContent;
        document.getElementById('productModalLabel').textContent = `انتخاب مشخصات محصول: ${productName}`;

        // تولید تعداد موجودی رندوم (1 تا 10)
        currentStock = Math.floor(Math.random() * 10) + 1;
        stockInfo.textContent = `موجودی: ${currentStock} عدد`;
        quantityInput.max = currentStock;
        quantityInput.value = 1;

        productModal.show();
      }

      function addToCart() {
        const productName = currentProduct.querySelector('.card-title').textContent;
        const productPrice = parseInt(currentProduct.querySelector('.card-text').textContent.replace(/[^0-9]/g, ''));
        const productImage = currentProduct.querySelector('.card-img-top').src;
        const size = sizeSelect.value;
        const color = colorSelect.value;
        const quantity = parseInt(quantityInput.value);

        const cartItem = {
          name: productName,
          price: productPrice,
          image: productImage,
          size: size,
          color: color,
          quantity: quantity
        };

        cart.push(cartItem);
        localStorage.setItem('cart', JSON.stringify(cart));
        updateCart();
        alert(`محصول "${productName}" با سایز ${size} و رنگ ${color} به سبد خرید اضافه شد`);
      }

      function updateCart() {
        cartItems.innerHTML = '';
        let total = 0;

        cart.forEach((item, index) => {
          total += item.price * item.quantity;
          cartItems.innerHTML += `
            <div class="cart-item">
              <img src="${item.image}" alt="${item.name}">
              <div class="cart-item-details">
                <h6>${item.name}</h6>
                <p>سایز: ${item.size} | رنگ: ${item.color} | تعداد: ${item.quantity}</p>
                <p>قیمت: ${(item.price * item.quantity).toLocaleString('fa-IR')} تومان</p>
              </div>
              <i class="bi bi-trash cart-item-remove" data-index="${index}"></i>
            </div>
          `;
        });

        cartTotal.textContent = `جمع کل: ${total.toLocaleString('fa-IR')} تومان`;
      }

    } catch (error) {
      console.error('خطا در اجرای اسکریپت:', error);
    }
  });
</script>
</body>
</html>
