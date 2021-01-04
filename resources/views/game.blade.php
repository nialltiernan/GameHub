@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-4 relative">

        <x-game-notifications />

        <x-add-to-list-modal :game-id="$game['id']"/>

        <x-game-details :game="$game" />

        <livewire:screenshots :game-id="$game['id']"/>

        <livewire:comments :game-id="$game['id']"/>

        <livewire:similar-games :game-id="$game['id']" />
    </div>
@endsection
