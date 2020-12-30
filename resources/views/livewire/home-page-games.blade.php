<div wire:init="loadGames"
     class="text-sm grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-x-12 gap-y-6 border-b border-gray-800 pb-16">
    @forelse($games as $game)
        <x-game-card :game="$game"/>
    @empty
        @foreach(range(1,12) as $game)
            <x-game-card-loading/>
        @endforeach
    @endforelse
</div>

@push('scripts')
    @include('javascript.ratingLivewire')
@endpush
