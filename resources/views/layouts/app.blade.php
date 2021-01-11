<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="video games playstation xbox pc screenshots">
    @inject('titleFactory', '\App\Services\Html\TitleFactory')
    <title>{{ $titleFactory->create() }}</title>
    <link rel="stylesheet" href="/css/app.css">
    <livewire:styles/>
</head>
<body class="bg-gray-900 text-white">
<header class="border-b border-gray-800">
    <nav class="container mx-auto flex flex-col lg:flex-row  items-center justify-between px-4 py-3 md:py-4">
        <div class="flex flex-col lg:flex-row items-center">
            <ul class="flex ml-0 space-x-8">
                <li><a href="/" class="hover:text-gray-400">Home</a></li>
                <li><a href="{{ route('platforms.index') }}" class="hover:text-gray-400">Platforms</a></li>
                <li><a href="{{ route('genres.index') }}" class="hover:text-gray-400">Genres</a></li>
            </ul>
        </div>
        <div class="flex flex-col lg:flex-row items-center">
            <livewire:search-dropdown/>

            <div class="flex">
                @if (Auth::check())
                    @if (Auth::user()->is_admin)
                        <a href="{{ route('feedback.index') }}" class="mr-5 hover:text-gray-400">Feedback</a>
                        <a href="{{ route('banners.index') }}" class="mr-5 hover:text-gray-400">Banners</a>
                    @endif
                    <a href="{{ route('account.index') }}" class="mr-5 hover:text-gray-400">Account</a>
                    <a href="{{ route('lists.index', ['user' => Auth::user()]) }}" class="mr-5 hover:text-gray-400">Lists</a>
                    <a href="{{ route('auth.logout') }}" class="mr-5 hover:text-gray-400">Logout</a>
                @else
                    <a href="{{ route('auth.showLogin') }}" class="mr-1 hover:text-gray-400">Login</a>
                    <span> / </span>
                    <a href="{{ route('auth.showRegister') }}" class="ml-1 hover:text-gray-400">Register</a>
                @endif
            </div>
        </div>
    </nav>
</header>

{{--    <div class="block md:hidden">Tailwind all</div>--}}
{{--    <div class="hidden md:block lg:hidden">Tailwind medium</div>--}}
{{--    <div class="hidden lg:block 2xl:hidden">Tailwind large</div>--}}
{{--    <div class="hidden 2xl:block">Tailwind large 2x</div>--}}

<main class="py-8">
    @yield('content')
</main>

<footer class="border-t border-gray-800">
    <div class="container mx-auto px-4 py-6 text-sm">
        Content provided by <a target="_blank" href="https://rawg.io/apidocs" class="underline hover:text-gray-400">RAWG API</a>.
        Inspired by <a target="_blank" href="https://laracasts.com/series/build-a-video-game-aggregator/" class="underline hover:text-gray-400">Laracasts</a>.
        Icons made by <a target="_blank" href="https://www.flaticon.com/authors/iconixar" title="iconixar" class="underline hover:text-gray-400">iconixar</a>,
        <a href="http://www.freepik.com/" title="Freepik" class="underline hover:text-gray-400">Freepik</a>
        and <a href="https://www.flaticon.com/authors/pixel-perfect" title="Pixel perfect" class="underline hover:text-gray-400">Pixel perfect</a>
        from <a target="_blank" href="https://www.flaticon.com/" title="Flaticon" class="underline hover:text-gray-400">flaticon</a>.
        Feedback welcome <a href="{{ route('feedback.create') }}" class="underline hover:text-gray-400">here</a>!
    </div>
</footer>
<livewire:scripts/>
<script src="/js/app.js"></script>
@stack('scripts')
@include('javascript.imageEasterEgg')
</body>
</html>
