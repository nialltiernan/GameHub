@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-4">
{{--        {{dd($game)}}--}}
        <h2 class="text-blue-500 uppercase tracking-wide font-semibold">{{ $game['name'] }}</h2>
        <img src="{{ $game['coverImageUrl'] }}">
    </div>
@endsection
