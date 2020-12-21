<div class="game-details border-b border-gray-800 pb-12">
    <x-add-to-list-modal :game-id="$game['id']"/>

    <div class="flex lg:flex-row justify-between flex-wrap">
        <div class="mb-2">
            <h2 class="font-semibold text-4xl leading-tight mt-1">
                @if(isset($game['website']) && $game['website'])
                    <a href="{{ $game['website'] }}" target="_blank" class="hover:text-gray-400">{{ $game['name'] }}</a>
                @else
                    {{ $game['name'] }}
                @endif
            </h2>
            <div class="text-gray-400">

            <span>
                @foreach($game['genres'] as $genreId => $genre)
                    <a href="{{ route('genres.show', ['id' => $genreId]) }}" class="hover:text-blue-600">
                        {{ $genre }}@if (!$loop->last),@endif
                     </a>
                @endforeach
            </span>

                @if($game['publisher'])
                &middot; <span>{{ $game['publisher'] }}</span> &middot;
                @endisset

                @if($game['released'])
                    <span>{{ $game['released'] }}</span> &middot;
                @endisset

                <span>
                @foreach($game['platforms'] as $platformId => $platform)
                        <a href="{{ route('platforms.show', ['id' => $platformId]) }}" class="hover:text-blue-600">
                        {{ $platform }}@if (!$loop->last),@endif
                    </a>
                    @endforeach
            </span>
            </div>
        </div>

        <div>
            <div class="flex items-center mt-8 lg:mt-0 lg:flex-row-reverse">

                <div class="flex items-center">
                    @if ($game['rating'])
                        <div id="ratingDiv" class="w-16 h-16 bg-gray-800 rounded-full relative text-sm mr-4 lg:ml-4">
                            @push('scripts')
                                @include('javascript.rating', [
                                    'slug' => 'ratingDiv',
                                    'rating' => $game['rating'],
                                    'event' => null
                                ])
                            @endpush
                        </div>
                    @endif
                </div>

                <div class="flex items-center space-x-4">
                    <livewire:franchise-link :game="$game['name']"/>

                    <form onsubmit="return false">
                        <input
                            title="Add to list"
                            type="image"
                            src="/images/icons/plus.svg"
                            onclick="showAddToListModal()"
                            class="h-8 transform hover:scale-150">
                    </form>

                    @foreach($game['social_links'] as $category => $link)
                        <a href="{{ $link }}" target="_blank">
                            <img class="h-10 transform hover:scale-150" src="/images/icons/{{ $category }}.svg" alt="{{ $category }}">
                        </a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <x-game-description :preview="$game['description']['preview']" :full="$game['description']['full']" />

</div>
