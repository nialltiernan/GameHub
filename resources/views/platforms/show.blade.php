@extends('layouts.app')

@section('content')
    <h2>{{ $selectedPlatform }}</h2>
    <div class="flex">

        <div id="sidebar" class="px-6">
            <ul>
                @foreach($platforms as $id => $platform)
                    <li><a href="{{ route('platforms.show', ['id' => $id]) }}">{{ $platform }}</a></li>
                @endforeach
            </ul>
        </div>
        <div class="flex-1">
            <div class="popular-games text-sm grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 xl:grid-cols-6 gap-12 border-b border-gray-800 pb-16">
                @forelse($games as $game)
                    <x-game-card :game="$game" />
                @empty
                    @foreach(range(1,12) as $game)
                        <x-game-card-loading />
                    @endforeach
                @endforelse
            </div>
        </div>
    </div> {{--end container--}}
@endsection
