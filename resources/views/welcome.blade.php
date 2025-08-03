<!DOCTYPE html>
<html lang="fa" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>سیستم فروش - POS</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    <!-- Vazir Font -->
    <link href="https://fonts.googleapis.com/css2?family=Vazir:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="style.css">
</head>

<body>

    <style>
        body {
            font-family: 'Vazir', sans-serif;
            background: linear-gradient(135deg, #1a1d29 0%, #2d3748 100%);
            height: 100vh;
            margin: 0;
            direction: rtl;
            color: #e2e8f0;
        }

        .container-fluid {
            height: 100vh;
            display: flex;
            flex-direction: column;
        }

        /* Dark theme header */
        .bg-primary {
            background: linear-gradient(135deg, #1e3a8a 0%, #3b82f6 100%) !important;
        }

        /* Card styling for dark theme */
        .card {
            background-color: #2d3748;
            border: 1px solid #4a5568;
            color: #e2e8f0;
        }

        .card-header {
            background-color: #374151 !important;
            border-bottom: 1px solid #4a5568;
            color: #f8fafc !important;
        }

        .bg-light {
            background-color: #374151 !important;
        }

        .bg-info {
            background: linear-gradient(135deg, #0891b2 0%, #06b6d4 100%) !important;
        }

        .bg-success {
            background: linear-gradient(135deg, #059669 0%, #10b981 100%) !important;
        }

        .bg-warning {
            background: linear-gradient(135deg, #d97706 0%, #f59e0b 100%) !important;
        }

        .bg-dark {
            background: linear-gradient(135deg, #1f2937 0%, #374151 100%) !important;
        }

        .row.flex-grow-1 {
            flex: 1;
            min-height: 0;
        }

        /* Product Cards */
        .product-card {
            transition: all 0.3s ease;
            cursor: pointer;
            border: 2px solid #4a5568;
            height: 120px;
            background: linear-gradient(135deg, #374151 0%, #4a5568 100%);
        }

        .product-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 25px rgba(59, 130, 246, 0.3);
            border-color: #3b82f6;
            background: linear-gradient(135deg, #4a5568 0%, #5a6478 100%);
        }

        .product-card .card-body {
            padding: 0.75rem;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            height: 100%;
        }

        .product-code {
            font-size: 0.75rem;
            color: #9ca3af;
            font-weight: 500;
        }

        .product-name {
            font-size: 0.9rem;
            font-weight: 600;
            margin: 0.25rem 0;
            line-height: 1.2;
            color: #f8fafc;
        }

        .product-price {
            font-size: 1rem;
            font-weight: 700;
            color: #10b981;
            margin-top: auto;
        }

        /* Cart Items */
        .cart-item {
            border-bottom: 1px solid #4a5568;
            padding: 0.75rem;
            transition: background-color 0.2s ease;
        }

        .cart-item:hover {
            background-color: #374151;
        }

        .cart-item:last-child {
            border-bottom: none;
        }

        .cart-item-name {
            font-weight: 600;
            font-size: 0.9rem;
        }

        .cart-item-details {
            font-size: 0.8rem;
            color: #9ca3af;
            margin: 0.25rem 0;
        }

        .cart-item-price {
            font-weight: 700;
            color: #10b981;
        }

        .quantity-controls {
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .quantity-btn {
            width: 25px;
            height: 25px;
            border: 1px solid #4a5568;
            background: #374151;
            border-radius: 4px;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: all 0.2s ease;
            color: #e2e8f0;
        }

        .quantity-btn:hover {
            background-color: #4a5568;
            border-color: #6b7280;
        }

        .quantity-display {
            min-width: 30px;
            text-align: center;
            font-weight: 600;
        }

        /* Animations */
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

        .fade-in-up {
            animation: fadeInUp 0.3s ease-out;
        }

        /* Custom scrollbar */
        .cart-items::-webkit-scrollbar {
            width: 6px;
        }

        .cart-items::-webkit-scrollbar-track {
            background: #374151;
            border-radius: 10px;
        }

        .cart-items::-webkit-scrollbar-thumb {
            background: #6b7280;
            border-radius: 10px;
        }

        .cart-items::-webkit-scrollbar-thumb:hover {
            background: #9ca3af;
        }

        /* Responsive adjustments */
        @media (max-width: 768px) {
            .product-card {
                height: 100px;
            }

            .product-name {
                font-size: 0.8rem;
            }

            .product-price {
                font-size: 0.9rem;
            }
        }

        /* Modal enhancements */
        .modal-content {
            border-radius: 15px;
            border: none;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.5);
            background-color: #2d3748;
            color: #e2e8f0;
        }

        .modal-header {
            border-radius: 15px 15px 0 0;
            border-bottom: none;
            padding: 1.25rem 1.5rem;
        }

        .modal-body {
            padding: 1.5rem;
        }

        .modal-footer {
            border-top: 1px solid #4a5568;
            border-radius: 0 0 15px 15px;
            padding: 1rem 1.5rem;
        }

        /* Modal backdrop */
        .modal-backdrop {
            background-color: rgba(0, 0, 0, 0.8);
        }

        /* Button enhancements */
        .btn {
            border-radius: 8px;
            font-weight: 500;
            transition: all 0.2s ease;
        }

        .btn:hover {
            transform: translateY(-1px);
        }

        .btn-secondary {
            background-color: #4a5568;
            border-color: #4a5568;
            color: #e2e8f0;
        }

        .btn-secondary:hover {
            background-color: #5a6478;
            border-color: #5a6478;
        }

        .btn-outline-secondary {
            color: #9ca3af;
            border-color: #4a5568;
        }

        .btn-outline-secondary:hover {
            background-color: #4a5568;
            border-color: #4a5568;
            color: #e2e8f0;
        }

        .btn-outline-danger {
            color: #f87171;
            border-color: #ef4444;
        }

        .btn-outline-danger:hover {
            background-color: #ef4444;
            border-color: #ef4444;
            color: white;
        }

        .btn-outline-primary {
            color: #60a5fa;
            border-color: #3b82f6;
        }

        .btn-outline-primary:hover {
            background-color: #3b82f6;
            border-color: #3b82f6;
            color: white;
        }

        .btn-outline-light {
            color: #f8fafc;
            border-color: #e2e8f0;
        }

        .btn-outline-light:hover {
            background-color: #e2e8f0;
            border-color: #e2e8f0;
            color: #1f2937;
        }

        /* Form enhancements */
        .form-control,
        .form-select {
            border-radius: 8px;
            border: 1px solid #4a5568;
            transition: all 0.2s ease;
            background-color: #374151;
            color: #e2e8f0;
        }

        .form-control:focus,
        .form-select:focus {
            border-color: #3b82f6;
            box-shadow: 0 0 0 0.2rem rgba(59, 130, 246, 0.25);
            background-color: #374151;
            color: #e2e8f0;
        }

        .form-control::placeholder {
            color: #9ca3af;
        }

        .input-group-text {
            background-color: #374151;
            border-color: #4a5568;
            color: #9ca3af;
        }

        /* Selected customer styling */
        .selected-customer {
            border: 2px solid #3b82f6;
            background: linear-gradient(135deg, #1e3a8a 0%, #3730a3 100%);
            color: #e0e7ff;
        }

        /* Payment method buttons */
        .btn-check:checked+.btn {
            background-color: #3b82f6;
            border-color: #3b82f6;
            color: white;
        }

        .btn-group .btn {
            background-color: #374151;
            border-color: #4a5568;
            color: #e2e8f0;
        }

        .btn-group .btn:hover {
            background-color: #4a5568;
            border-color: #5a6478;
        }

        /* Total section styling */
        .total-section {
            background: linear-gradient(135deg, #374151 0%, #4a5568 100%);
            padding: 1rem;
            border-radius: 10px;
            margin-bottom: 1rem;
            border: 1px solid #4a5568;
        }

        /* Text colors */
        .text-muted {
            color: #9ca3af !important;
        }

        .text-success {
            color: #10b981 !important;
        }

        .text-warning {
            color: #f59e0b !important;
        }

        .text-danger {
            color: #ef4444 !important;
        }

        .text-info {
            color: #06b6d4 !important;
        }

        /* Badge styling */
        .badge {
            background-color: #10b981 !important;
        }

        /* List group for customer suggestions */
        .list-group-item {
            background-color: #374151;
            border-color: #4a5568;
            color: #e2e8f0;
        }

        .list-group-item:hover {
            background-color: #4a5568;
        }

        .list-group-item-action:hover {
            background-color: #4a5568;
            color: #e2e8f0;
        }

        /* Toast styling */
        .toast {
            background-color: #374151;
            border: 1px solid #4a5568;
            color: #e2e8f0;
        }

        /* Close button styling */
        .btn-close-white {
            filter: invert(1) grayscale(100%) brightness(200%);
        }
    </style>

    <div class="container-fluid h-100">
        <!-- Header -->
        <div class="row bg-primary text-white p-3 shadow-sm">
            <div class="col-12">
                <div class="d-flex justify-content-between align-items-center">
                    <div class="d-flex align-items-center">
                        <i class="bi bi-shop fs-2 me-3"></i>
                        <h2 class="mb-0">سیستم فروش</h2>
                    </div>
                    <div class="d-flex align-items-center">
                        <span class="badge bg-success fs-6 me-3">
                            <i class="bi bi-clock me-1"></i>
                            <span id="current-time"></span>
                        </span>
                    </div>
                </div>
            </div>
        </div>

        <div class="row flex-grow-1">
            <!-- Products Section - Left Side -->
            <div class="col-md-8 col-lg-7 p-3">
                <div class="card h-100 shadow-sm">
                    <div class="card-header bg-light">
                        <div class="d-flex justify-content-between align-items-center">
                            <h5 class="mb-0">
                                <i class="bi bi-grid-3x3-gap-fill me-2"></i>
                                لیست محصولات
                            </h5>
                            <div class="input-group" style="width: 300px;">
                                <span class="input-group-text">
                                    <i class="bi bi-search"></i>
                                </span>
                                <input type="text" class="form-control" placeholder="جستجوی محصول..."
                                    id="product-search">
                            </div>
                        </div>
                    </div>
                    <div class="card-body p-2">
                        <div class="row g-2" id="products-grid">
                            <!-- محصولات اینجا نمایش داده می‌شوند -->
                        </div>
                    </div>
                </div>
            </div>

            <!-- Cart & Operations Section - Right Side -->
            <div class="col-md-4 col-lg-5 p-3">
                <div class="row g-3 h-100">
                    <!-- Customer Selection -->
                    <div class="col-12">
                        <div class="card shadow-sm">
                            <div class="card-header bg-info text-white">
                                <h6 class="mb-0">
                                    <i class="bi bi-person-circle me-2"></i>
                                    انتخاب مشتری
                                </h6>
                            </div>
                            <div class="card-body">
                                <div class="input-group mb-2">
                                    <span class="input-group-text">
                                        <i class="bi bi-search"></i>
                                    </span>
                                    <input type="text" class="form-control" placeholder="جستجو با نام یا شماره..."
                                        id="customer-search">
                                    <button class="btn btn-outline-primary" type="button" data-bs-toggle="modal"
                                        data-bs-target="#customerModal">
                                        <i class="bi bi-person-plus"></i>
                                    </button>
                                </div>
                                <div class="selected-customer bg-light p-2 rounded d-none" id="selected-customer">
                                    <small class="text-muted">مشتری انتخاب شده:</small>
                                    <div class="fw-bold" id="customer-name">نام مشتری</div>
                                    <small class="text-muted" id="customer-phone">شماره تماس</small>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Shopping Cart -->
                    <div class="col-12">
                        <div class="card shadow-sm" style="height: 300px;">
                            <div
                                class="card-header bg-success text-white d-flex justify-content-between align-items-center">
                                <h6 class="mb-0">
                                    <i class="bi bi-cart3 me-2"></i>
                                    سبد خرید
                                </h6>
                                <button class="btn btn-sm btn-outline-light" onclick="clearCart()">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </div>
                            <div class="card-body p-0">
                                <div class="cart-items h-100 overflow-auto" id="cart-items">
                                    <div class="text-center text-muted p-4">
                                        <i class="bi bi-cart-x fs-1"></i>
                                        <p>سبد خرید خالی است</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Discount Section -->
                    <div class="col-12">
                        <div class="card shadow-sm">
                            <div class="card-header bg-warning text-dark">
                                <h6 class="mb-0">
                                    <i class="bi bi-percent me-2"></i>
                                    تخفیف
                                </h6>
                            </div>
                            <div class="card-body">
                                <div class="row g-2">
                                    <div class="col-8">
                                        <input type="number" class="form-control" placeholder="مقدار تخفیف"
                                            id="discount-value">
                                    </div>
                                    <div class="col-4">
                                        <select class="form-select" id="discount-type">
                                            <option value="percent">درصد</option>
                                            <option value="amount">تومان</option>
                                        </select>
                                    </div>
                                </div>
                                <button class="btn btn-warning w-100 mt-2" onclick="applyDiscount()">
                                    <i class="bi bi-check-circle me-1"></i>
                                    اعمال تخفیف
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- Total & Payment -->
                    <div class="col-12">
                        <div class="card shadow-sm">
                            <div class="card-header bg-dark text-white">
                                <h6 class="mb-0">
                                    <i class="bi bi-calculator me-2"></i>
                                    جمع کل و پرداخت
                                </h6>
                            </div>
                            <div class="card-body">
                                <div class="total-section">
                                    <div class="d-flex justify-content-between mb-2">
                                        <span>جمع کل:</span>
                                        <span class="fw-bold" id="subtotal">0 تومان</span>
                                    </div>
                                    <div class="d-flex justify-content-between mb-2 text-warning">
                                        <span>تخفیف:</span>
                                        <span class="fw-bold" id="discount-amount">0 تومان</span>
                                    </div>
                                    <hr>
                                    <div class="d-flex justify-content-between mb-3">
                                        <span class="fs-5 fw-bold">مبلغ نهایی:</span>
                                        <span class="fs-5 fw-bold text-success" id="final-total">0 تومان</span>
                                    </div>
                                </div>

                                <div class="payment-methods mb-3">
                                    <label class="form-label fw-bold">روش پرداخت:</label>
                                    <div class="btn-group w-100" role="group">
                                        <input type="radio" class="btn-check" name="payment-method" id="cash"
                                            value="cash" checked>
                                        <label class="btn btn-outline-success" for="cash">
                                            <i class="bi bi-cash-coin"></i>
                                            نقدی
                                        </label>

                                        <input type="radio" class="btn-check" name="payment-method" id="card"
                                            value="card">
                                        <label class="btn btn-outline-primary" for="card">
                                            <i class="bi bi-credit-card"></i>
                                            کارتی
                                        </label>

                                        <input type="radio" class="btn-check" name="payment-method" id="combined"
                                            value="combined">
                                        <label class="btn btn-outline-info" for="combined">
                                            <i class="bi bi-wallet2"></i>
                                            ترکیبی
                                        </label>
                                    </div>
                                </div>

                                <button class="btn btn-primary w-100 btn-lg" onclick="processPayment()"
                                    id="payment-btn">
                                    <i class="bi bi-credit-card me-2"></i>
                                    پرداخت <span id="payment-amount">0 تومان</span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Product Modal -->
    <div class="modal fade" id="productModal" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-primary text-white">
                    <h5 class="modal-title">
                        <i class="bi bi-bag-plus me-2"></i>
                        افزودن محصول
                    </h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="product-info mb-3" id="modal-product-info">
                        <!-- اطلاعات محصول اینجا نمایش داده می‌شود -->
                    </div>

                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label fw-bold">رنگ:</label>
                            <select class="form-select" id="product-color">
                                <option value="قرمز">قرمز</option>
                                <option value="آبی">آبی</option>
                                <option value="سبز">سبز</option>
                                <option value="زرد">زرد</option>
                                <option value="مشکی">مشکی</option>
                                <option value="سفید">سفید</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-bold">سایز:</label>
                            <select class="form-select" id="product-size">
                                <option value="S">S</option>
                                <option value="M">M</option>
                                <option value="L">L</option>
                                <option value="XL">XL</option>
                                <option value="XXL">XXL</option>
                            </select>
                        </div>
                        <div class="col-12">
                            <label class="form-label fw-bold">تعداد:</label>
                            <div class="input-group">
                                <button class="btn btn-outline-secondary" type="button"
                                    onclick="changeQuantity(-1)">
                                    <i class="bi bi-dash"></i>
                                </button>
                                <input type="number" class="form-control text-center" value="1" min="1"
                                    id="product-quantity">
                                <button class="btn btn-outline-secondary" type="button" onclick="changeQuantity(1)">
                                    <i class="bi bi-plus"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                        <i class="bi bi-x-circle me-1"></i>
                        انصراف
                    </button>
                    <button type="button" class="btn btn-success" onclick="addToCart()">
                        <i class="bi bi-cart-plus me-1"></i>
                        افزودن به سبد
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Customer Modal -->
    <div class="modal fade" id="customerModal" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-info text-white">
                    <h5 class="modal-title">
                        <i class="bi bi-person-plus me-2"></i>
                        مشتری جدید
                    </h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label fw-bold">نام مشتری:</label>
                        <input type="text" class="form-control" id="customer-name-input"
                            placeholder="نام کامل مشتری">
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-bold">شماره موبایل:</label>
                        <input type="tel" class="form-control" id="customer-phone-input"
                            placeholder="09xxxxxxxxx">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">آدرس (اختیاری):</label>
                        <textarea class="form-control" id="customer-address-input" rows="2" placeholder="آدرس مشتری"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                        <i class="bi bi-x-circle me-1"></i>
                        انصراف
                    </button>
                    <button type="button" class="btn btn-info" onclick="createCustomer()">
                        <i class="bi bi-person-plus me-1"></i>
                        ایجاد مشتری
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Payment Success Modal -->
    <div class="modal fade" id="successModal" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-success text-white">
                    <h5 class="modal-title">
                        <i class="bi bi-check-circle me-2"></i>
                        پرداخت موفق
                    </h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body text-center">
                    <i class="bi bi-check-circle-fill text-success" style="font-size: 4rem;"></i>
                    <h4 class="mt-3">پرداخت با موفقیت انجام شد!</h4>
                    <p class="text-muted">فاکتور شماره <span id="invoice-number" class="fw-bold"></span></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success" data-bs-dismiss="modal"
                        onclick="resetTransaction()">
                        <i class="bi bi-arrow-clockwise me-1"></i>
                        تراکنش جدید
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    {{-- <script src="script.js"></script> --}}
    <script>
        // داده‌های نمونه
        let products = [{
                id: 1,
                code: 'P001',
                name: 'تی‌شرت مردانه',
                price: 120000,
                category: 'پوشاک'
            },
            {
                id: 2,
                code: 'P002',
                name: 'شلوار جین',
                price: 250000,
                category: 'پوشاک'
            },
            {
                id: 3,
                code: 'P003',
                name: 'کفش ورزشی',
                price: 350000,
                category: 'کفش'
            },
            {
                id: 4,
                code: 'P004',
                name: 'کیف دستی',
                price: 180000,
                category: 'کیف'
            },
            {
                id: 5,
                code: 'P005',
                name: 'عینک آفتابی',
                price: 95000,
                category: 'اکسسوری'
            },
            {
                id: 6,
                code: 'P006',
                name: 'ساعت مچی',
                price: 450000,
                category: 'اکسسوری'
            },
            {
                id: 7,
                code: 'P007',
                name: 'پیراهن مردانه',
                price: 160000,
                category: 'پوشاک'
            },
            {
                id: 8,
                code: 'P008',
                name: 'کمربند چرمی',
                price: 85000,
                category: 'اکسسوری'
            },
            {
                id: 9,
                code: 'P009',
                name: 'کاپشن زمستانه',
                price: 380000,
                category: 'پوشاک'
            },
            {
                id: 10,
                code: 'P010',
                name: 'کفش رسمی',
                price: 320000,
                category: 'کفش'
            }
        ];

        let customers = [{
                id: 1,
                name: 'احمد محمدی',
                phone: '09123456789',
                address: 'تهران، میدان آزادی'
            },
            {
                id: 2,
                name: 'فاطمه احمدی',
                phone: '09187654321',
                address: 'اصفهان، خیابان چهارباغ'
            },
            {
                id: 3,
                name: 'علی رضایی',
                phone: '09351234567',
                address: 'شیراز، بلوار زند'
            }
        ];

        let cart = [];
        let selectedProduct = null;
        let selectedCustomer = null;
        let discountValue = 0;
        let discountType = 'percent';

        // بارگذاری اولیه
        document.addEventListener('DOMContentLoaded', function() {
            displayProducts();
            updateTime();
            setInterval(updateTime, 1000);

            // Event listeners
            document.getElementById('product-search').addEventListener('input', filterProducts);
            document.getElementById('customer-search').addEventListener('input', searchCustomers);
            document.getElementById('discount-value').addEventListener('input', calculateTotals);
            document.getElementById('discount-type').addEventListener('change', function() {
                discountType = this.value;
                calculateTotals();
            });

            // Payment method change listener
            document.querySelectorAll('input[name="payment-method"]').forEach(radio => {
                radio.addEventListener('change', updatePaymentButton);
            });
        });

        // نمایش زمان
        function updateTime() {
            const now = new Date();
            const timeString = now.toLocaleTimeString('fa-IR');
            document.getElementById('current-time').textContent = timeString;
        }

        // نمایش محصولات
        function displayProducts(productsToShow = products) {
            const grid = document.getElementById('products-grid');
            grid.innerHTML = '';

            productsToShow.forEach(product => {
                const productCard = createProductCard(product);
                grid.appendChild(productCard);
            });
        }

        // ایجاد کارت محصول
        function createProductCard(product) {
            const col = document.createElement('div');
            col.className = 'col-lg-3 col-md-4 col-sm-6 col-6';

            col.innerHTML = `
        <div class="card product-card h-100" onclick="openProductModal(${product.id})">
            <div class="card-body">
                <div class="product-code">${product.code}</div>
                <div class="product-name">${product.name}</div>
                <div class="product-price">${formatPrice(product.price)}</div>
            </div>
        </div>
    `;

            return col;
        }

        // باز کردن مودال محصول
        function openProductModal(productId) {
            selectedProduct = products.find(p => p.id === productId);

            const modalInfo = document.getElementById('modal-product-info');
            modalInfo.innerHTML = `
        <div class="text-center">
            <h6 class="fw-bold">${selectedProduct.name}</h6>
            <p class="text-muted mb-1">کد محصول: ${selectedProduct.code}</p>
            <p class="text-success fw-bold fs-5">${formatPrice(selectedProduct.price)}</p>
        </div>
    `;

            // ریست کردن فرم
            document.getElementById('product-quantity').value = 1;
            document.getElementById('product-color').selectedIndex = 0;
            document.getElementById('product-size').selectedIndex = 0;

            const modal = new bootstrap.Modal(document.getElementById('productModal'));
            modal.show();
        }

        // تغییر تعداد در مودال
        function changeQuantity(delta) {
            const quantityInput = document.getElementById('product-quantity');
            let currentValue = parseInt(quantityInput.value);
            const newValue = Math.max(1, currentValue + delta);
            quantityInput.value = newValue;
        }

        // افزودن به سبد خرید
        function addToCart() {
            if (!selectedProduct) return;

            const quantity = parseInt(document.getElementById('product-quantity').value);
            const color = document.getElementById('product-color').value;
            const size = document.getElementById('product-size').value;

            const cartItem = {
                id: Date.now(),
                productId: selectedProduct.id,
                productCode: selectedProduct.code,
                productName: selectedProduct.name,
                price: selectedProduct.price,
                quantity: quantity,
                color: color,
                size: size,
                total: selectedProduct.price * quantity
            };

            cart.push(cartItem);
            updateCartDisplay();
            calculateTotals();

            // بستن مودال
            const modal = bootstrap.Modal.getInstance(document.getElementById('productModal'));
            modal.hide();

            // نمایش پیام موفقیت
            showToast('محصول با موفقیت به سبد خرید اضافه شد', 'success');
        }

        // به‌روزرسانی نمایش سبد خرید
        function updateCartDisplay() {
            const cartContainer = document.getElementById('cart-items');

            if (cart.length === 0) {
                cartContainer.innerHTML = `
            <div class="text-center text-muted p-4">
                <i class="bi bi-cart-x fs-1"></i>
                <p>سبد خرید خالی است</p>
            </div>
        `;
                return;
            }

            cartContainer.innerHTML = '';

            cart.forEach(item => {
                const cartItemElement = createCartItem(item);
                cartContainer.appendChild(cartItemElement);
            });
        }

        // ایجاد آیتم سبد خرید
        function createCartItem(item) {
            const div = document.createElement('div');
            div.className = 'cart-item fade-in-up';

            div.innerHTML = `
        <div class="d-flex justify-content-between align-items-start">
            <div class="flex-grow-1">
                <div class="cart-item-name">${item.productName}</div>
                <div class="cart-item-details">
                    کد: ${item.productCode} | رنگ: ${item.color} | سایز: ${item.size}
                </div>
                <div class="cart-item-price">${formatPrice(item.price)} × ${item.quantity} = ${formatPrice(item.total)}</div>
            </div>
            <div class="d-flex flex-column align-items-end">
                <button class="btn btn-sm btn-outline-danger mb-2" onclick="removeFromCart(${item.id})">
                    <i class="bi bi-trash"></i>
                </button>
                <div class="quantity-controls">
                    <div class="quantity-btn" onclick="updateCartQuantity(${item.id}, ${item.quantity - 1})">
                        <i class="bi bi-dash"></i>
                    </div>
                    <div class="quantity-display">${item.quantity}</div>
                    <div class="quantity-btn" onclick="updateCartQuantity(${item.id}, ${item.quantity + 1})">
                        <i class="bi bi-plus"></i>
                    </div>
                </div>
            </div>
        </div>
    `;

            return div;
        }

        // حذف از سبد خرید
        function removeFromCart(itemId) {
            cart = cart.filter(item => item.id !== itemId);
            updateCartDisplay();
            calculateTotals();
            showToast('محصول از سبد خرید حذف شد', 'warning');
        }

        // به‌روزرسانی تعداد در سبد خرید
        function updateCartQuantity(itemId, newQuantity) {
            if (newQuantity < 1) {
                removeFromCart(itemId);
                return;
            }

            const item = cart.find(item => item.id === itemId);
            if (item) {
                item.quantity = newQuantity;
                item.total = item.price * newQuantity;
                updateCartDisplay();
                calculateTotals();
            }
        }

        // پاک کردن سبد خرید
        function clearCart() {
            if (cart.length === 0) return;

            if (confirm('آیا مطمئن هستید که می‌خواهید سبد خرید را خالی کنید؟')) {
                cart = [];
                updateCartDisplay();
                calculateTotals();
                showToast('سبد خرید خالی شد', 'info');
            }
        }

        // محاسبه مجموع
        function calculateTotals() {
            const subtotal = cart.reduce((sum, item) => sum + item.total, 0);

            // محاسبه تخفیف
            let discountAmount = 0;
            const discountVal = parseFloat(document.getElementById('discount-value').value) || 0;

            if (discountVal > 0) {
                if (discountType === 'percent') {
                    discountAmount = (subtotal * discountVal) / 100;
                } else {
                    discountAmount = discountVal;
                }
            }

            // محدود کردن تخفیف به حداکثر مبلغ کل
            discountAmount = Math.min(discountAmount, subtotal);

            const finalTotal = subtotal - discountAmount;

            // به‌روزرسانی نمایش
            document.getElementById('subtotal').textContent = formatPrice(subtotal);
            document.getElementById('discount-amount').textContent = formatPrice(discountAmount);
            document.getElementById('final-total').textContent = formatPrice(finalTotal);
            document.getElementById('payment-amount').textContent = formatPrice(finalTotal);
        }

        // اعمال تخفیف
        function applyDiscount() {
            calculateTotals();
            showToast('تخفیف با موفقیت اعمال شد', 'success');
        }

        // فرمت قیمت
        function formatPrice(price) {
            return price.toLocaleString('fa-IR') + ' تومان';
        }

        // فیلتر محصولات
        function filterProducts() {
            const searchTerm = document.getElementById('product-search').value.toLowerCase();
            const filteredProducts = products.filter(product =>
                product.name.toLowerCase().includes(searchTerm) ||
                product.code.toLowerCase().includes(searchTerm)
            );
            displayProducts(filteredProducts);
        }

        // جستجوی مشتریان
        function searchCustomers() {
            const searchTerm = document.getElementById('customer-search').value.toLowerCase();
            const customerSearchContainer = document.getElementById('customer-search').parentElement;

            // حذف لیست قبلی
            const existingList = customerSearchContainer.querySelector('.customer-suggestions');
            if (existingList) {
                existingList.remove();
            }

            if (searchTerm.length < 2) return;

            const filteredCustomers = customers.filter(customer =>
                customer.name.toLowerCase().includes(searchTerm) ||
                customer.phone.includes(searchTerm)
            );

            if (filteredCustomers.length > 0) {
                const suggestionsList = document.createElement('div');
                suggestionsList.className = 'customer-suggestions list-group position-absolute w-100 shadow-sm';
                suggestionsList.style.zIndex = '1000';
                suggestionsList.style.top = '100%';

                filteredCustomers.forEach(customer => {
                    const item = document.createElement('button');
                    item.className = 'list-group-item list-group-item-action';
                    item.innerHTML = `
                <div class="d-flex justify-content-between">
                    <div>
                        <div class="fw-bold">${customer.name}</div>
                        <small class="text-muted">${customer.phone}</small>
                    </div>
                    <i class="bi bi-person-check"></i>
                </div>
            `;
                    item.onclick = () => selectCustomer(customer);
                    suggestionsList.appendChild(item);
                });

                customerSearchContainer.style.position = 'relative';
                customerSearchContainer.appendChild(suggestionsList);
            }
        }

        // انتخاب مشتری
        function selectCustomer(customer) {
            selectedCustomer = customer;

            document.getElementById('customer-search').value = customer.name;
            document.getElementById('customer-name').textContent = customer.name;
            document.getElementById('customer-phone').textContent = customer.phone;
            document.getElementById('selected-customer').classList.remove('d-none');

            // حذف لیست پیشنهادات
            const suggestions = document.querySelector('.customer-suggestions');
            if (suggestions) {
                suggestions.remove();
            }

            showToast(`مشتری ${customer.name} انتخاب شد`, 'success');
        }

        // ایجاد مشتری جدید
        function createCustomer() {
            const name = document.getElementById('customer-name-input').value.trim();
            const phone = document.getElementById('customer-phone-input').value.trim();
            const address = document.getElementById('customer-address-input').value.trim();

            if (!name || !phone) {
                showToast('لطفاً نام و شماره موبایل را وارد کنید', 'error');
                return;
            }

            // بررسی تکراری نبودن شماره
            if (customers.some(c => c.phone === phone)) {
                showToast('این شماره موبایل قبلاً ثبت شده است', 'error');
                return;
            }

            const newCustomer = {
                id: customers.length + 1,
                name: name,
                phone: phone,
                address: address
            };

            customers.push(newCustomer);
            selectCustomer(newCustomer);

            // پاک کردن فرم
            document.getElementById('customer-name-input').value = '';
            document.getElementById('customer-phone-input').value = '';
            document.getElementById('customer-address-input').value = '';

            // بستن مودال
            const modal = bootstrap.Modal.getInstance(document.getElementById('customerModal'));
            modal.hide();

            showToast('مشتری جدید با موفقیت ایجاد شد', 'success');
        }

        // به‌روزرسانی دکمه پرداخت
        function updatePaymentButton() {
            const selectedPayment = document.querySelector('input[name="payment-method"]:checked').value;
            const paymentBtn = document.getElementById('payment-btn');
            const finalTotal = parseFloat(document.getElementById('final-total').textContent.replace(/[^\d]/g, '')) || 0;

            let icon, text;
            switch (selectedPayment) {
                case 'cash':
                    icon = 'bi-cash-coin';
                    text = 'پرداخت نقدی';
                    break;
                case 'card':
                    icon = 'bi-credit-card';
                    text = 'پرداخت کارتی';
                    break;
                case 'combined':
                    icon = 'bi-wallet2';
                    text = 'پرداخت ترکیبی';
                    break;
            }

            paymentBtn.innerHTML = `
        <i class="${icon} me-2"></i>
        ${text} ${formatPrice(finalTotal)}
    `;
        }

        // پردازش پرداخت
        function processPayment() {
            if (cart.length === 0) {
                showToast('سبد خرید خالی است', 'error');
                return;
            }

            if (!selectedCustomer) {
                showToast('لطفاً ابتدا مشتری را انتخاب کنید', 'error');
                return;
            }

            const invoiceNumber = 'INV-' + Date.now();
            document.getElementById('invoice-number').textContent = invoiceNumber;

            // نمایش مودال موفقیت
            const successModal = new bootstrap.Modal(document.getElementById('successModal'));
            successModal.show();

            showToast('پرداخت با موفقیت انجام شد', 'success');
        }

        // ریست تراکنش
        function resetTransaction() {
            cart = [];
            selectedCustomer = null;
            discountValue = 0;

            document.getElementById('customer-search').value = '';
            document.getElementById('selected-customer').classList.add('d-none');
            document.getElementById('discount-value').value = '';
            document.getElementById('discount-type').selectedIndex = 0;

            updateCartDisplay();
            calculateTotals();
            updatePaymentButton();

            showToast('سیستم آماده تراکنش جدید است', 'info');
        }

        // نمایش پیام
        function showToast(message, type = 'info') {
            // حذف toast قبلی
            const existingToast = document.querySelector('.toast-container');
            if (existingToast) {
                existingToast.remove();
            }

            const toastContainer = document.createElement('div');
            toastContainer.className = 'toast-container position-fixed top-0 start-50 translate-middle-x p-3';
            toastContainer.style.zIndex = '9999';

            let bgColor, icon;
            switch (type) {
                case 'success':
                    bgColor = 'bg-success';
                    icon = 'bi-check-circle';
                    break;
                case 'error':
                    bgColor = 'bg-danger';
                    icon = 'bi-exclamation-circle';
                    break;
                case 'warning':
                    bgColor = 'bg-warning';
                    icon = 'bi-exclamation-triangle';
                    break;
                default:
                    bgColor = 'bg-info';
                    icon = 'bi-info-circle';
            }

            toastContainer.innerHTML = `
        <div class="toast show ${bgColor} text-white" role="alert">
            <div class="d-flex align-items-center p-3">
                <i class="${icon} me-2"></i>
                <div class="flex-grow-1">${message}</div>
                <button type="button" class="btn-close btn-close-white me-2" data-bs-dismiss="toast"></button>
            </div>
        </div>
    `;

            document.body.appendChild(toastContainer);

            // حذف خودکار پس از 3 ثانیه
            setTimeout(() => {
                toastContainer.remove();
            }, 3000);
        }

        // Event listeners برای بستن dropdown مشتریان
        document.addEventListener('click', function(e) {
            if (!e.target.closest('#customer-search').parentElement) {
                const suggestions = document.querySelector('.customer-suggestions');
                if (suggestions) {
                    suggestions.remove();
                }
            }
        });

        // تنظیمات اولیه هنگام بارگذاری
        window.addEventListener('load', function() {
            calculateTotals();
            updatePaymentButton();
        });
    </script>
</body>

</html>
