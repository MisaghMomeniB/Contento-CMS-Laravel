<ul class="space-y-2">
    @forelse ($users as $user)
        <li class="border-b pb-2">{{ $user->first_name }} {{ $user->last_name }} {{$user->mobile}}</li>
    @empty
        <li>هیچ مشتری‌ای پیدا نشد.</li>
    @endforelse
</ul>
