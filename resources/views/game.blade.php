@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-4">
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
                    <span>{{ $game['platforms'] }}</span>
                </div>

                <div class="flex flex-wrap items-center mt-8">
                    <div class="flex items-center">
                        @if ($game['rating'])
                            <div id="ratingDiv" class="w-16 h-16 bg-gray-800 rounded-full relative text-sm">
                                @push('scripts')
                                    @include('partials._rating', [
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

    <div class="images-container border-b border-gray-800 pb-12 mt-8">
            <h2 class="text-blue-500 uppercase tracking-wide font-semibold">Screenshots</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-12 mt-8">
                @forelse($game['screenshots'] as $screenshot)
                    <div>
                        <a href="{{ $screenshot['url'] }}">
                            <img src="{{ $screenshot['url'] }}" class="hover:opacity-75 transition ease-in-out duration-150" alt="screenshot">
                        </a>
                    </div>
                @empty
                    No screenshots available <p style="font-size:20px">&#129335;</p>
                @endforelse
            </div>
        </div>

    <div class="similar-games-container mt-8">
        <h2 class="text-blue-500 uppercase tracking-wide font-semibold">Similar Games</h2>
        <div class="similar-games text-sm grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 xl:grid-cols-6 gap-12">
            @foreach($game['similar_games'] as $similarGame)
                <div class="game mt-8">
                <div class="relative inline-block">
                    <a href="{{ route('game.show', ['id' => $similarGame['id']]) }}">
                        <img src="{{ $similarGame['url'] }}" class="hover:opacity-75 transition ease-in-out duration-150" alt="similar game">
                    </a>
                    @if ($similarGame['rating'])
                        <div id="{{$similarGame['slug']}}" class="absolute bottom-0 right-0 w-16 h-16 bg-gray-800 rounded-full" style="right: -20px; bottom: -20px">
                            @push('scripts')
                                @include('partials._rating', [
                                    'slug' => $similarGame['slug'],
                                    'rating' => $similarGame['rating'],
                                    'event' => null
                                ])
                            @endpush
                        </div>
                    @endif
                </div>
                <a href="{{ route('game.show', ['id' => $similarGame['id']]) }}" class="block text-base font-semibold leading-tight hover:text-gray-400 mt-8">
                    {{ $similarGame['name'] }}
                </a>
                <div class="text-gray-400 mt-1">{{ $similarGame['platforms'] }}</div>
            </div>
            @endforeach
        </div>

    </div>
@endsection
