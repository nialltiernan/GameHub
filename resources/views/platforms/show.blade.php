@extends('layouts.app')

@section('content')
    <div class="flex">
        <div id="sidebar" class="px-8 pt-4 bg-gray-800 rounded">
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

        <div class="flex-1 pl-8">
            <h2 class="text-blue-500 uppercase tracking-wide font-semibold">Highest critically rated games of {{ $selectedPlatform }}</h2>
            <livewire:platform-games :platformId="$platformId"></livewire:platform-games>
        </div>
    </div> {{--end container--}}
@endsection
