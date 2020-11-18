@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-8 flex flex-wrap">
        @foreach($platforms as $id => $platform)
                <a class="
                        bg-gray-500 mr-4 pl-4 py-4 text-lg rounded
                        transform hover:text-blue-600
                        w-full sm:w-1/2 md:w-1/3 lg:w-1/4 xl:w-1/6 mb-4"
                    href="{{ route('platforms.show', ['id' => $id]) }}"
                >
                    {{ $platform }}
                </a>
        @endforeach
    </div>
@endsection
