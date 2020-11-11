@extends('layouts.app')

@section('content')
    <div class="flex">
        <div id="sidebar" class="px-8">
            <ul>
                @foreach($platforms as $id => $platform)
                    <li @if($id === $platformId)
                            class="text-blue-600 transform translate-x-5"
                        @else
                            class="hover:text-blue-600 transform hover:translate-x-5"
                        @endif>
                        <a href="{{ route('platforms.show', ['id' => $id]) }}">{{ $platform }}</a>
                    </li>
                @endforeach
            </ul>
        </div>

        <div class="flex-1">
            <h2 class="text-blue-500 uppercase tracking-wide font-semibold">Highest critically rated games of {{ $selectedPlatform }}</h2>
            <div class="popular-games text-sm grid grid-cols-1 md:grid-cols-3 lg:grid-cols-5 xl:grid-cols-6 gap-12 border-b border-gray-800 pb-16 pr-8">
                @forelse($games as $game)
                    <div class="game mt-8">
                        <div class="relative inline-block">
                            <a href="{{ route('game.show',['id' => $game['id']]) }}">
                                <img src="{{ $game['coverImageUrl'] }}" alt="game cover" class="hover:opacity-75">
                            </a>

                            @if (isset($game['aggregated_rating']))
                                <div  class="absolute bottom-0 right-0 w-16 h-16 bg-gray-800 rounded-full" style="right:-20px; bottom:-20px">
                                    <div class="font-semibold text-xs flex justify-center items-center h-full">
                                        {{ $game['aggregated_rating'] }}
                                    </div>
                                </div>
                            @endif
                        </div>

                        <a href="{{ route('game.show',['id' => $game['id']]) }}" class="block text-base font-semibold leading-tight hover:text-gray-400 mt-4">
                            {{ $game['name'] }}
                        </a>

                        @if($game['platforms'] !== '')
                            <div class="text-gray-400 mt-1">
                                {{ $game['platforms'] }}
                            </div>
                        @endif
                    </div>
                @empty
                    @foreach(range(1,12) as $game)
                        <x-game-card-loading />
                    @endforeach
                @endforelse
            </div>
        </div>
    </div> {{--end container--}}
@endsection
