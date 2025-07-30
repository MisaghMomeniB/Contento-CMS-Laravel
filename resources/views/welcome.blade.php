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
            --secondary-color: #28272C;
            --accent-color: #5c7cfa;
            --text-light: #f8f9fa;
            --text-muted: #6b7280;
            --bg-light: #f8fafd;
            --text-dark: #1f2a44;
            --sidebar-width: 300px;
            --collapsed-width: 80px;
            --toggle-btn-size: 42px;
            --content-padding: 35px;
            --cart-width: 350px;
            --transition-speed: 0.45s;
            --easing: cubic-bezier(0.68, -0.55, 0.265, 1.55);
            --shadow-sm: 0 1px 3px rgba(0, 0, 0, 0.1);
            --shadow-md: 0 4px 6px rgba(0, 0, 0, 0.1);
            --shadow-lg: 0 10px 15px rgba(0, 0, 0, 0.15);
            --shadow-xl: 0 15px 25px rgba(0, 0, 0, 0.2);
            --font-size-base: 1rem;
        }

        body {
            margin: 0;
            font-family: "Vazirmatn", sans-serif;
            background-color: var(--bg-light);
            color: var(--text-dark);
            overflow-x: hidden;
            transition: margin-right var(--transition-speed) var(--easing);
            font-size: var(--font-size-base);
        }

        .search-bar {
            max-width: 500px;
            margin: auto;
        }

        .barcode-section {
            display: flex;
            align-items: center;
            gap: 10px;
            flex-grow: 1;
        }

        .form-label {
            font-size: 0.9rem;
            color: var(--text-dark);
            font-weight: 500;
        }

        .form-control,
        .form-select {
            border-radius: 8px;
            border: 1px solid var(--text-muted);
            padding: 8px 12px;
            font-size: 0.9rem;
            margin-right: 12px;
            transition: all 0.2s ease;
            background-color: white;
        }

        .form-control:focus,
        .form-select:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 3px rgba(60, 85, 212, 0.2);
            outline: none;
        }

        .form-control::placeholder {
            color: var(--text-muted);
            font-size: 0.85rem;
        }

        .dropdown-menu {
            padding: 5px;
            text-align: center;
            font-size: 0.9rem;
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
            position: relative;
            height: 200px;
            overflow: hidden;
            border-radius: 12px;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            cursor: pointer;
        }

        .product-card:hover {
            transform: translateY(-5px);
            box-shadow: var(--shadow-lg);
        }

        .product-card .card-img-container {
            position: relative;
            height: 100%;
            width: 100%;
        }

        .product-card .card-img-top {
            width: 100%;
            height: 100%;
            object-fit: cover;
            border-radius: 12px;
            transition: transform 0.3s ease;
        }

        .product-card:hover .card-img-top {
            transform: scale(1.05);
        }

        .product-card .card-overlay {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            background: linear-gradient(to top, rgba(108, 117, 125, 0.85), transparent 50px);
            padding: 8px 10px;
            display: flex;
            flex-direction: column;
            gap: 4px;
        }

        .product-card .card-title {
            font-size: 0.9rem;
            font-weight: 700;
            margin: 0;
            color: var(--text-light);
            text-shadow: 0 1px 1px rgba(0, 0, 0, 0.2);
        }

        .product-card .product-number {
            font-size: 0.75rem;
            font-weight: 500;
            color: var(--text-light);
            text-shadow: 0 1px 1px rgba(0, 0, 0, 0.2);
        }

        .product-card .card-text {
            font-size: 0.85rem;
            font-weight: 600;
            margin: 0;
            color: var(--text-light);
            text-shadow: 0 1px 1px rgba(0, 0, 0, 0.2);
        }

        .product-card .card-text i {
            margin-left: 4px;
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
            display: flex;
            flex-direction: column;
        }

        .sidebar.collapsed~.cart-sidebar {
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

        .cart-header h3 {
            font-size: 1.25rem;
        }

        .cart-item {
            display: flex;
            align-items: center;
            padding: 10px;
            border-bottom: 1px solid var(--text-muted);
            margin-bottom: 10px;
            border-radius: 8px;
            background: #ffffff;
            transition: all 0.2s ease;
        }

        .cart-item:hover {
            box-shadow: var(--shadow-sm);
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

        .cart-item-details h6 {
            font-size: 1rem;
            font-weight: 600;
        }

        .cart-item-details p {
            font-size: 0.9rem;
            color: var(--text-muted);
            margin-bottom: 5px;
        }

        .cart-item-remove {
            cursor: pointer;
            color: #dc3545;
            font-size: 1.2rem;
            transition: color 0.2s ease;
        }

        .cart-item-remove:hover {
            color: #b02a37;
        }

        .cart-footer {
            margin-top: auto;
            padding-top: 15px;
            border-top: 1px solid var(--text-muted);
        }

        .cart-discount {
            display: flex;
            flex-direction: column;
            gap: 10px;
            margin-bottom: 15px;
        }

        .cart-discount select,
        .cart-discount input {
            flex: 1;
        }

        .cart-discount .btn {
            font-size: 0.9rem;
            padding: 8px 16px;
        }

        .cart-total-details p {
            font-size: 1rem;
            margin-bottom: 5px;
            color: var(--text-dark);
        }

        .cart-total-details .discount-amount {
            color: #28a745;
        }

        .cart-total-details .final-total {
            font-size: 1.2rem;
            font-weight: bold;
            color: var(--primary-color);
        }

        .cart-pay-btn {
            width: 100%;
            font-size: 1rem;
            padding: 12px;
            border-radius: 10px;
            margin-top: 15px;
        }

        .quantity-control {
            display: flex;
            gap: 8px;
            align-items: center;
        }

        .quantity-btn {
            width: 48px;
            height: 48px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.4rem;
            font-weight: bold;
            border: none;
            border-radius: 12px;
            transition: all 0.3s ease;
            box-shadow: var(--shadow-sm);
        }

        .quantity-btn.plus {
            background: #28a745;
            color: white;
        }

        .quantity-btn.plus:hover:not(:disabled) {
            background: #1e7e34;
            transform: scale(1.05);
            box-shadow: var(--shadow-md);
        }

        .quantity-btn.minus {
            background: #dc3545;
            color: white;
        }

        .quantity-btn.minus:hover:not(:disabled) {
            background: #b02a37;
            transform: scale(1.05);
            box-shadow: var(--shadow-md);
        }

        .quantity-btn:disabled {
            background: #6c757d;
            cursor: not-allowed;
            opacity: 0.6;
        }

        .discount-number-pad {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 2px;
            margin-bottom: 10px;
            background: #ffffff;
            border-radius: 12px;
            padding: 10px;
            box-shadow: var(--shadow-sm);
        }

        .discount-number-pad .btn {
            font-size: 1rem;
            padding: 5px;
            border-radius: 8px;
            background: #f8f9fa;
            border: 1px solid var(--text-muted);
            transition: all 0.1s ease;
        }

        .discount-number-pad .btn:hover {
            background: var(--primary-color);
            color: white;
            border-color: var(--primary-color);
        }

        .discount-number-pad .btn-clear {
            background: #dc3545;
            color: white;
            border: none;
        }

        .discount-number-pad .btn-clear:hover {
            background: #b02a37;
        }

        .discount-number-pad .btn-enter {
            background: #28a745;
            color: white;
            border: none;
        }

        .discount-number-pad .btn-enter:hover {
            background: #1e7e34;
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
                margin-right: var(--cart-width);
                padding: 20px;
            }

            .main-content.expanded {
                margin-right: var(--cart-width);
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

            .sidebar.collapsed~.cart-sidebar {
                right: 0;
            }

            .product-card {
                height: 180px;
            }

            .product-card .card-overlay {
                background: linear-gradient(to top, rgba(108, 117, 125, 0.85), transparent 40px);
                padding: 6px 8px;
                gap: 3px;
            }

            .product-card .card-title {
                font-size: 0.85rem;
            }

            .product-card .product-number {
                font-size: 0.7rem;
            }

            .product-card .card-text {
                font-size: 0.8rem;
            }

            .quantity-btn {
                width: 40px;
                height: 40px;
                font-size: 1.2rem;
            }

            .discount-number-pad .btn {
                font-size: 1rem;
                padding: 10px;
            }
        }

        @media (max-width: 576px) {
            .cart-sidebar {
                width: 100%;
            }

            .main-content {
                padding: 20px;
                margin-right: 0;
            }

            .barcode-section {
                flex-direction: column;
                gap: 10px;
            }

            .barcode-section input {
                width: 100%;
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

    <div class="cart-sidebar" id="cartSidebar">
        <div class="cart-header">
            <h3>سبد خرید</h3>
            <div class="barcode-section">
                <input type="text" class="form-control" id="barcodeInput" name="barcode" placeholder="کد محصول"
                    aria-label="کد محصول">
            </div>
        </div>
        <div id="cartItems"></div>
        <div class="cart-footer">
            <div class="cart-discount">
                <div class="discount-number-pad">
                    <button class="btn" data-number="1">۱</button>
                    <button class="btn" data-number="2">۲</button>
                    <button class="btn" data-number="3">۳</button>
                    <button class="btn" data-number="4">۴</button>
                    <button class="btn" data-number="5">۵</button>
                    <button class="btn" data-number="6">۶</button>
                    <button class="btn" data-number="7">۷</button>
                    <button class="btn" data-number="8">۸</button>
                    <button class="btn" data-number="9">۹</button>
                    <button class="btn btn-clear">پاک</button>
                    <button class="btn" data-number="0">۰</button>
                    <button class="btn btn-enter">تأیید</button>
                </div>
                <div class="d-flex gap-2">
                    <select class="form-select" id="discountType">
                        <option value="percentage">درصد</option>
                        <option value="amount">تومان</option>
                    </select>
                    <input type="number" class="form-control" id="discountValue" placeholder="مقدار تخفیف"
                        min="0">
                    <button class="btn btn-primary" id="applyDiscount">اعمال</button>
                </div>
            </div>
            <div class="cart-total-details">
                <p id="cartSubtotal">جمع کل: ۰ تومان</p>
                <p id="cartDiscount" class="discount-amount">تخفیف: ۰ تومان</p>
                <p id="cartFinalTotal" class="final-total">مبلغ نهایی: ۰ تومان</p>
            </div>
            <button class="btn btn-success cart-pay-btn" id="payButton">پرداخت</button>
        </div>
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
                                    <button class="btn dropdown-toggle" type="button" id="categoryDropdown"
                                        data-bs-toggle="dropdown" aria-expanded="false" aria-haspopup="true">
                                        <i class="bi bi-list-ul me-2"></i> دسته‌بندی محصولات
                                    </button>
                                    <ul class="dropdown-menu" aria-labelledby="categoryDropdown">
                                        <li><a class="dropdown-item" href="#" role="button">همه دسته‌بندی‌ها</a></li>
                                        <li><a class="dropdown-item active" href="#" role="button">شومیز</a>
                                        </li>
                                        <li><a class="dropdown-item" href="#" role="button">مانتو</a></li>
                                        <li><a class="dropdown-item" href="#" role="button">شلوار</a></li>
                                        <li><a class="dropdown-item" href="#" role="button">کت و شلوار</a>
                                        </li>
                                        <li><a class="dropdown-item" href="#" role="button">شال و روسری</a>
                                        </li>
                                        <li><a class="dropdown-item" href="#" role="button">کیف</a></li>
                                        <li><a class="dropdown-item" href="#" role="button">لباس خانگی</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- محتوای محصولات -->
            <div class="row row-cols-1 row-cols-md-3 row-cols-lg-4 row-cols-xl-6 row-cols-xxl-8 g-3"
                id="productsContainer">
                <div class="col" data-category="شومیز">
                    <div class="product-card">
                        <div class="card-img-container">
                            <img src="https://lebasesabzz.com/storage/files/9/jiji/68726c7a086ff.webp"
                                class="card-img-top" alt="شومیز">
                            <div class="card-overlay">
                                <h5 class="card-title">شومیز</h5>
                                <h5 class="product-number">کد محصول: 1808</h5>
                                <p class="card-text"><i class="bi bi-tag"></i> ۱,۲۰۰,۰۰۰ تومان</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col" data-category="مانتو">
                    <div class="product-card">
                        <div class="card-img-container">
                            <img src="https://lebasesabzz.com/storage/files/9/%D8%AC%DB%8C%D9%86/688118aa2d5a2.webp"
                                class="card-img-top" alt="مانتو">
                            <div class="card-overlay">
                                <h5 class="card-title">مانتو</h5>
                                <h5 class="product-number">کد محصول: 1809</h5>
                                <p class="card-text"><i class="bi bi-tag"></i> ۱,۵۵۰,۰۰۰ تومان</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col" data-category="شلوار">
                    <div class="product-card">
                        <div class="card-img-container">
                            <img src="https://lebasesabzz.com/storage/files/9/%D8%AC%DB%8C%D9%86/68834b459107b.webp"
                                class="card-img-top" alt="شلوار">
                            <div class="card-overlay">
                                <h5 class="card-title">شلوار</h5>
                                <h5 class="product-number">کد محصول: 1810</h5>
                                <p class="card-text"><i class="bi bi-tag"></i> ۲,۲۰۰,۰۰۰ تومان</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col" data-category="کت و شلوار">
                    <div class="product-card">
                        <div class="card-img-container">
                            <img src="https://lebasesabzz.com/storage/files/9/%D8%B3%D8%A7%D8%AF%D9%87/68826e9a02322.webp"
                                class="card-img-top" alt="کت و شلوار">
                            <div class="card-overlay">
                                <h5 class="card-title">کت و شلوار</h5>
                                <h5 class="product-number">کد محصول: 1811</h5>
                                <p class="card-text"><i class="bi bi-tag"></i> ۳,۰۰۰,۰۰۰ تومان</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col" data-category="کیف">
                    <div class="product-card">
                        <div class="card-img-container">
                            <img src="https://bagpanizz.ir/wp-content/uploads/2024/05/IMG_9387-600x720.jpeg"
                                class="card-img-top" alt="کیف">
                            <div class="card-overlay">
                                <h5 class="card-title">کیف</h5>
                                <h5 class="product-number">کد محصول: 1812</h5>
                                <p class="card-text"><i class="bi bi-tag"></i> ۳,۰۰۰,۰۰۰ تومان</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col" data-category="لباس خانگی">
                    <div class="product-card">
                        <div class="card-img-container">
                            <img src="https://ibolak.com/storage/image/2025/6/optimized/1749618907-YQZv1LxYECfc0VbH.webp"
                                class="card-img-top" alt="لباس خانگی">
                            <div class="card-overlay">
                                <h5 class="card-title">لباس خانگی</h5>
                                <h5 class="product-number">کد محصول: 1813</h5>
                                <p class="card-text"><i class="bi bi-tag"></i> ۳,۰۰۰,۰۰۰ تومان</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col" data-category="شال و روسری">
                    <div class="product-card">
                        <div class="card-img-container">
                            <img src="https://lebasesabzz.com/storage/files/9/%D8%AF%D8%A8%D9%84%20%D9%81%DB%8C%D8%B3/68753c61d9b10.webp"
                                class="card-img-top" alt="شال و روسری">
                            <div class="card-overlay">
                                <h5 class="card-title">شال و روسری</h5>
                                <h5 class="product-number">کد محصول: 1814</h5>
                                <p class="card-text"><i class="bi bi-tag"></i> ۷۵۰,۰۰۰ تومان</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal for Size and Color Selection -->
    <div class="modal fade" id="productModal" tabindex="-1" aria-labelledby="productModalLabel"
        aria-hidden="true">
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
                            <div class="quantity-control">
                                <input type="number" class="form-control text-center" id="quantityInput"
                                    min="1" required>
                                <div class="d-flex gap-2">
                                    <button type="button" class="quantity-btn plus" id="increaseQuantity">+</button>
                                    <button type="button" class="quantity-btn minus"
                                        id="decreaseQuantity">-</button>
                                </div>
                            </div>
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

    <!-- Modal for Payment -->
    <div class="modal fade" id="paymentModal" tabindex="-1" aria-labelledby="paymentModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="paymentModalLabel">پرداخت</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="بستن"></button>
                </div>
                <div class="modal-body">
                    <form id="paymentForm">
                        <div class="mb-3">
                            <label for="paymentMethod" class="form-label">روش پرداخت</label>
                            <select class="form-select" id="paymentMethod" required>
                                <option value="" disabled selected>انتخاب روش پرداخت</option>
                                <option value="cash">نقدی</option>
                                <option value="card">کارت بانکی</option>
                                <option value="online">پرداخت آنلاین</option>
                            </select>
                        </div>
                        <div class="mb-3" id="cardDetails" style="display: none;">
                            <label for="cardNumber" class="form-label">شماره کارت</label>
                            <input type="text" class="form-control" id="cardNumber" placeholder="شماره کارت">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">بستن</button>
                    <button type="button" class="btn btn-primary" id="confirmPayment">تأیید پرداخت</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        function persianToEnglishDigits(str) {
            return str.replace(/[۰-۹]/g, (d) => '۰۱۲۳۴۵۶۷۸۹'.indexOf(d));
        }

        document.addEventListener('DOMContentLoaded', function() {
            try {
                // عناصر اصلی
                const sidebar = document.getElementById('sidebar');
                const sidebarToggle = document.getElementById('sidebarToggle');
                const mainContent = document.getElementById('mainContent');
                const productsContainer = document.getElementById('productsContainer');
                const cartSidebar = document.getElementById('cartSidebar');
                const cartItems = document.getElementById('cartItems');
                const cartSubtotal = document.getElementById('cartSubtotal');
                const cartDiscount = document.getElementById('cartDiscount');
                const cartFinalTotal = document.getElementById('cartFinalTotal');
                const productModal = new bootstrap.Modal(document.getElementById('productModal'));
                const paymentModal = new bootstrap.Modal(document.getElementById('paymentModal'));
                const productForm = document.getElementById('productForm');
                const sizeSelect = document.getElementById('sizeSelect');
                const colorSelect = document.getElementById('colorSelect');
                const quantityInput = document.getElementById('quantityInput');
                const stockInfo = document.getElementById('stockInfo');
                const confirmAddToCart = document.getElementById('confirmAddToCart');
                const barcodeInput = document.getElementById('barcodeInput');
                const discountType = document.getElementById('discountType');
                const discountValue = document.getElementById('discountValue');
                const applyDiscount = document.getElementById('applyDiscount');
                const payButton = document.getElementById('payButton');
                const paymentForm = document.getElementById('paymentForm');
                const paymentMethod = document.getElementById('paymentMethod');
                const cardDetails = document.getElementById('cardDetails');
                const cardNumber = document.getElementById('cardNumber');
                const confirmPayment = document.getElementById('confirmPayment');
                const increaseQuantity = document.getElementById('increaseQuantity');
                const decreaseQuantity = document.getElementById('decreaseQuantity');
                const discountNumberPad = document.querySelector('.discount-number-pad');
                let currentProduct = null;
                let cart = JSON.parse(localStorage.getItem('cart')) || [];
                let currentStock = 0;
                let discountAmount = 0;

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

                // مدیریت رویدادهای منوی آبشاری و افزودن محصول
                document.addEventListener('click', function(e) {
                    if (e.target.classList.contains('dropdown-item')) {
                        handleCategorySelection(e.target);
                    }
                    const productCard = e.target.closest('.product-card');
                    if (productCard) {
                        e.preventDefault();
                        showProductModal(productCard);
                    }
                });

                // فیلتر کردن محصولات بر اساس کد محصول
                barcodeInput.addEventListener('input', function() {
                    const barcode = barcodeInput.value.trim();
                    const productCards = document.querySelectorAll('#productsContainer .col');
                    productCards.forEach(card => {
                        const productNumber = card.querySelector('.product-number').textContent
                            .replace('شماره محصول: ', '').trim();
                        if (barcode === '' || productNumber.includes(barcode)) {
                            card.style.display = 'block';
                        } else {
                            card.style.display = 'none';
                        }
                    });
                });

                // مدیریت دکمه‌های افزایش و کاهش تعداد
                function updateQuantityButtons() {
                    const quantity = parseInt(quantityInput.value) || 1;
                    decreaseQuantity.disabled = quantity <= 1;
                    increaseQuantity.disabled = quantity >= currentStock;
                }

                increaseQuantity.addEventListener('click', function() {
                    let quantity = parseInt(quantityInput.value) || 1;
                    if (quantity < currentStock) {
                        quantityInput.value = quantity + 1;
                        updateQuantityButtons();
                    }
                });

                decreaseQuantity.addEventListener('click', function() {
                    let quantity = parseInt(quantityInput.value) || 1;
                    if (quantity > 1) {
                        quantityInput.value = quantity - 1;
                        updateQuantityButtons();
                    }
                });

                quantityInput.addEventListener('input', function() {
                    let quantity = parseInt(quantityInput.value) || 1;
                    if (quantity < 1) {
                        quantityInput.value = 1;
                    } else if (quantity > currentStock) {
                        quantityInput.value = currentStock;
                    }
                    updateQuantityButtons();
                });

                // مدیریت نامبرپد تخفیف
                discountNumberPad.addEventListener('click', function(e) {
                    const target = e.target;
                    if (target.dataset.number) {
                        discountValue.value += target.dataset.number;
                    } else if (target.classList.contains('btn-clear')) {
                        discountValue.value = '';
                    } else if (target.classList.contains('btn-enter')) {
                        discountValue.blur();
                    }
                });

                // مدیریت افزودن به سبد خرید از مودال
                confirmAddToCart.addEventListener('click', function() {
                    if (productForm.checkValidity()) {
                        const quantity = parseInt(quantityInput.value);
                        if (quantity > currentStock) {
                            alert(`تعداد انتخاب شده بیشتر از موجودی (${currentStock}) است!`);
                            return;
                        }
                        addToCart();
                        productModal.hide();
                        productForm.reset();
                        updateQuantityButtons();
                    } else {
                        productForm.reportValidity();
                    }
                });

                // حذف آیتم از سبد خرید
                cartItems.addEventListener('click', function(e) {
                    if (e.target.classList.contains('cart-item-remove')) {
                        const index = e.target.dataset.index;
                        cart.splice(index, 1);
                        localStorage.setItem('cart', JSON.stringify(cart));
                        discountAmount = 0; // Reset discount when cart changes
                        updateCart();
                    }
                });

                // اعمال تخفیف
                applyDiscount.addEventListener('click', function() {
                    const value = parseFloat(discountValue.value);
                    const type = discountType.value;
                    const subtotal = calculateSubtotal();

                    if (isNaN(value) || value < 0) {
                        alert('لطفاً مقدار تخفیف معتبر وارد کنید!');
                        return;
                    }

                    if (type === 'percentage') {
                        if (value > 100) {
                            alert('تخفیف درصدی نمی‌تواند بیشتر از ۱۰۰ باشد!');
                            return;
                        }
                        discountAmount = subtotal * (value / 100);
                    } else {
                        if (value > subtotal) {
                            alert('تخفیف نمی‌تواند بیشتر از جمع کل باشد!');
                            return;
                        }
                        discountAmount = value;
                    }

                    alert(
                        `تخفیف ${value.toLocaleString('fa-IR')} ${type === 'percentage' ? 'درصد' : 'تومان'} اعمال شد!`
                    );
                    updateCart();
                });

                // باز کردن مودال پرداخت
                payButton.addEventListener('click', function() {
                    if (cart.length === 0) {
                        alert('سبد خرید خالی است!');
                        return;
                    }
                    paymentModal.show();
                });

                // مدیریت روش پرداخت
                paymentMethod.addEventListener('change', function() {
                    if (paymentMethod.value === 'card') {
                        cardDetails.style.display = 'block';
                    } else {
                        cardDetails.style.display = 'none';
                    }
                });

                // تأیید پرداخت
                confirmPayment.addEventListener('click', function() {
                    if (paymentForm.checkValidity()) {
                        if (paymentMethod.value === 'card' && !cardNumber.value.trim()) {
                            alert('لطفاً شماره کارت را وارد کنید!');
                            return;
                        }
                        alert('پرداخت با موفقیت انجام شد!');
                        cart = [];
                        discountAmount = 0;
                        localStorage.setItem('cart', JSON.stringify(cart));
                        updateCart();
                        paymentModal.hide();
                        paymentForm.reset();
                        cardDetails.style.display = 'none';
                    } else {
                        paymentForm.reportValidity();
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
                        const category = card.getAttribute('data-category')?.trim();
                        if (selectedCategory === 'همه دسته‌بندی‌ها') {
                            card.style.display = 'block';
                        } else {
                            card.style.display = (category === selectedCategory) ? 'block' : 'none';
                        }
                    });
                }


                function showProductModal(productCard) {
                    currentProduct = productCard;
                    const productName = productCard.querySelector('.card-title').textContent;
                    document.getElementById('productModalLabel').textContent =
                        `انتخاب مشخصات محصول: ${productName}`;

                    // تولید تعداد موجودی رندوم (1 تا 10)
                    currentStock = Math.floor(Math.random() * 10) + 1;
                    stockInfo.textContent = `موجودی: ${currentStock} عدد`;
                    quantityInput.max = currentStock;
                    quantityInput.value = 1;
                    updateQuantityButtons();

                    productModal.show();
                }

                function addToCart() {
                    const productName = currentProduct.querySelector('.card-title').textContent;
                    const rawPriceText = currentProduct.querySelector('.card-text').textContent;
                    const cleanPriceText = persianToEnglishDigits(rawPriceText.replace(/[^۰-۹]/g,
                        '')); // حذف حروف و تبدیل عدد
                    const productPrice = parseInt(cleanPriceText) || 0; // اگر عدد نبود، پیش‌فرض ۰
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
                }


                function calculateSubtotal() {
                    return cart.reduce((total, item) => total + item.price * item.quantity, 0);
                }

                function updateCart() {
                    cartItems.innerHTML = '';
                    const subtotal = calculateSubtotal();
                    const finalTotal = subtotal - discountAmount;

                    cart.forEach((item, index) => {
                        const itemPrice = item.price || 0;
                        const itemQuantity = item.quantity || 0;
                        const itemTotal = itemPrice * itemQuantity;

                        cartItems.innerHTML += `
            <div class="cart-item">
                <img src="${item.image}" alt="${item.name}">
                <div class="cart-item-details">
                    <h6>${item.name}</h6>
                    <p>سایز: ${item.size} | رنگ: ${item.color} | تعداد: ${itemQuantity}</p>
                    <p>قیمت واحد: ${itemPrice.toLocaleString('fa-IR')} تومان</p>
                    <p>جمع: ${itemTotal.toLocaleString('fa-IR')} تومان</p>
                </div>
                <i class="bi bi-trash cart-item-remove" data-index="${index}"></i>
            </div>
        `;
                    });

                    cartSubtotal.textContent = `جمع کل: ${subtotal.toLocaleString('fa-IR')} تومان`;
                    cartDiscount.textContent = `تخفیف: ${discountAmount.toLocaleString('fa-IR')} تومان`;
                    cartFinalTotal.textContent = `مبلغ نهایی: ${finalTotal.toLocaleString('fa-IR')} تومان`;
                }


            } catch (error) {
                console.error('خطا در اجرای اسکریپت:', error);
            }
        });

        function toPersianDigits(str) {
            return str.replace(/\d/g, d => '۰۱۲۳۴۵۶۷۸۹' [d]);
        }

        function convertAllNumbersToPersian(node) {
            if (node.nodeType === 3) {
                node.nodeValue = toPersianDigits(node.nodeValue);
            } else {
                node.childNodes.forEach(convertAllNumbersToPersian);
            }
        }

        window.addEventListener("DOMContentLoaded", () => {
            convertAllNumbersToPersian(document.body);
        });
    </script>
</body>

</html>
