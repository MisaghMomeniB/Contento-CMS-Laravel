<script src="https://cdn.tailwindcss.com"></script>

<div dir="rtl" class="container mx-auto max-w-3xl p-6">
    <h1 class="text-2xl font-bold text-blue-800 mb-6 border-b pb-2">ویرایش مشتری</h1>

    <form action="{{ route('admin.users.update', $user->id) }}" method="POST" class="bg-white shadow-md rounded-xl p-6 border border-gray-200 space-y-5">
        @csrf
        @method('PUT')

        <div>
            <label class="block mb-1 font-semibold text-gray-700">نام</label>
            <input type="text" name="first_name" value="{{ old('first_name', $user->first_name) }}"
                   class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring focus:ring-blue-200">
        </div>

        <div>
            <label class="block mb-1 font-semibold text-gray-700">نام خانوادگی</label>
            <input type="text" name="last_name" value="{{ old('last_name', $user->last_name) }}"
                   class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring focus:ring-blue-200">
        </div>

        <div>
            <label class="block mb-1 font-semibold text-gray-700">موبایل</label>
            <input type="text" name="mobile" value="{{ old('mobile', $user->mobile) }}"
                   class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring focus:ring-blue-200">
        </div>

        <div>
            <label class="block mb-1 font-semibold text-gray-700">نوع مشتری</label>
            <select name="user_type" class="w-full border border-gray-300 rounded-lg px-4 py-2">
                <option value="" @selected(!$user->user_type)>حقیقی</option>
                <option value="حقوقی" @selected($user->user_type === 'حقوقی')>حقوقی</option>
                <option value="سازمانی" @selected($user->user_type === 'سازمانی')>سازمانی</option>
            </select>
        </div>

        <div class="flex items-center justify-between pt-4">
            <button type="submit"
                    class="bg-blue-600 hover:bg-blue-700 text-white font-semibold px-6 py-2 rounded-lg">
                ذخیره تغییرات
            </button>

            <a href="{{ route('admin.dashboard') }}" class="text-gray-600 hover:underline">بازگشت</a>
        </div>
    </form>
</div>
