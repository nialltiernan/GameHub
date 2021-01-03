<div>
    @push('scripts')
        @include('javascript.hideNotification')
    @endpush

    @if (session('usernameChanged'))
        <div id="notification-container" class="notification-container">
            <div class="notification-success">
                {{ session('usernameChanged') }}
            </div>
        </div>

    @elseif (session('emailChanged'))
        <div id="notification-container" class="notification-container">
            <div class="notification-success">
                {{ session('emailChanged') }}
            </div>
        </div>

    @elseif (session('passwordChanged'))
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

    @error('username')
        <div id="notification-container" class="notification-container">
            <div class="notification-warning-severe">
                {{ $message }}
            </div>
        </div>
    @enderror
</div>
