@extends('layouts.app')

@section('content')
    <div>
        <ul>
            @foreach($platforms as $id => $platform)
                <li><a href="{{ route('platforms.show', ['id' => $id]) }}">{{ $platform }}</a></li>
            @endforeach
        </ul>
    </div> {{--end container--}}
@endsection
