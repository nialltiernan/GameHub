@include('javascript.sidebar')

@extends('layouts.app')

@section('content')
    <div class="flex">

        <x-genre-sidebar :genres="$genres" :genre-id="$genreId"/>


    </div>
@endsection
