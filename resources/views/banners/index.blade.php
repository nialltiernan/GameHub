@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-4 relative">

        <h1>Active Banners</h1>

        @foreach($banners as $banner)
            <div class="mb-8 flex">
                <a href="{{ $banner->url }}" target="_blank">
                    <img src="{{ $banner->image['url'] }}">
                </a>
                <span class="ml-6">
                    Banner ID: {{ $banner->id }}<br>
                    {{ \App\Enums\BannerShapes::getShapeName($banner->image['shape']) }}<br>
                    Height: {{ $banner->image['height'] }}, Width: {{ $banner->image['width'] }}
                </span>
            </div>
        @endforeach
    </div>
@endsection
