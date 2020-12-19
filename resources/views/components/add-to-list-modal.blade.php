<div id="add-to-list-modal" class="hidden fixed z-10 left-0 top-0 w-full h-full overflow-auto bg-gray-800 bg-opacity-75">

    @include('javascript.addToListModal')

    <div class="w-1/2 m-auto">
        <h2 class="font-semibold text-4xl leading-tight mt-1">Pick a list</h2>
        @foreach(Auth::user()->lists as $list)
            <form action="{{ route('listGame.store', ['user' => Auth::user(), 'list' => $list]) }}" method="post">
                @csrf
                <input type="hidden" name="gameId" value="{{ $gameId }}">
                <input type="hidden" name="gameListId" value="{{ $list->id }}">
                <input
                        type="submit"
                        class="bg-blue-500 text-white font-semibold px-2 py-2 hover:bg-blue-600 rounded"
                        value="{{ $list->name }}">
            </form>
        @endforeach

        <span class="text-6xl hover:text-gray-500 absolute" onclick="hideAddToListModal()">&times;</span>
    </div>
</div>
