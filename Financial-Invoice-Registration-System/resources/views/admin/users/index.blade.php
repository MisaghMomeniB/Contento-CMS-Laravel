<div class="container mx-auto p-6">
    <h1 class="text-2xl font-bold mb-6">لیست مشتریان</h1>

    {{-- پیام موفقیت --}}
    @if(session('success'))
        <div class="mb-4 p-4 bg-green-100 border border-green-400 text-green-700 rounded">
            {{ session('success') }}
        </div>
    @endif

    {{-- جدول مشتریان --}}
    <div class="overflow-x-auto">
        <table class="min-w-full bg-white border border-gray-200 rounded-lg shadow">
            <thead class="bg-blue-800 text-white text-right">
                <tr>
                    <th class="py-3 px-4 border-b">#</th>
                    <th class="py-3 px-4 border-b">نام</th>
                    <th class="py-3 px-4 border-b">نام خانوادگی</th>
                    <th class="py-3 px-4 border-b">موبایل</th>
                    <th class="py-3 px-4 border-b">نوع مشتری</th>
                    <th class="py-3 px-4 border-b text-center">عملیات</th>
                </tr>
            </thead>
            <tbody class="text-sm text-gray-700 divide-y divide-gray-100">
                @forelse ($users as $user)
                    <tr class="hover:bg-gray-50 transition">
                        <td class="py-2 px-4">{{ $loop->iteration }}</td>
                        <td class="py-2 px-4 font-medium">{{ $user->first_name }}</td>
                        <td class="py-2 px-4">{{ $user->last_name }}</td>
                        <td class="py-2 px-4">{{ $user->mobile }}</td>
                        <td class="py-2 px-4 text-green-800">{{ $user->user_type ?? 'حقیقی' }}</td>
                        <td class="py-2 px-4">
                            <div class="flex justify-center gap-2 rtl:flex-row-reverse">
                                <a href="{{ route('admin.users.show', $user->id) }}"
                                    class="bg-blue-600 hover:bg-blue-700 text-white text-sm px-3 py-1 rounded">
                                    مشاهده
                                </a>
                                <a href="{{ route('admin.users.edit', $user->id) }}"
                                    class="bg-yellow-500 hover:bg-yellow-600 text-white text-sm px-3 py-1 rounded">
                                    ویرایش
                                </a>
                                <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST"
                                    onsubmit="return confirm('آیا از حذف این مشتری مطمئن هستید؟');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="bg-red-600 hover:bg-red-700 text-white text-sm px-3 py-1 rounded">
                                        حذف
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center py-4 text-gray-500">
                            هیچ مشتری‌ای یافت نشد.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>