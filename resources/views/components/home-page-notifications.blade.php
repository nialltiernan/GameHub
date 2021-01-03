<div>
    @push('scripts')
        @include('javascript.hideNotification')
    @endpush

    <div id="notification-container" class="notification-container">

        @if (session('loggedIn'))
            <div class="notification-success">
                {{ session('loggedIn') }} &#129312;
            </div>

        @elseif(session('loggedOut'))
            <div class="notification-information">
                {{ session('loggedOut') }} &#129503;
            </div>

        @elseif(session('accountCreated'))
            <div class="notification-success">
                {{ session('accountCreated') }} &#129321;
            </div>

        @elseif(session('accountDeleted'))
            <div class="notification-warning-severe">
                {{ session('accountDeleted') }} &#128577;
            </div>

        @elseif(session('feedbackReceived'))
            <div class="notification-success">
                {{ session('feedbackReceived') }} &#x1F984;
            </div>
        @endif

    </div>
</div>
