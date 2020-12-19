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

            @if($game['genres'])
                <span>{{ $game['genres'] }}</span> &middot;
            @endisset

            @if($game['publisher'])
                <span>{{ $game['publisher'] }}</span> &middot;
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
                    @if (Auth::check())
                        <img class="h-8 transform hover:scale-150" src="/images/icons/plus.svg" alt="addToList" onclick="showAddToListModal()">
                    @endif
                    <livewire:franchise-link :game="$game['name']"/>
            </div>

            <p class="mt-12">{{ $game['description_raw'] }}</p>
        </div>
    </div>
</div>
