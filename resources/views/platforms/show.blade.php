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
            <div class="flex justify-between">
                <h2 class="text-blue-500 uppercase tracking-wide font-semibold">
                    @if ($sort === 'rating' && $order === 'desc')
                        Most loved games of {{ $selectedPlatform }}
                    @elseif ($sort === 'rating' && $order === 'asc')
                        Least loved games of {{ $selectedPlatform }}
                    @elseif($sort === 'aggregated_rating' && $order === 'desc')
                        Highest critically rated games of {{ $selectedPlatform }}
                    @elseif($sort === 'aggregated_rating' && $order === 'asc')
                        Lowest critically rated games of {{ $selectedPlatform }}
                    @endif
                </h2>
                <form method="get" action="{{ route('platforms.show', ['id' => $platformId]) }}" onchange="this.submit()">
                    <label class="pr-2">
                        Results per page
                        <select name="limit" class="text-blue-500 rounded">
                            @foreach($limitOptions as $option)
                                @if ($option === (int) $limit)
                                    <option selected>{{ $option }}</option>
                                @else
                                    <option>{{ $option }}</option>
                                @endif
                            @endforeach
                        </select>
                    </label>

                    <label class="pr-2">
                        Sort by
                        <select name="sort" class="text-blue-500 rounded">
                            @foreach($sortOptions as $value => $name)
                                @if ($value === $sort)
                                    <option value="{{ $value }}" selected>{{ $name }}</option>
                                @else
                                    <option value="{{ $value }}">{{ $name }}</option>
                                @endif
                            @endforeach
                        </select>
                    </label>

                    <label class="pr-8">
                        Order
                        <select name="order" class="text-blue-500 rounded">
                            @foreach($orderOptions as $value => $name)
                                @if ($value === $order)
                                    <option value="{{ $value }}" selected>{{ $name }}</option>
                                @else
                                    <option value="{{ $value }}">{{ $name }}</option>
                                @endif
                            @endforeach
                        </select>
                    </label>
                </form>
            </div>


            <livewire:platform-games :platformId="$platformId" :sort="$sort" :order="$order" :limit="$limit"></livewire:platform-games>
        </div>
    </div>
@endsection
