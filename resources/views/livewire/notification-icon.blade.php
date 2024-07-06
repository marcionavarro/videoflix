<div class="relative">
    <a href="{{route('notifications')}}" title="">
        @php $unreadNotifications = auth()->user()->unreadNotifications()->count() @endphp

        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
             stroke-width="1.5"
             stroke="currentColor"
             class="w-6 h-6 mr-4
                                @if($unreadNotifications)
                 text-red-500 hover:text-red-700
@else
                 text-gray-500 hover:text-gray-700
@endif">
            <path stroke-linecap="round" stroke-linejoin="round"
                  d="M14.857 17.082a23.848 23.848 0 005.454-1.31A8.967 8.967 0 0118 9.75v-.7V9A6 6 0 006 9v.75a8.967 8.967 0 01-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 01-5.714 0m5.714 0a3 3 0 11-5.714 0"/>
        </svg>

        @if($unreadNotifications)
            <span
                class="absolute px-1 bg-red-600 top-1 right-1 text-white rounded-full">{{ $unreadNotifications  }}</span>
        @endif
    </a>
</div>
