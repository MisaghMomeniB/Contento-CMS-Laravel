<!DOCTYPE html>
<html lang="fa">

<head>
    <meta charset="UTF-8">
    <title>ویرایش فاکتور</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 p-6 font-sans">
    <div class="max-w-4xl mx-auto bg-white rounded-lg shadow p-6">
        <h2 class="text-2xl font-bold mb-4 text-center">ویرایش فاکتور</h2>

        @if(session('success'))
            <div class="bg-green-100 text-green-800 p-3 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        @if($errors->any())
            <div class="bg-red-100 text-red-800 p-3 rounded mb-4">
                <ul class="list-disc list-inside">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('admin.invoices.update', $invoice) }}" method="POST" id="invoice-form">
            @csrf
            @method('PUT')
            <div class="mb-4">
                <label for="invoice_number" class="block font-medium mb-1">شماره فاکتور:</label>
                <input type="text" name="invoice_number" id="invoice_number"
                    value="{{ old('invoice_number', $invoice->invoice_number) }}"
                    class="w-full border-gray-300 rounded p-2 focus:ring focus:ring-blue-200" required>
            </div>
            <div class="mb-4">
                <label for="invoice_date" class="block font-medium mb-1">تاریخ فاکتور:</label>
                <input type="date" name="invoice_date" id="invoice_date"
                    value="{{ old('invoice_date', $invoice->invoice_date) }}"
                    class="w-full border-gray-300 rounded p-2 focus:ring focus:ring-blue-200" required>
            </div>
            <div class="mb-4">
                <label for="user_id" class="block font-medium mb-1">کاربر:</label>
                <select name="user_id" id="user_id"
                    class="w-full border-gray-300 rounded p-2 focus:ring focus:ring-blue-200" required>
                    <option value="">انتخاب کاربر</option>
                    @foreach($users as $user)
                        <option value="{{ $user->id }}" {{ old('user_id', $invoice->user_id) == $user->id ? 'selected' : '' }}>{{ $user->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-4">
                <label for="invoice_type" class="block font-medium mb-1">نوع فاکتور:</label>
                <select name="invoice_type" id="invoice_type"
                    class="w-full border-gray-300 rounded p-2 focus:ring focus:ring-blue-200" required>
                    <option value="">انتخاب نوع</option>
                    <option value="پرداختی" {{ old('invoice_type', $invoice->invoice_type) == 'پرداختی' ? 'selected' : '' }}>پرداختی</option>
                    <option value="مرجوعی" {{ old('invoice_type', $invoice->invoice_type) == 'مرجوعی' ? 'selected' : '' }}>مرجوعی</option>
                </select>
            </div>
            <div class="mb-4">
                <label for="status" class="block font-medium mb-1">وضعیت:</label>
                <select name="status" id="status"
                    class="w-full border-gray-300 rounded p-2 focus:ring focus:ring-blue-200" required>
                    <option value="">انتخاب وضعیت</option>
                    <option value="پرداخت شده" {{ old('status', $invoice->status) == 'پرداخت شده' ? 'selected' : '' }}>
                        پرداخت شده</option>
                    <option value="پرداخت نشده" {{ old('status', $invoice->status) == 'پرداخت نشده' ? 'selected' : '' }}>
                        پرداخت نشده</option>
                </select>
            </div>
            <div class="mb-4">
                <label for="discount" class="block font-medium mb-1">تخفیف (تومان):</label>
                <input type="number" name="discount" id="discount" value="{{ old('discount', $invoice->discount) }}"
                    class="w-full border-gray-300 rounded p-2 focus:ring focus:ring-blue-200">
            </div>
            <div class="mb-4">
                <label for="description" class="block font-medium mb-1">توضیحات:</label>
                <textarea name="description" id="description"
                    class="w-full border-gray-300 rounded p-2 focus:ring focus:ring-blue-200">{{ old('description', $invoice->description) }}</textarea>
            </div>

            <div class="mb-4">
                <h3 class="text-lg font-bold mb-2">آیتم‌های فاکتور</h3>
                <div id="items-container">
                    @foreach($invoice->items as $index => $item)
                        <div class="item-row mb-4 border p-4 rounded">
                            <div class="flex justify-between">
                                <h4 class="font-medium mb-2">آیتم {{ $index + 1 }}</h4>
                                <button type="button" class="remove-item text-red-600 hover:text-red-800">حذف</button>
                            </div>
                            <div class="mb-2">
                                <label class="block font-medium mb-1">محصول:</label>
                                <select name="items[{{ $index }}][product_id]" class="w-full border-gray-300 rounded p-2"
                                    required>
                                    <option value="">انتخاب محصول</option>
                                    @foreach($products as $product)
                                        <option value="{{ $product->id }}" data-price="{{ $product->price }}"
                                            data-category="{{ $product->category_id }}" {{ $item->product_id == $product->id ? 'selected' : '' }}>{{ $product->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-2">
                                <label class="block font-medium mb-1">دسته‌بندی:</label>
                                <select name="items[{{ $index }}][category_id]" class="w-full border-gray-300 rounded p-2"
                                    required>
                                    <option value="">انتخاب دسته‌بندی</option>
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}" {{ $item->category_id == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-2">
                                <label class="block font-medium mb-1">قیمت واحد (تومان):</label>
                                <input type="number" name="items[{{ $index }}][product_price]"
                                    value="{{ $item->product_price }}" class="w-full border-gray-300 rounded p-2" required>
                            </div>
                            <div class="mb-2">
                                <label class="block font-medium mb-1">تخفیف (تومان):</label>
                                <input type="number" name="items[{{ $index }}][discount]" value="{{ $item->discount }}"
                                    class="w-full border-gray-300 rounded p-2">
                            </div>
                            <div class="mb-2">
                                <label class="block font-medium mb-1">قیمت کل (تومان):</label>
                                <input type="number" name="items[{{ $index }}][total_price]"
                                    value="{{ $item->total_price }}" class="w-full border-gray-300 rounded p-2" required>
                            </div>
                            <div class="mb-2">
                                <label class="block font-medium mb-1">توضیحات:</label>
                                <textarea name="items[{{ $index }}][description]"
                                    class="w-full border-gray-300 rounded p-2">{{ $item->description }}</textarea>
                            </div>
                        </div>
                    @endforeach
                </div>
                <button type="button" id="add-item"
                    class="bg-blue-500 text-white px-3 py-1 rounded hover:bg-blue-600">افزودن آیتم</button>
            </div>

            <div class="text-right space-x-2 space-x-reverse">
                <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">ثبت
                    تغییرات</button>
                <a href="{{ route('admin.invoices.index') }}"
                    class="bg-gray-600 text-white px-4 py-2 rounded hover:bg-gray-700">بازگشت</a>
            </div>
        </form>
    </div>

    <script>
        const products = @json($products);
        const categories = @json($categories);

        document.getElementById('add-item').addEventListener('click', function () {
            const itemIndex = document.querySelectorAll('.item-row').length;
            const itemHtml = `
                <div class="item-row mb-4 border p-4 rounded">
                    <div class="flex justify-between">
                        <h4 class="font-medium mb-2">آیتم ${itemIndex + 1}</h4>
                        <button type="button" class="remove-item text-red-600 hover:text-red-800">حذف</button>
                    </div>
                    <div class="mb-2">
                        <label class="block font-medium mb-1">محصول:</label>
                        <select name="items[${itemIndex}][product_id]" class="w-full border-gray-300 rounded p-2" required>
                            <option value="">انتخاب محصول</option>
                            ${products.map(product => `<option value="${product.id}" data-price="${product.price}" data-category="${product.category_id}">${product.name}</option>`).join('')}
                        </select>
                    </div>
                    <div class="mb-2">
                        <label class="block font-medium mb-1">دسته‌بندی:</label>
                        <select name="items[${itemIndex}][category_id]" class="w-full border-gray-300 rounded p-2" required>
                            <option value="">انتخاب دسته‌بندی</option>
                            ${categories.map(category => `<option value="${category.id}">${category.name}</option>`).join('')}
                        </select>
                    </div>
                    <div class="mb-2">
                        <label class="block font-medium mb-1">قیمت واحد (تومان):</label>
                        <input type="number" name="items[${itemIndex}][product_price]" class="w-full border-gray-300 rounded p-2" required>
                    </div>
                    <div class="mb-2">
                        <label class="block font-medium mb-1">تخفیف (تومان):</label>
                        <input type="number" name="items[${itemIndex}][discount]" class="w-full border-gray-300 rounded p-2" value="0">
                    </div>
                    <div class="mb-2">
                        <label class="block font-medium mb-1">قیمت کل (تومان):</label>
                        <input type="number" name="items[${itemIndex}][total_price]" class="w-full border-gray-300 rounded p-2" required>
                    </div>
                    <div class="mb-2">
                        <label class="block font-medium mb-1">توضیحات:</label>
                        <textarea name="items[${itemIndex}][description]" class="w-full border-gray-300 rounded p-2"></textarea>
                    </div>
                </div>`;
            document.getElementById('items-container').insertAdjacentHTML('beforeend', itemHtml);
        });

        document.getElementById('items-container').addEventListener('click', function (e) {
            if (e.target.classList.contains('remove-item')) {
                e.target.closest('.item-row').remove();
            }
        });

        document.getElementById('items-container').addEventListener('change', function (e) {
            if (e.target.name.includes('product_id')) {
                const select = e.target;
                const priceInput = select.closest('.item-row').querySelector('input[name*="product_price"]');
                const categorySelect = select.closest('.item-row').querySelector('select[name*="category_id"]');
                const selectedOption = select.options[select.selectedIndex];
                priceInput.value = selectedOption.dataset.price || '';
                categorySelect.value = selectedOption.dataset.category || '';
            }
        });
    </script>
</body>

</html>