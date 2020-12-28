@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-8 flex flex-wrap justify-center">
        @foreach($genres as $id => $genre)
            <a class="index-grid hover:text-blue-600 sm:w-1/2 md:w-1/3 lg:w-1/4 xl:w-1/6" href="{{ route('genres.show', ['id' => $id]) }}">
                {{ $genre }}
            </a>
        @endforeach
    </div>
@endsection
