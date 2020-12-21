<div class="game-details border-b border-gray-800 pb-12 flex flex-col lg:flex-row">
    <x-add-to-list-modal :game-id="$game['id']"/>

    <div>
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
        <div class="flex flex-wrap items-center mt-8">
            <div class="flex items-center">
                @if ($game['rating'])
                    <div id="ratingDiv" class="w-16 h-16 bg-gray-800 rounded-full relative text-sm">
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

            <div class="flex items-center space-x-4 ml-4">
                @foreach($game['social_links'] as $category => $link)
                    <a href="{{ $link }}" target="_blank">
                        <img class="h-10 transform hover:scale-150" src="/images/icons/{{ $category }}.svg" alt="{{ $category }}">
                    </a>
                @endforeach
                    <form onsubmit="return false">
                        <input
                            title="Add to list"
                            type="image"
                            src="/images/icons/plus.svg"
                            onclick="showAddToListModal()"
                            class="h-8 transform hover:scale-150"
                        >
                    </form>
                    <livewire:franchise-link :game="$game['name']"/>
            </div>

            @push('scripts')
                @include('javascript.descriptionShowMore')
            @endpush
            <div>
                <div id="descriptionPreview">
                    <p class="mt-12">{{ $game['description']['preview'] }}
                        <span
                            class="bg-blue-500 text-white font-semibold px-1 hover:bg-blue-600 rounded"
                            onclick="descriptionShowFull()">Show more
                        </span>
                    </p>
                </div>

                <div id="descriptionFull" class="hidden">
                    <p class="mt-12">{{ $game['description']['full'] }}
                        <span
                            class="bg-blue-500 text-white font-semibold px-1 hover:bg-blue-600 rounded"
                            onclick="descriptionShowPreview()">Show less
                        </span>
                    </p>
                </div>
            </div>

        </div>
    </div>
</div>
