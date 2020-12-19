<div wire:init="loadGames">
    @if($game)
        <img src="{{ $game['image_url'] }}" alt="game cover" class="hover:opacity-75 transition ease-in-out duration-150">

        <a href="{{ route('game.show',['id' => $game['id']]) }}">{{ $game['name'] }}</a>

        <form action="{{ route('listGame.destroy', ['user' => Auth::user(), 'list' => $list, 'listGame' => $listGameId]) }}" method="post">
                @csrf
                @method('DELETE')
                <input
                        type="submit"
                        class="bg-red-500 text-white font-semibold px-2 py-2 hover:bg-red-600 rounded"
                        value="-">
        </form>
    @endif
</div>
