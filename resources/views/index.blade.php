@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-4">

        @if (session('loggedIn'))
            <div>{{ session('loggedIn') }}</div>
        @elseif(session('loggedOut'))
            <div>{{ session('loggedOut') }}</div>
        @endif

        <h2 class="text-blue-500 uppercase tracking-wide font-semibold">Most loved games this year</h2>
        <livewire:home-page-games/>
    </div>
@endsection
