@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-8 flex flex-wrap justify-center">
        @foreach($platforms as $id => $platform)
            <a class="index-grid hover:text-blue-600 sm:w-1/2 md:w-1/3 lg:w-1/4 xl:w-1/6"
               href="{{ route('platforms.show', ['id' => $id]) }}">
                {{ $platform }}
            </a>
        @endforeach
    </div>
@endsection
