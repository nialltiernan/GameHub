<div>
    @push('scripts')
        @include('javascript.hideNotification')
    @endpush

    <div id="notification-container" class="notification-container">
        @if(session('failure'))
            <div class="notification-warning">
                {{ session('failure') }}
            </div>
        @endif
    </div>
</div>
