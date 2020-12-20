@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-8">

        @if (session('listCreated'))
            <div>{{ session('listCreated') }}</div>
        @elseif (session('listDeleted'))
            <div>{{ session('listDeleted') }}</div>
        @endif

        <div class="flex flex-col md:flex-row">
            <div class="md:w-2/3">
                <h2 class="text-blue-500 uppercase tracking-wide font-semibold">Your lists</h2>
                <div class="container mx-auto flex flex-wrap">
                    @forelse($lists as $list)
                        <a class="
                            bg-gray-500 text-lg rounded
                            transform hover:text-blue-600
                            p-2 mr-4 my-2
                            "
                           href="{{ route('lists.show', ['user' => Auth::user(), 'list' => $list['id']]) }}"
                        >
                            {{ $list['name'] }}
                        </a>
                    @empty
                        You haven't created any lists yet
                    @endforelse
                </div>
            </div>

            <div>
                <h2 class="text-blue-500 uppercase tracking-wide font-semibold">Create a new list</h2>
                <form action="{{ route('lists.store', ['user' => Auth::user()]) }}" method="post">
                    @csrf
                    <input type="text" name="name" class="text-black" required placeholder=" Task name">
                    <input type="submit" class="bg-blue-500 text-white font-semibold px-2 py-2 hover:bg-blue-600 rounded mt-2" value="Create">
                </form>
            </div>
        </div>


    </div>
@endsection
