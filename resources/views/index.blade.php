@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-3 relative">

        <x-home-page-notifications />

        <h1>Most loved games this year</h1>

        <livewire:home-page-games/>

    </div>
@endsection
