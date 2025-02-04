<div class="relative mr-5 my-3 lg:my-0">
    <input
        wire:model.debounce.300ms="search"
        type="text"
        class="text-input focus:outline-none focus:shadow-outline rounded-2xl"
        placeholder="Search..."
    >

    <div class="absolute z-50 bg-gray-800 text-xs rounded w-64 mt-2">
        <ul>
            @forelse($searchResults as $game)
                <li class="border-b border-gray-700">
                    <a href="{{ route('game.show', ['id' => $game['id']]) }}"
                       class="block hover:bg-gray-700 px-3 py-3 flex items-center transition ease-in-out duration-150">
                        @isset($game['image_url'])
                            <img class="w-10" src="{{ $game['image_url'] }}">
                        @endisset
                        <span class="ml-4">{{ $game['name'] }}</span>
                    </a>
                </li>
            @empty
                @if($search)
                    <li>
                        <span class="block hover:bg-gray-700 px-3 py-3 flex items-center transition ease-in-out duration-150">
                            No search results found
                        </span>
                    </li>
                @endif
            @endforelse
        </ul>
    </div>
</div>
