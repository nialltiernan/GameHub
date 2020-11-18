@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-4">
        <x-game-details :game="$game"></x-game-details>

        <x-game-screenshots :game="$game"></x-game-screenshots>

        <x-similar-games :game="$game"></x-similar-games>
    </div>
@endsection
