<div>
    @push('scripts')
        @include('javascript.hideNotification')
    @endpush

    <div id="notification-container" class="notification-container">
        @if (session('listCreated'))
            <div class="notification-success">
                {{ session('listCreated') }}
            </div>
        @elseif (session('listDeleted'))
            <div class="notification-information">
                {{ session('listDeleted') }}
            </div>
        @endif
    </div>
</div>
