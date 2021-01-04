<div>
    @push('scripts')
        @include('javascript.hideNotification')
    @endpush

    <div id="notification-container" class="notification-container">
        @if (session('gameRemoved'))
            <div class="notification-information">{{ session('gameRemoved') }}</div>

        @elseif (session('gameAdded'))
            <div class="notification-success">{{ session('gameAdded') }}</div>

        @endif
    </div>
</div>
