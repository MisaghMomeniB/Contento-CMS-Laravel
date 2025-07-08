<script src="https://cdn.tailwindcss.com"></script>

<div class="container mx-auto max-w-3xl p-6" dir="rtl">
    <h1 class="text-2xl font-bold text-blue-800 mb-6 border-b pb-2">جزئیات مشتری</h1>

    <div class="bg-white border border-gray-200 rounded-xl shadow-md p-6 space-y-5">
        <div class="flex justify-between items-center">
            <span class="font-semibold text-gray-600">نام:</span>
            <span class="text-gray-900">{{ $user->first_name }}</span>
        </div>

        <div class="flex justify-between items-center">
            <span class="font-semibold text-gray-600">نام خانوادگی:</span>
            <span class="text-gray-900">{{ $user->last_name }}</span>
        </div>

        <div class="flex justify-between items-center">
            <span class="font-semibold text-gray-600">موبایل:</span>
            <span class="text-gray-900">{{ $user->mobile }}</span>
        </div>

        <div class="flex justify-between items-center">
            <span class="font-semibold text-gray-600">نوع مشتری:</span>
            <span class="text-green-700 font-semibold">{{ $user->user_type ?? 'حقیقی' }}</span>
        </div>
    </div>

    <div class="mt-8">
        <a href="{{ route('admin.dashboard') }}"
            class="inline-block text-sm text-blue-600 hover:text-blue-800 transition font-medium border border-blue-600 px-4 py-2 rounded-lg hover:bg-blue-50">
            ← بازگشت
        </a>
    </div>
</div>