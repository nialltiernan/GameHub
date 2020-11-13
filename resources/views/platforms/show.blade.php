@include('javascript.sidebar')

@extends('layouts.app')

@section('content')
    <div class="flex">
        <div id="sidebar" class="px-8 pt-4 bg-gray-800 rounded hidden lg:block">
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

        <div class="flex flex-col justify-around hidden lg:inline-flex">
            <button id="hideSideBarButton" onclick="toggleSidebarVisibility()" class="bg-blue-500 text-lg px-1 py-1 rounded-full">{{'<'}}</button>
            <button id="showSideBarButton" onclick="toggleSidebarVisibility()" class="bg-blue-500 text-lg px-1 py-1 rounded-full hidden">{{'>'}}</button>
        </div>

        <div class="flex-1 pl-8">
            <h2 class="text-blue-500 uppercase tracking-wide font-semibold">Highest critically rated games of {{ $selectedPlatform }}</h2>
            <livewire:platform-games :platformId="$platformId"></livewire:platform-games>
        </div>
    </div> {{--end container--}}
@endsection
