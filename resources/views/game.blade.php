@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-4">
        <x-game-details :game="$game"></x-game-details>

        <livewire:game-screenshots :game-id="$game['id']"/>

        <livewire:similar-games :game-id="$game['id']" />
    </div>
@endsection
