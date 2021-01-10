@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-4 relative">

        @push('scripts')
            @include('javascript.achievementsModal')
            @include('javascript.screenshotsModal')
        @endpush

        <x-game-notifications />

        <x-add-to-list-modal :game-id="$game['id']"/>

        <x-game-details :game="$game" />

        <x-screenshot-modal />
        <livewire:screenshots :game-id="$game['id']"/>

        <x-achievement-modal />
        <livewire:achievements :game-id="$game['id']"/>

        <livewire:comments :game-id="$game['id']"/>

        <livewire:similar-games :game-id="$game['id']" />

        <livewire:game-banner-desktop :title="$game['name']"/>
    </div>
@endsection
