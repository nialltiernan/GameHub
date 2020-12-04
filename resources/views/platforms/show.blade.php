@include('javascript.sidebar')

@extends('layouts.app')

@section('content')
    <div class="flex">

        <x-platform-sidebar :platforms="$platforms" :platform-id="$platformId" />

        <div class="flex-1 pl-8">
            <div class="flex justify-between">
                <h2 class="text-blue-500 uppercase tracking-wide font-semibold">
                    {{ $title }}
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

                <img class="lg:hidden block mr-10" src="/images/icons/hamburger.svg" onclick="toggleSidebarVisibility()"/>
            </div>

            <livewire:platform-games :platformId="$platformId" :order="$order" :limit="$limit"/>
        </div>

    </div>
@endsection
