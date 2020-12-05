@include('javascript.sidebar')

@extends('layouts.app')

@section('content')
    <div class="flex">

        <x-platform-sidebar :platforms="$platforms" :platform-id="$platformId" />

        <div class="flex-1 pl-8">
            <x-platform-content-top
                :title="$title"
                :platformId="$platformId"
                :limitOptions="$limitOptions"
                :limit="$limit"
                :orderOptions="$orderOptions"
                :order="$order"
            />

            <livewire:platform-games :platformId="$platformId" :order="$order" :limit="$limit"/>
        </div>
    </div>
@endsection
