<div>
    @push('scripts')
        @include('javascript.hideNotification')
    @endpush

    <div id="notification-container" class="notification-container">
        @if (session('commentCreated'))
            <div class="notification-success">
                {!! session('commentCreated') !!}
            </div>
        @endif
    </div>
</div>
