<!DOCTYPE html>
<html lang="fa" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ثبت فاکتور</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <style>
        .dropdown-menu {
            position: absolute;
            z-index: 1000;
            width: 100%;
            max-height: 200px;
            overflow-y: auto;
            background: white;
            border: 1px solid #d1d5db;
            border-radius: 0.375rem;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            display: none;
        }
        .dropdown-item {
            padding: 8px 12px;
            cursor: pointer;
        }
        .dropdown-item:hover {
            background-color: #f3f4f6;
        }
    </style>
</head>

<body class="bg-gray-100 font-sans">
    <div class="container mx-auto p-6 max-w-4xl">
        <h1 class="text-2xl font-bold text-gray-800 mb-6 text-center">ثبت فاکتور جدید</h1>
        <form action="{{ route('admin.invoices.store') }}" method="POST" class="bg-white p-6 rounded-lg shadow-md">
            @csrf
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <!-- شماره فاکتور -->
                <div>
                    <label for="invoice_number" class="block text-sm font-medium text-gray-700">شماره فاکتور</label>
                    <input type="text" name="invoice_number" id="invoice_number" required readonly
                        class="mt-1 block w-full p-2 border border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500 bg-gray-100">
                    @error('invoice_number')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <!-- تاریخ فاکتور -->
                <div>
                    <label for="invoice_date" class="block text-sm font-medium text-gray-700">تاریخ فاکتور</label>
                    <input type="date" name="invoice_date" id="invoice_date" required
                        class="mt-1 block w-full p-2 border border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500">
                    @error('invoice_date')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <!-- کاربر -->
                <div class="relative">
                    <label for="user_search" class="block text-sm font-medium text-gray-700">جستجوی کاربر</label>
                    <input type="text" id="user_search" placeholder="شماره موبایل را وارد کنید"
                        class="mt-1 block w-full p-2 border border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500"
                        autocomplete="off">
                    <input type="hidden" name="user_id" id="user_id" required>
                    <div id="user_dropdown" class="dropdown-menu">
                        @foreach($users as $user)
                            <div class="dropdown-item" data-value="{{ $user->first_name }}">{{ $user->first_name }}</div>
                        @endforeach
                    </div>
                    @error('user_id')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <!-- تخفیف -->
                <div>
                    <label class="block text-sm font-medium text-gray-700">تخفیف (اختیاری)</label>
                    <div class="flex gap-2">
                        <select name="discount_type" id="discount_type"
                            class="mt-1 block w-1/3 p-2 border border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500"
                            onchange="calculateInvoiceTotal()">
                            <option value="toman" selected>تومان</option>
                            <option value="percent">درصد</option>
                        </select>
                        <input type="number" name="discount" id="discount" step="0.01" min="0"
                            class="mt-1 block w-2/3 p-2 border border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500"
                            oninput="calculateInvoiceTotal()">
                    </div>
                    @error('discount')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <!-- توضیحات -->
            <div class="mt-4">
                <label for="description" class="block text-sm font-medium text-gray-700">توضیحات (اختیاری)</label>
                <textarea name="description" id="description" rows="4"
                    class="mt-1 block w-full p-2 border border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500"></textarea>
                @error('description')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- آیتم‌های فاکتور -->
            <h3 class="text-lg font-semibold text-gray-800 mt-6 mb-4">آیتم‌های فاکتور</h3>
            <div id="items" class="space-y-4">
                <div class="item bg-gray-50 p-4 rounded-md border border-gray-200">
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                        <!-- محصول -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700">محصول</label>
                            <select name="items[0][product_id]" required
                                class="mt-1 block w-full p-2 border border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500 product-select"
                                onchange="updateProductPrice(0)">
                                <option value="" disabled selected>انتخاب محصول</option>
                                @foreach($products as $product)
                                    <option value="{{ $product->id }}" data-price="{{ $product->price }}">
                                        {{ $product->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('items.0.product_id')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        <!-- قیمت -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700">قیمت</label>
                            <input type="number" name="items[0][product_price]" required step="0.01" min="0"
                                class="mt-1 block w-full p-2 border border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500 product-price"
                                oninput="calculateTotalPrice(0)">
                            @error('items.0.product_price')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        <!-- دسته‌بندی -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700">دسته‌بندی</label>
                            <select name="items[0][category_id]" required
                                class="mt-1 block w-full p-2 border border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500">
                                <option value="" disabled selected>انتخاب دسته‌بندی</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                            @error('items.0.category_id')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        <!-- تخفیف آیتم -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700">تخفیف (اختیاری)</label>
                            <div class="flex gap-2">
                                <select name="items[0][discount_type]" required
                                    class="mt-1 block w-1/3 p-2 border border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500 discount-type"
                                    onchange="calculateTotalPrice(0)">
                                    <option value="toman" selected>تومان</option>
                                    <option value="percent">درصد</option>
                                </select>
                                <input type="number" name="items[0][discount]" step="0.01" min="0"
                                    class="mt-1 block w-2/3 p-2 border border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500 discount"
                                    oninput="calculateTotalPrice(0)">
                            </div>
                            @error('items.0.discount')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        <!-- قیمت کل -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700">قیمت کل</label>
                            <input type="number" name="items[0][total_price]" required step="0.01" min="0" readonly
                                class="mt-1 block w-full p-2 border border-gray-300 rounded-md bg-gray-100">
                            @error('items.0.total_price')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        <!-- توضیحات آیتم -->
                        <div class="md:col-span-2 lg:col-span-3">
                            <label class="block text-sm font-medium text-gray-700">توضیحات (اختیاری)</label>
                            <textarea name="items[0][description]" rows="3"
                                class="mt-1 block w-full p-2 border border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500"></textarea>
                            @error('items.0.description')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <button type="button" onclick="removeItem(this)"
                        class="text-red-600 hover:text-red-800 mt-2 hidden">حذف آیتم</button>
                </div>
            </div>

            <!-- دکمه‌ها -->
            <div class="mt-6 flex space-x-4 space-x-reverse">
                <a href="{{route('admin.dashboard')}}"><button type="button" onclick="addItem()"
                        class="bg-indigo-600 text-white px-4 py-2 rounded-md hover:bg-indigo-700">
                        بازگشت
                    </button></a>
                <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded-md hover:bg-green-700">
                    ثبت فاکتور
                </button>
            </div>
        </form>
    </div>

    <script>
        function generateInvoiceNumber() {
            const characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
            let result = '';
            for (let i = 0; i < 8; i++) {
                result += characters.charAt(Math.floor(Math.random() * characters.length));
            }
            return result;
        }

        // تنظیم شماره فاکتور هنگام بارگذاری صفحه
        $(document).ready(function () {
            $("#invoice_number").val(generateInvoiceNumber());

            // جستجوی کاربر
            const userSearch = $('#user_search');
            const userDropdown = $('#user_dropdown');
            const userIdInput = $('#user_id');

            userSearch.on('input', function () {
                const query = $(this).val().toLowerCase();
                userDropdown.show();
                userDropdown.find('.dropdown-item').each(function () {
                    const mobile = $(this).text().toLowerCase();
                    $(this).toggle(mobile.includes(query));
                });
            });

            // انتخاب کاربر
            userDropdown.on('click', '.dropdown-item', function () {
                const mobile = $(this).data('value');
                userSearch.val(mobile);
                userIdInput.val(mobile);
                userDropdown.hide();
            });

            // بستن dropdown هنگام کلیک خارج از آن
            $(document).on('click', function (e) {
                if (!userSearch.is(e.target) && !userDropdown.is(e.target) && userDropdown.has(e.target).length === 0) {
                    userDropdown.hide();
                }
            });
        });

        let itemCount = 1;

        function addItem() {
            const itemsDiv = document.getElementById('items');
            const newItem = document.createElement('div');
            newItem.className = 'item bg-gray-50 p-4 rounded-md border border-gray-200 mt-4';
            newItem.innerHTML = `
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700">محصول</label>
                        <select name="items[${itemCount}][product_id]" required
                                class="mt-1 block w-full p-2 border border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500 product-select"
                                onchange="updateProductPrice(${itemCount})">
                            <option value="" disabled selected>انتخاب محصول</option>
                            @foreach($products as $product)
                                <option value="{{ $product->id }}" data-price="{{ $product->price }}">{{ $product->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">قیمت</label>
                        <input type="number" name="items[${itemCount}][product_price]" required step="0.01" min="0"
                               class="mt-1 block w-full p-2 border border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500 product-price"
                               oninput="calculateTotalPrice(${itemCount})">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">دسته‌بندی</label>
                        <select name="items[${itemCount}][category_id]" required
                                class="mt-1 block w-full p-2 border border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500">
                            <option value="" disabled selected>انتخاب دسته‌بندی</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">تخفیف (اختیاری)</label>
                        <div class="flex gap-2">
                            <select name="items[${itemCount}][discount_type]" required
                                    class="mt-1 block w-1/3 p-2 border border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500 discount-type"
                                    onchange="calculateTotalPrice(${itemCount})">
                                <option value="toman" selected>تومان</option>
                                <option value="percent">درصد</option>
                            </select>
                            <input type="number" name="items[${itemCount}][discount]" step="0.01" min="0"
                                   class="mt-1 block w-2/3 p-2 border border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500 discount"
                                   oninput="calculateTotalPrice(${itemCount})">
                        </div>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">قیمت کل</label>
                        <input type="number" name="items[${itemCount}][total_price]" required step="0.01" min="0" readonly
                               class="mt-1 block w-full p-2 border border-gray-300 rounded-md bg-gray-100">
                    </div>
                    <div class="md:col-span-2 lg:col-span-3">
                        <label class="block text-sm font-medium text-gray-700">توضیحات (اختیاری)</label>
                        <textarea name="items[${itemCount}][description]" rows="3"
                                  class="mt-1 block w-full p-2 border border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500"></textarea>
                    </div>
                </div>
                <button type="button" onclick="removeItem(this)" class="text-red-600 hover:text-red-800 mt-2">حذف آیتم</button>
            `;
            itemsDiv.appendChild(newItem);
            itemCount++;
        }

        function removeItem(element) {
            if (document.querySelectorAll('.item').length > 1) {
                element.closest('.item').remove();
            }
        }

        function updateProductPrice(index) {
            const itemDiv = document.querySelectorAll('.item')[index];
            const select = itemDiv.querySelector(`select[name="items[${index}][product_id]"]`);
            const priceInput = itemDiv.querySelector(`input[name="items[${index}][product_price]"]`);
            const selectedOption = select.options[select.selectedIndex];
            const price = selectedOption.getAttribute('data-price') || 0;
            priceInput.value = parseFloat(price).toFixed(2);
            calculateTotalPrice(index);
        }

        function calculateTotalPrice(index) {
            const itemDiv = document.querySelectorAll('.item')[index];
            const price = parseFloat(itemDiv.querySelector(`input[name="items[${index}][product_price]"]`).value) || 0;
            const discount = parseFloat(itemDiv.querySelector(`input[name="items[${index}][discount]"]`).value) || 0;
            const discountType = itemDiv.querySelector(`select[name="items[${index}][discount_type]"]`).value;
            const totalPriceInput = itemDiv.querySelector(`input[name="items[${index}][total_price]"]`);

            let totalPrice = price;
            if (discountType === 'percent') {
                totalPrice = price * (1 - discount / 100);
            } else if (discountType === 'toman') {
                totalPrice = price - discount;
            }
            totalPriceInput.value = Math.max(0, totalPrice).toFixed(2);
        }

        function calculateInvoiceTotal() {
            // این تابع می‌تواند برای محاسبه مجموع کل فاکتور با اعمال تخفیف کلی استفاده شود
        }
    </script>
</body>

</html>