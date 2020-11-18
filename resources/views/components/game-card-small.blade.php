<div class="game mt-8">
    <div class="relative inline-block">
        <a href="{{ route('game.show', ['id' => $game['id']]) }}">
            <img src="{{ $game['url'] }}" class="hover:opacity-75 transition ease-in-out duration-150" alt="similar game">
        </a>

        @if ($game['rating'])
            <div id="{{$game['slug']}}" class="absolute bottom-0 right-0 w-16 h-16 bg-gray-800 rounded-full" style="right: -20px; bottom: -20px">
                @push('scripts')
                    @include('javascript.rating', [
                        'slug' => $game['slug'],
                        'rating' => $game['rating'],
                        'event' => null
                    ])
                @endpush
            </div>
        @endif
    </div>

    <a href="{{ route('game.show', ['id' => $game['id']]) }}" class="block text-base font-semibold leading-tight hover:text-gray-400 mt-8">
        {{ $game['name'] }}
    </a>

    @if ($game['platforms'])
        <x-platform-links :platforms="$game['platforms']"/>
    @endif
</div>
