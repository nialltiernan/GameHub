<div>
    @push('scripts')
        @include('javascript.hideNotification')
    @endpush

    <div id="notification-container" class="notification-container">
        @error('username')
            <div class="notification-warning-severe">{{ $message }}</div>
        @enderror

        @error('password')
            <div class="notification-warning-severe">{{ $message }}</div>
        @enderror
    </div>

</div>
