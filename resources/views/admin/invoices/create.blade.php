<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ثبت فاکتور</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
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
                    <input type="text" name="invoice_number" id="invoice_number" required
                           class="mt-1 block w-full p-2 border border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500">
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
                <div>
                    <label for="user_id" class="block text-sm font-medium text-gray-700">کاربر</label>
                    <select name="user_id" id="user_id" required
                            class="mt-1 block w-full p-2 border border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500">
                        <option value="" disabled selected>انتخاب کاربر</option>
                        @foreach($users as $user)
                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                        @endforeach
                    </select>
                    @error('user_id')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <!-- نوع فاکتور -->
                <div>
                    <label for="invoice_type" class="block text-sm font-medium text-gray-700">نوع فاکتور</label>
                    <select name="invoice_type" id="invoice_type" required
                            class="mt-1 block w-full p-2 border border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500">
                        <option value="" disabled selected>انتخاب نوع</option>
                        <option value="پرداختی">پرداختی</option>
                        <option value="مرجوعی">مرجوعی</option>
                    </select>
                    @error('invoice_type')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <!-- وضعیت -->
                <div>
                    <label for="status" class="block text-sm font-medium text-gray-700">وضعیت</label>
                    <select name="status" id="status" required
                            class="mt-1 block w-full p-2 border border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500">
                        <option value="" disabled selected>انتخاب وضعیت</option>
                        <option value="پرداخت شده">پرداخت شده</option>
                        <option value="پرداخت نشده">پرداخت نشده</option>
                    </select>
                    @error('status')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <!-- تخفیف -->
                <div>
                    <label for="discount" class="block text-sm font-medium text-gray-700">تخفیف (اختیاری)</label>
                    <input type="number" name="discount" id="discount" step="0.01" min="0"
                           class="mt-1 block w-full p-2 border border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500">
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
                                    <option value="{{ $product->id }}" data-price="{{ $product->price }}">{{ $product->name }}</option>
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
                            <input type="number" name="items[0][discount]" step="0.01" min="0"
                                   class="mt-1 block w-full p-2 border border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500 discount"
                                   oninput="calculateTotalPrice(0)">
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
                    <button type="button" onclick="removeItem(this)" class="text-red-600 hover:text-red-800 mt-2 hidden">حذف آیتم</button>
                </div>
            </div>

            <!-- دکمه‌ها -->
            <div class="mt-6 flex space-x-4 space-x-reverse">
                <a href="{{route("admin.dashboard")}}"><button type="button" onclick="addItem()"
                        class="bg-indigo-600 text-white px-4 py-2 rounded-md hover:bg-indigo-700">
                    بازگشت 
                </button></a>
                <button type="submit"
                        class="bg-green-600 text-white px-4 py-2 rounded-md hover:bg-green-700">
                    ثبت فاکتور
                </button>
            </div>
        </form>
    </div>

    <script>
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
                        <input type="number" name="items[${itemCount}][discount]" step="0.01" min="0"
                               class="mt-1 block w-full p-2 border border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500 discount"
                               oninput="calculateTotalPrice(${itemCount})">
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
            const totalPriceInput = itemDiv.querySelector(`input[name="items[${index}][total_price]"]`);
            totalPriceInput.value = (price - discount).toFixed(2);
        }
    </script>
</body>
</html>