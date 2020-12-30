@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-8 relative">

        <x-list-notifications/>

        <div class="flex flex-col md:flex-row">
            <div class="md:w-2/3">
                <h1>Your lists</h1>
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
                <h1>Create a new list</h1>
                <form action="{{ route('lists.store', ['user' => Auth::user()]) }}" method="post">
                    @csrf
                    <input type="text" name="name" class="text-input focus:outline-none focus:shadow-outline" required
                       placeholder="Task name">
                    <input type="submit" class="button-primary hover:bg-blue-700 mt-2" value="Create">
                </form>
            </div>
        </div>
    </div>
@endsection
