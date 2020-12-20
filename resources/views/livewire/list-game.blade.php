<div wire:init="loadGames">
    @isset($game['id'])
        <div class="relative inline-block">
            <a href="{{ route('game.show',['id' => $game['id']]) }}">
                <img src="{{ $game['image_url'] }}" alt="game cover"
                     class="hover:opacity-75 transition ease-in-out duration-150">
            </a>

            <div class="absolute bottom-0 right-0 w-16 h-16" style="right:-20px; bottom:-20px">
                <form action="{{ route('listGame.destroy', ['user' => Auth::user(), 'list' => $list, 'listGame' => $listGameId]) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <input
                        type="image"
                        name="submit"
                        src="/images/icons/minus.svg"
                        class="px-2 py-2 h-12 transform hover:scale-150"
                        >
                </form>
            </div>
        </div>
        <a href="{{ route('game.show',['id' => $game['id']]) }}" class="block text-base font-semibold leading-tight hover:text-gray-400 mt-1">
            {{ $game['name'] }}
        </a>
    @endif
</div>
