@include('javascript.sidebar')

@extends('layouts.app')

@section('content')
    <div class="flex">

        <x-platform-sidebar :platforms="$platforms" :platform-id="$platformId" />

        <x-platform-content
            :selected-platform="$selectedPlatform"
            :platform-id="$platformId"
            :sort="$sort"
            :order="$order"
            :limit="$limit"
            :sortOptions="$sortOptions"
            :limitOptions="$limitOptions"
            :orderOptions="$orderOptions"
        />

    </div>
@endsection
