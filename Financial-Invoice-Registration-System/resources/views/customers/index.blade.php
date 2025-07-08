<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>لیست مشتریان</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 text-gray-900 p-6 font-sans">

    <div class="max-w-7xl mx-auto bg-white rounded-lg shadow p-6">
        <h1 class="text-3xl font-bold mb-6 text-right">لیست مشتریان</h1>

        @if($users->count() > 0)
            <table class="min-w-full border border-gray-300 rounded overflow-hidden">
                <thead class="bg-gray-100 text-gray-700">
                    <tr class="text-right">
                        <th class="py-3 px-4 border-b border-gray-300">#</th>
                        <th class="py-3 px-4 border-b border-gray-300">نام</th>
                        <th class="py-3 px-4 border-b border-gray-300">نام خانوادگی</th>
                        <th class="py-3 px-4 border-b border-gray-300">موبایل</th>
                        <th class="py-3 px-4 border-b border-gray-300">تلفن ثابت</th>
                        <th class="py-3 px-4 border-b border-gray-300">کدپستی</th>
                        <th class="py-3 px-4 border-b border-gray-300">شناسه ملی</th>
                        <th class="py-3 px-4 border-b border-gray-300">نام شرکت</th>
                        <th class="py-3 px-4 border-b border-gray-300">شماره ثبت</th>
                        <th class="py-3 px-4 border-b border-gray-300">شماره اقتصادی</th>
                        <th class="py-3 px-4 border-b border-gray-300">آدرس</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                        <tr class="hover:bg-gray-50 border-b border-gray-200 text-right">
                            <td class="py-2 px-4">{{ $loop->iteration }}</td>
                            <td class="py-2 px-4">{{ $user->first_name }}</td>
                            <td class="py-2 px-4">{{ $user->last_name }}</td>
                            <td class="py-2 px-4">{{ $user->mobile }}</td>
                            <td class="py-2 px-4">{{ $user->phone ?? '-' }}</td>
                            <td class="py-2 px-4">{{ $user->postal_code ?? '-' }}</td>
                            <td class="py-2 px-4">{{ $user->national_id ?? '-' }}</td>
                            <td class="py-2 px-4">{{ $user->company_name ?? '-' }}</td>
                            <td class="py-2 px-4">{{ $user->registration_number ?? '-' }}</td>
                            <td class="py-2 px-4">{{ $user->economic_number ?? '-' }}</td>
                            <td class="py-2 px-4 max-w-xs truncate" title="{{ $user->address ?? '-' }}">{{ $user->address ?? '-' }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <p class="text-center text-gray-500 py-10">هیچ مشتری‌ای در سیستم ثبت نشده است.</p>
        @endif

    </div>

</body>
</html>
