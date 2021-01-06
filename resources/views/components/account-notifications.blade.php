<div>
    @push('scripts')
        @include('javascript.hideNotification')
    @endpush

    <div id="notification-container" class="notification-container">

        @if (session('usernameChanged'))
            <div class="notification-success">{{ session('usernameChanged') }}</div>

        @elseif (session('passwordChanged'))
            <div class="notification-success">{{ session('passwordChanged') }}</div>
        @endif

        @error('password')
            <div class="notification-warning-severe">{{ $message }}</div>
        @enderror

        @error('passwordConfirmation')
            <div class="notification-warning-severe">{{ $message }}</div>
        @enderror

        @error('username')
            <div class="notification-warning-severe">{{ $message }}</div>
        @enderror
    </div>
</div>
