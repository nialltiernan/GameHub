<div class="game mt-8">

    <div class="relative inline-block">
        <a href="{{ route('game.show',['id' => $game['id']]) }}">
            <img src="{{ $game['coverImageUrl'] }}" alt="game cover" class="hover:opacity-75">
        </a>

        <div class="absolute bottom-0 right-0 w-16 h-16 bg-gray-800 rounded-full" style="right:-20px; bottom:-20px">
            <div class="font-semibold text-xs flex justify-center items-center h-full">
                {{ $game['rating'] }}
            </div>
        </div>
    </div>

    <a href="{{ route('game.show',['id' => $game['id']]) }}" class="block text-base font-semibold leading-tight hover:text-gray-400 mt-4">
        {{ $game['name'] }}
    </a>

    <div class="text-gray-400 mt-1">
        {{ $game['platforms'] }}
    </div>
</div>
