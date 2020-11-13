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
                    <li><a href="/">Home</a></li>
                    <li><a href="{{ route('platforms.index') }}" class="hover:text-gray-400">Platforms</a></li>
                </ul>
            </div>
            <div class="flex items-center mt-6 lg:mt-0">
                <div class="relative">
                    <input type="text" class="bg-gray-800 text-sm rounded-full pl-4 px-3 py-1 w-64 focus:outline-none focus:shadow-outline" placeholder="Search...">
                </div>
                <div class="ml-6">
                    <img class="lg:hidden block" src="/images/icons/hamburger.svg" onclick="toggleSidebarVisibility()"/>
                </div>
            </div>
        </nav>
    </header>

    <main class="py-8">
        @yield('content')
    </main>

    <footer class="border-t border-gray-800">
        <div class="container mx-auto px-4 py-6">
            Powered By
            <a target="_blank" href="https://api-docs.igdb.com/#about" class="underline hover:text-gray-400">IGDB API</a>,
            <a target="_blank" href="https://laravel.com/" class="underline hover:text-gray-400">Laravel</a> and
            <a target="_blank" href="https://tailwindcss.com/" class="underline hover:text-gray-400">Tailwind</a>. Inspired by
            <a target="_blank" href="https://laracasts.com/series/build-a-video-game-aggregator/" class="underline hover:text-gray-400">Laracasts</a>
        </div>
    </footer>
    <livewire:scripts />
    <script src="/js/app.js"></script>
    @stack('scripts')
    @include('javascript.sidebar')
</body>
</html>
