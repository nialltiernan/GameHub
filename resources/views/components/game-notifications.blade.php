<div>
    @push('scripts')
        @include('javascript.hideNotification')
    @endpush

    <div id="notification-container" class="notification-container">
        @if (session('commentCreated'))
            <div class="notification-success">
                {!! session('commentCreated') !!}
            </div>
        @elseif(session('commentUpdated'))
            <div class="notification-information">
                {{ session('commentUpdated') }}
            </div>
        @elseif(session('commentDeleted'))
            <div class="notification-information">
                {{ session('commentDeleted') }}
            </div>
        @endif
    </div>
</div>
