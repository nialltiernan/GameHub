<div>
    @push('scripts')
        @include('javascript.hideNotification')
    @endpush

    <div id="notification-container" class="notification-container">
        @if (session('loggedIn'))
            <div class="notification-success">
                {{ session('loggedIn') }}
            </div>
        @elseif(session('loggedOut'))
            <div class="notification-information">
                {{ session('loggedOut') }}
            </div>
        @elseif(session('feedbackReceived'))
            <div class="notification-success">
                {{ session('feedbackReceived') }}
            </div>
        @endif
    </div>
</div>
