<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>GameHub</title>
    <link rel="stylesheet" href="/css/app.css">
    <livewire:styles />
</head>
<body class="bg-gray-900 text-white">
    <header class="border-b border-gray-800">
        <nav class="container mx-auto flex flex-col lg:flex-row  items-center justify-between px-4 py-6">
            <div class="flex flex-col lg:flex-row items-center">
                <ul class="flex ml-0 space-x-8 mt-6 lg:mt-0">
                    <li><a href="/" class="hover:text-gray-400">Home</a></li>
                    <li><a href="{{ route('platforms.index') }}" class="hover:text-gray-400">Platforms</a></li>
                </ul>
            </div>
            <div class="flex items-center mt-6 lg:mt-0">
                @if (Auth::check())
                    <a href="{{ route('auth.logout') }}" class="mr-5 hover:text-gray-400">Logout</a>
                @else
                    <a href="{{ route('auth.showLogin') }}" class="mr-5 hover:text-gray-400">Login</a>
                    <a href="{{ route('auth.showRegister') }}" class="mr-5 hover:text-gray-400">Register</a>
                @endif
                <livewire:search-dropdown/>
            </div>
        </nav>


    </header>

    <main class="py-8">
        @yield('content')
    </main>

    <footer class="border-t border-gray-800">
        <div class="container mx-auto px-4 py-6">
            Powered By
            <a target="_blank" href="https://rawg.io/apidocs" class="underline hover:text-gray-400">RAWG API</a>,
            <a target="_blank" href="https://laravel.com/" class="underline hover:text-gray-400">Laravel</a> and
            <a target="_blank" href="https://tailwindcss.com/" class="underline hover:text-gray-400">Tailwind</a>. Inspired by
            <a target="_blank" href="https://laracasts.com/series/build-a-video-game-aggregator/" class="underline hover:text-gray-400">Laracasts</a>
        </div>
    </footer>
    <livewire:scripts />
    <script src="/js/app.js"></script>
    @stack('scripts')
</body>
</html>
