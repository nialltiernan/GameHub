@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-8">

        @if (session('listCreated'))
            <div>{{ session('listCreated') }}</div>
        @elseif (session('listDeleted'))
            <div>{{ session('listDeleted') }}</div>
        @endif

        <h2 class="text-blue-500 uppercase tracking-wide font-semibold">
            Your lists
        </h2>
        <ul>
            @forelse($lists as $list)
                <li>
                    <a href="{{ route('lists.show', ['user' => Auth::user(), 'list' => $list['id']]) }}">{{ $list['name'] }}</a>
                </li>
            @empty
                You haven't created any lists yet
            @endforelse
        </ul>

        <h2 class="text-blue-500 uppercase tracking-wide font-semibold">
            Create a new list
        </h2>
        <form action="{{ route('lists.store', ['user' => Auth::user()]) }}" method="post">
            @csrf
            <input type="text" name="name" class="text-black" required placeholder=" Task name">
            <input type="submit" class="bg-blue-500 text-white font-semibold px-2 py-2 hover:bg-blue-600 rounded" value="Create">
        </form>
    </div>
@endsection
