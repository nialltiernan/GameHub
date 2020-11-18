<div class="game-details border-b border-gray-800 pb-12 flex flex-col lg:flex-row">
    <div class="flex-none">
        @if (isset($game['social_links']['home']))
            <a href="{{ $game['social_links']['home'] }}" target="_blank">
                <img src="{{ $game['coverImageUrl'] }}" alt="cover">
            </a>
        @else
            <img src="{{ $game['coverImageUrl'] }}" alt="cover">
        @endif
    </div>

    <div class="lg:ml-12 xl:mr-64">
        <h2 class="font-semibold text-4xl leading-tight mt-1">
            @if (isset($game['social_links']['home']))
                <a href="{{ $game['social_links']['home'] }}" target="_blank">{{ $game['name'] }}</a>
            @else
                {{ $game['name'] }}
            @endif
        </h2>
        <div class="text-gray-400">
            <span>{{ $game['genres'] }}</span>
            &middot;
            <span>{{ $game['publisher'] }}</span>
            &middot;
            <span>
                @foreach($game['platforms'] as $id => $abbreviation)
                    <a href="{{ route('platforms.show', ['id' => $id]) }}" class="hover:text-blue-600">
                        {{ $abbreviation }}@if(!$loop->last),@endif
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

            <div class="flex items-center space-x-4 mt-4 sm:mt-0 sm:ml-6">
                @foreach($game['social_links'] as $category => $link)
                    @if ($category === 'home')
                        @continue
                    @endif
                    <a href="{{ $link }}" target="_blank">
                        <img class="h-8 transform hover:scale-150" src="/images/icons/{{ $category }}.svg" alt="{{ $category }}">
                    </a>
                @endforeach
            </div>

            <p class="mt-12">{{ $game['summary'] }}</p>

            @if (isset($game['videos'][0]['video_id']))
                <div class="mt-12">
                    <a href="https://www.youtube.com/watch?v={{ $game['videos'][0]['video_id'] }}" class="inline-flex bg-blue-500 text-white font-semibold px-4 py-4 hover:bg-blue-600 rounded transition ease-in-out duration-150">
                        <span>Play Trailer</span>
                    </a>
                </div>
            @endif
        </div>
    </div>
</div>
