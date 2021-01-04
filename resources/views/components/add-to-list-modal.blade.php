<div id="add-to-list-modal" class="hidden-modal" style="--bg-opacity: 0.90">

    @include('javascript.addToListModal')

    @if (Auth::check())
        <div class="flex h-screen">
            <div class="m-auto w-1/2 flex">
                @if(Auth::user()->lists->isEmpty())
                    <div>
                        <h2 class="font-semibold text-4xl leading-tight mt-1">You can add games to lists</h2>
                        <h3>Create a new list</h3>
                        <form action="{{ route('lists.store', ['user' => Auth::user()]) }}" method="post" class="inline">
                            @csrf
                            <input type="hidden" name="gameId" value="{{ $gameId }}">
                            <input name="name" class="text-input focus:outline-none focus:shadow-outline"
                                   placeholder="New list name">
                            <input
                                    type="submit"
                                    class="button-primary hover:bg-blue-700 mr-2 my-2"
                                    value="Save">
                        </form>
                    </div>
                @else
                    <div>
                        <h2 class="font-semibold text-4xl leading-tight mt-1">Add game to...</h2>
                        @foreach(Auth::user()->lists as $list)
                            <form action="{{ route('listGame.store', ['user' => Auth::user(), 'list' => $list]) }}"
                                  method="post" class="inline">
                                @csrf
                                <input type="hidden" name="gameId" value="{{ $gameId }}">
                                <input type="hidden" name="gameListId" value="{{ $list->id }}">
                                <input
                                        type="submit"
                                        class="button-primary hover:bg-blue-700 mr-2 my-2"
                                        value="{{ $list->name }}">
                            </form>
                        @endforeach

                        <h2 class="font-semibold text-4xl leading-tight mt-1">Or create a new list</h2>
                        <form action="{{ route('lists.store', ['user' => Auth::user()]) }}" method="post" class="inline">
                            @csrf
                            <input type="hidden" name="gameId" value="{{ $gameId }}">
                            <input name="name" class="text-input focus:outline-none focus:shadow-outline"
                                   placeholder="New list name">
                            <input
                                    type="submit"
                                    class="button-primary hover:bg-blue-700 mr-2 my-2"
                                    value="Save">
                        </form>
                    </div>
                @endif

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
                        <a href="{{ route('auth.showLogin') }}" class="underline hover:text-gray-400">Login</a>
                        to create lists
                    </h2>
                </div>

                <div>
                    <span class="text-6xl hover:text-gray-500 absolute" onclick="hideAddToListModal()">&times;</span>
                </div>
            </div>
        </div>
    @endif
</div>
