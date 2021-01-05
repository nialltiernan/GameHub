@include('javascript.sidebar')

@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-4">

        @push('scripts')
            @include('javascript.achievementsModal')
        @endpush

        <x-achievement-modal />

        <div class="flex justify-between">
            <h1>All Achievements</h1>
            <a href="{{ route('game.show', ['id' => $gameId]) }}" class="button-primary hover:bg-blue-700 mr-4">Back</a>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 mt-8">
            @forelse($achievements as $achievement)
                <x-achievement :achievement="$achievement" />
            @empty
                <div>
                    No achievements found
                </div>
            @endforelse
        </div>
    </div>
@endsection
