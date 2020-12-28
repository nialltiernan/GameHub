@extends('layouts.app')

@section('content')
   <div class="container mx-auto px-8">
       @if (session('gameRemoved'))
           <div>{{ session('gameRemoved') }}</div>
       @elseif (session('gameAdded'))
           <div>{{ session('gameAdded') }}</div>
       @endif

       <div class="flex justify-between">
           <h1>{{ $list->name }}</h1>

           <div class="flex">
               <form action="{{ route('lists.index', ['user' => Auth::user()]) }}">
                   <input type="submit" value="Back" class="button-primary hover:bg-blue-700 mr-4" />
               </form>

               <form action="{{ route('lists.destroy', ['user' => Auth::user(), 'list' => $list]) }}" method="post">
                   @csrf
                   @method('DELETE')
                   <input
                       type="submit"
                       class="bg-red-500 text-white font-semibold px-2 py-2 hover:bg-red-600 rounded"
                       value="Delete"
                       onclick="return confirm('Are you sure you want to delete this list?')">
               </form>
           </div>

       </div>

       <div class="game-grid md:grid-cols-2 lg:grid-cols-4 ">
           @forelse($listGameIdToGameIds as $listGameId => $gameId)
               <livewire:list-game :game-id="$gameId" :list="$list" :list-game-id="$listGameId"/>
           @empty
               This list doesn't have any games!
           @endforelse

       </div>
   </div>
@endsection
