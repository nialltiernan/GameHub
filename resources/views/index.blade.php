@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-4">

        @if (session('loggedIn'))
            <div>{{ session('loggedIn') }}</div>
        @elseif(session('loggedOut'))
            <div>{{ session('loggedOut') }}</div>
        @elseif(session('feedbackReceived'))
            <div>{{ session('feedbackReceived') }}</div>
        @endif

        <h1>Most loved games this year</h1>
        <livewire:home-page-games/>
    </div>
@endsection
