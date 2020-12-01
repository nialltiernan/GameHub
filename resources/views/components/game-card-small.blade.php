<div class="game mt-4">
    <div class="relative inline-block">
        <a href="{{ route('game.show', ['id' => $game['id']]) }}">
            <img src="{{ $game['url'] }}" class="hover:opacity-75" alt="similar game">
        </a>
    </div>

    <a href="{{ route('game.show', ['id' => $game['id']]) }}" class="block text-base font-semibold leading-tight hover:text-gray-400 mt-1">
        {{ $game['name'] }}
    </a>
</div>
