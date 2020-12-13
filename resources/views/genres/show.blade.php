@include('javascript.sidebar')

@extends('layouts.app')

@section('content')
    <div class="flex">

        <x-genre-sidebar :genres="$genres" :genre-id="$genreId"/>

        <livewire:genre-games :genre-id="$genreId" :order="$order" :sort="$sort" :limit="$limit" />
    </div>
@endsection
