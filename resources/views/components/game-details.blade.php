<div class="game-details border-b border-gray-800 pb-12 flex flex-col lg:flex-row">
    <div class="xl:mr-64">
        <h2 class="font-semibold text-4xl leading-tight mt-1">
            @isset($game['website'])
                <a href="{{ $game['website'] }}" target="_blank" class="hover:text-gray-400">{{ $game['name'] }}</a>
            @else
                {{ $game['name'] }}
            @endisset
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

            <div class="flex items-center space-x-4 mt-4 sm:mt-0 sm:ml-6">
                @foreach($game['social_links'] as $category => $link)
                    <a href="{{ $link }}" target="_blank">
                        <img class="h-8 transform hover:scale-150" src="/images/icons/{{ $category }}.svg" alt="{{ $category }}">
                    </a>
                @endforeach
            </div>

            <p class="mt-12">{{ $game['description_raw'] }}</p>

            @if ($game['youtube_link'])
                <div class="mt-12">
                    <a
                        href="{{ $game['youtube_link'] }}"
                        class="inline-flex bg-blue-500 text-white font-semibold px-4 py-4 hover:bg-blue-600 rounded transition ease-in-out duration-150"
                        target="_blank"
                    >
                        <span>Play Video</span>
                    </a>
                </div>
            @endif
        </div>
    </div>
</div>
