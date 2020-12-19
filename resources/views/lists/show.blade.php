@extends('layouts.app')

@section('content')
   <div class="container mx-auto px-8">
       @if (session('gameRemoved'))
           <div>{{ session('gameRemoved') }}</div>
       @elseif (session('gameAdded'))
           <div>{{ session('gameAdded') }}</div>
       @endif

       <h2 class="text-blue-500 uppercase tracking-wide font-semibold">
           {{ $list->name }}
       </h2>
       <div class="mt-8 popular-games text-sm grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-x-12 gap-y-6 border-b border-gray-800 pb-16 pr-8">
           @forelse($listGameIdToGameIds as $listGameId => $gameId)
               <livewire:list-game :game-id="$gameId" :list="$list" :list-game-id="$listGameId"/>
           @empty
               This list doesn't have any games!
           @endforelse

           <form action="{{ route('lists.destroy', ['user' => Auth::user(), 'list' => $list]) }}" method="post">
               @csrf
               @method('DELETE')
               <input
                   type="submit"
                   class="bg-red-500 text-white font-semibold px-2 py-2 hover:bg-red-600 rounded"
                   value="Delete"
                   onclick="return confirm('Are you sure?')">
           </form>


       </div>
   </div>
@endsection
