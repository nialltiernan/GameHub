@include('javascript.sidebar')

@extends('layouts.app')

@section('content')
    <div class="flex">

        <x-genre-sidebar :genres="$genres" :genre-id="$genreId"/>
        <div class="flex-1 pl-8">

            <x-genre-content-top
                :title="$title"
                :genre-id="$genreId"
                :limitOptions="$limitOptions"
                :limit="$limit"
                :orderOptions="$orderOptions"
                :order="$order"
                :sortOptions="$sortOptions"
                :sort="$sort"
            />

            <livewire:genre-games :genre-id="$genreId" :order="$order" :sort="$sort" :limit="$limit" />
        </div>
    </div>
@endsection
