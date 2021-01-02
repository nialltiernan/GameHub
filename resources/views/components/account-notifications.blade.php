<div>
    @push('scripts')
        @include('javascript.hideNotification')
    @endpush

    @if (session('emailChanged'))
        <div id="notification-container" class="notification-container">
            <div class="notification-success">
                {{ session('emailChanged') }}
            </div>
        </div>
    @endif

    @if (session('passwordChanged'))
        <div id="notification-container" class="notification-container">
            <div class="notification-success">
                {{ session('passwordChanged') }}
            </div>
        </div>
    @endif

    @error('email')
        <div id="notification-container" class="notification-container">
            <div class="notification-warning-severe">
                {{ $message }}
            </div>
        </div>
    @enderror

    @error('emailConfirmation')
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

    @error('passwordConfirmation')
        <div id="notification-container" class="notification-container">
            <div class="notification-warning-severe">
                {{ $message }}
            </div>
        </div>
    @enderror
</div>
