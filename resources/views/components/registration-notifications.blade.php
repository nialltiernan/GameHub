<div>
    @push('scripts')
        @include('javascript.hideNotification')
    @endpush

    @error('email')
        <div id="notification-container" class="notification-container">
            <div class="notification-warning-severe">
                {{ $message }}
            </div>
        </div>
    @enderror

    @error('password')
        <div id="notification-container" class="notification-container">
            <div class="notification-warning-severe">
                {{ $message }}
            </div>
        </div>
    @enderror
</div>
