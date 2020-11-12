@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-8 flex flex-wrap">
        @foreach($platforms as $id => $platform)
            <div class="w-full sm:w-1/2 md:w-1/3 lg:w-1/4 xl:w-1/6 mb-4 bg-gray-500 mr-4 pl-4 py-4 text-lg rounded">
                <a
                    class="hover:text-blue-600 transform"
                    href="{{ route('platforms.show', ['id' => $id]) }}">
                    {{ $platform }}
                </a>
            </div>
        @endforeach
    </div>
@endsection
