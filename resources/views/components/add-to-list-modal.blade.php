<div id="add-to-list-modal" class="hidden fixed z-10 left-0 top-0 w-full h-full overflow-auto bg-gray-800" style="--bg-opacity: 0.90">

    @include('javascript.addToListModal')

    @if (Auth::check())
        <div class="flex h-screen">
            <div class="m-auto w-1/2 flex">
                <div>
                    <h2 class="font-semibold text-4xl leading-tight mt-1">Add game to...</h2>
                    @foreach(Auth::user()->lists as $list)
                        <form action="{{ route('listGame.store', ['user' => Auth::user(), 'list' => $list]) }}" method="post" class="inline">
                            @csrf
                            <input type="hidden" name="gameId" value="{{ $gameId }}">
                            <input type="hidden" name="gameListId" value="{{ $list->id }}">
                            <input
                                type="submit"
                                class="bg-blue-500 text-white font-semibold px-2 py-2 hover:bg-blue-600 rounded mr-2 my-2"
                                value="{{ $list->name }}">
                        </form>
                    @endforeach

                    <h2 class="font-semibold text-4xl leading-tight mt-1">Or create a new list</h2>
                    <form action="{{ route('lists.store', ['user' => Auth::user()]) }}" method="post" class="inline">
                        @csrf
                        <input type="hidden" name="gameId" value="{{ $gameId }}">
                        <input name="name" class="text-black" placeholder=" New list name">
                        <input
                            type="submit"
                            class="bg-blue-500 text-white font-semibold px-2 py-2 hover:bg-blue-600 rounded mr-2 my-2"
                            value="Save">
                    </form>
                </div>

                <div>
                    <span class="text-6xl hover:text-gray-500 absolute" onclick="hideAddToListModal()">&times;</span>
                </div>
            </div>
        </div>
    @else
        <div class="flex h-screen">
            <div class="m-auto w-1/2 flex flex-col">
                <div>
                    <h2 class="font-semibold text-4xl m-auto align-middle">
                        <a href="{{ route('auth.showLogin') }}" class="underline hover:text-gray-400">Login</a> or
                        <a href="{{ route('auth.showRegister') }}" class="underline hover:text-gray-400">register</a> to create lists
                    </h2>
                </div>

                <div>
                    <span class="text-6xl hover:text-gray-500 absolute" onclick="hideAddToListModal()">&times;</span>
                </div>
            </div>
        </div>
    @endif
</div>
