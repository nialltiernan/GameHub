<div>
    <div class="relative inline-block">
        <a href="{{ route('game.show',['id' => $game['id']]) }}">
            <img src="{{ $game['image_url'] }}" alt="game cover" class="hover:opacity-75 transition ease-in-out duration-150">
        </a>

        @if ($game['rating'])
            <div  class="absolute bottom-0 right-0 w-16 h-16 bg-gray-800 rounded-full" style="right:-20px; bottom:-20px">
                <div id="{{ $game['slug'] }}" class="font-semibold text-xs flex justify-center items-center h-full"></div>
            </div>
        @endif
    </div>

    <a href="{{ route('game.show',['id' => $game['id']]) }}" class="block text-base font-semibold leading-tight hover:text-gray-400 mt-4">
        {{ $game['name'] }}
    </a>

    @if ($game['platforms'])
        <x-platform-links :platforms="$game['platforms']"/>
    @endif
</div>
