<div class="container mx-auto p-6">
    <h1 class="text-2xl font-bold mb-6">لیست مشتریان</h1>

    {{-- نمایش پیام موفقیت --}}
    @if(session('success'))
        <div class="mb-4 p-4 bg-green-100 border border-green-400 text-green-700 rounded">
            {{ session('success') }}
        </div>
    @endif

    {{-- نمایش جدول مشتریان --}}
    @include('admin.partials.users-list')

</div>