<div class="game mt-4">
    <div class="relative inline-block">
        <a href="{{ route('game.show', ['id' => $game['id']]) }}">
            <img src="{{ $game['image_url'] }}" class="hover:opacity-75" alt="similar game" style="max-height: 200px">
        </a>
    </div>

    <a href="{{ route('game.show', ['id' => $game['id']]) }}"
       class="block text-base font-semibold leading-tight hover:text-gray-400 mt-1">
        {{ $game['name'] }}
    </a>

    @if ($game['platforms'])
        <x-platform-links :platforms="$game['platforms']"/>
    @endif
</div>
