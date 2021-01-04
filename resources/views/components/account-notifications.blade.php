<div>
    @push('scripts')
        @include('javascript.hideNotification')
    @endpush

    <div id="notification-container" class="notification-container">

        @if (session('usernameChanged'))
            <div class="notification-success">{{ session('usernameChanged') }}</div>

        @elseif (session('emailChanged'))
            <div class="notification-success">{{ session('emailChanged') }}</div>

        @elseif (session('passwordChanged'))
            <div class="notification-success">{{ session('passwordChanged') }}</div>
        @endif


        @error('email')
            <div class="notification-warning-severe">{{ $message }}</div>
        @enderror

        @error('emailConfirmation')
            <div class="notification-warning-severe">{{ $message }}</div>
        @enderror

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
